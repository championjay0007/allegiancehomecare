<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Deploying from cPanel

After the one-time setup below, every push to GitHub's `main` branch starts a GitHub Actions deployment to cPanel. You can also start one manually from the repository's **Actions** tab using **Deploy to cPanel** → **Run workflow**.

### One-time cPanel setup

1. In cPanel, use **Git Version Control** to clone this repository into the application directory. Keep the checkout on `main` and make sure it has no uncommitted changes.
2. Configure the production `.env` file in that checkout. Point the domain's document root to the checkout's `public` directory; do not expose the application root or `.env` publicly.
3. Ensure the cPanel account has Git, PHP 8.2+, Composer, and Node.js/npm available over SSH. If those commands are not on the non-interactive SSH `PATH`, add repository variables `CPANEL_PHP_BIN`, `CPANEL_COMPOSER_BIN`, and/or `CPANEL_NPM_BIN` with the command name or full executable path (for example, `ea-php82`).
4. Enable SSH access in cPanel. Add a dedicated public SSH key to the cPanel account's authorized keys. The matching private key will be stored as a GitHub Actions secret; do not commit it or put it in this repository.
5. In GitHub, open **Settings** → **Secrets and variables** → **Actions**. Add these repository secrets:

   | Secret | Value |
   | --- | --- |
   | `CPANEL_SSH_HOST` | cPanel server hostname (without `https://`) |
   | `CPANEL_SSH_PORT` | SSH port provided by your host (often `22`) |
   | `CPANEL_SSH_USER` | cPanel account username |
   | `CPANEL_SSH_PRIVATE_KEY` | Full private key corresponding to the public key authorized in cPanel |
   | `CPANEL_SSH_KNOWN_HOSTS` | Verified SSH host-key line(s) for this server |

   Add the repository **variable** `CPANEL_APP_DIR` with the full absolute path to the cPanel Git checkout, such as `/home/CPANELUSER/allegiancehomecare`. Get the actual path from cPanel Terminal; the example is not your account's exact path. `CPANEL_PHP_BIN`, `CPANEL_COMPOSER_BIN`, and `CPANEL_NPM_BIN` are optional variables for selecting the right executables.

   You can collect the server's host-key line with `ssh-keyscan -p PORT -H HOST`, replacing `PORT` and `HOST` with your cPanel SSH details. Verify its fingerprint with your hosting provider before saving it as `CPANEL_SSH_KNOWN_HOSTS`.
6. If the GitHub repository is private, also configure the cPanel checkout's Git remote authentication so `git fetch origin main` can access it.

### What deployment does

The workflow connects to cPanel over SSH and runs `deploy-cpanel.sh` in the checkout. The script fetches and fast-forwards from `origin/main`, installs production Composer dependencies, builds Vite assets, runs database migrations, and refreshes Laravel's config and view caches. It preserves `.env` and uploaded files, and returns the site from maintenance mode if deployment fails after maintenance mode is enabled. It stops rather than deploying if the checkout is not clean or is not on `main`.

Back up the production database before the first deployment and before deployments that include database changes. If a deployment fails, review its run under GitHub's **Actions** tab; the workflow reports the failure and does not silently treat it as successful.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
