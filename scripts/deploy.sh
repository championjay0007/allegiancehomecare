#!/usr/bin/env bash
set -Eeuo pipefail

SCRIPT_DIR="$(cd -- "$(dirname -- "${BASH_SOURCE[0]}")" && pwd)"
APP_DIR="$(cd -- "$SCRIPT_DIR/.." && pwd)"
DEPLOY_BRANCH="${DEPLOY_BRANCH:-main}"
PHP_BIN="${PHP_BIN:-php}"
COMPOSER_BIN="${COMPOSER_BIN:-composer}"
NPM_BIN="${NPM_BIN:-npm}"

if ! git check-ref-format --branch "$DEPLOY_BRANCH" >/dev/null 2>&1; then
    printf 'Error: invalid deployment branch: %s\n' "$DEPLOY_BRANCH" >&2
    exit 1
fi

for executable in "$PHP_BIN" "$COMPOSER_BIN" "$NPM_BIN"; do
    if ! command -v "$executable" >/dev/null 2>&1; then
        printf 'Error: required executable not found: %s\n' "$executable" >&2
        exit 1
    fi
done

if [[ ! -f "$APP_DIR/.env" ]]; then
    printf 'Error: .env is missing. Configure the production environment before deploying.\n' >&2
    exit 1
fi

cd "$APP_DIR"

if [[ "$(git branch --show-current)" != "$DEPLOY_BRANCH" ]]; then
    printf 'Error: checkout branch (%s) does not match DEPLOY_BRANCH (%s).\n' \
        "$(git branch --show-current)" "$DEPLOY_BRANCH" >&2
    exit 1
fi

if [[ -n "$(git status --porcelain --untracked-files=normal)" ]]; then
    printf 'Error: checkout has local changes. Stash or commit them before deploying.\n' >&2
    exit 1
fi

git fetch origin "$DEPLOY_BRANCH"
git merge --ff-only "origin/$DEPLOY_BRANCH"

maintenance_enabled=0

finish_deploy() {
    local exit_code=$?
    trap - EXIT

    if (( maintenance_enabled )); then
        if ! "$PHP_BIN" artisan up; then
            printf 'Error: could not disable Laravel maintenance mode.\n' >&2
            exit_code=1
        fi
    fi

    exit "$exit_code"
}

trap finish_deploy EXIT

"$PHP_BIN" artisan down --retry=60
maintenance_enabled=1

"$COMPOSER_BIN" install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

"$NPM_BIN" ci --no-audit --no-fund
"$NPM_BIN" run build

"$PHP_BIN" artisan migrate --force
"$PHP_BIN" artisan optimize:clear
"$PHP_BIN" artisan config:cache
"$PHP_BIN" artisan view:cache

"$PHP_BIN" artisan up
maintenance_enabled=0
trap - EXIT

printf 'Deployment complete at commit %s on branch %s.\n' \
    "$(git rev-parse --short HEAD)" "$DEPLOY_BRANCH"
