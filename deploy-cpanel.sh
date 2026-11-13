#!/usr/bin/env bash
set -Eeuo pipefail

APP_DIR="$(cd -- "$(dirname -- "${BASH_SOURCE[0]}")" && pwd)"
PHP_BIN="${PHP_BIN:-php}"
COMPOSER_BIN="${COMPOSER_BIN:-composer}"
NPM_BIN="${NPM_BIN:-npm}"

if ! command -v "$PHP_BIN" >/dev/null 2>&1; then
    printf 'Error: PHP executable not found: %s\n' "$PHP_BIN" >&2
    exit 1
fi

if ! command -v "$COMPOSER_BIN" >/dev/null 2>&1; then
    printf 'Error: Composer executable not found: %s\n' "$COMPOSER_BIN" >&2
    exit 1
fi

if ! command -v "$NPM_BIN" >/dev/null 2>&1; then
    printf 'Error: npm executable not found: %s\n' "$NPM_BIN" >&2
    exit 1
fi

if [[ ! -f "$APP_DIR/.env" ]]; then
    printf 'Error: .env is missing. Configure the production environment before deploying.\n' >&2
    exit 1
fi

cd "$APP_DIR"

if [[ "$(git branch --show-current)" != "main" ]]; then
    printf 'Error: deploy-cpanel.sh must run from the main branch checkout.\n' >&2
    exit 1
fi

if [[ -n "$(git status --porcelain --untracked-files=normal)" ]]; then
    printf 'Error: the checkout has local changes. Preserve or commit them before deploying.\n' >&2
    exit 1
fi

git fetch origin main
git merge --ff-only origin/main

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

printf 'Deployment complete at commit %s.\n' "$(git rev-parse --short HEAD)"
