<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Deploying from cPanel

To update the website, open cPanel Terminal in the repository folder and run:

```bash
cd ~/public_html
DEPLOY_BRANCH=main ./scripts/deploy.sh
```

If you have a local edit to preserve before the update, stash that file first. For example, if this path exists in your cPanel checkout:

```bash
git stash push -m "preserve support-at-home page before deploy" -- resources/views/public/pages/support-at-home.blade.php
DEPLOY_BRANCH=main ./scripts/deploy.sh
```

Only use the stash command if that file path exists and has local changes; change it to the correct path for your checkout. The stashed edit is saved in Git's stash and is not reapplied automatically. The deployment script requires the current checkout to be on the selected branch, and stops if other unstashed local changes remain.

The script fetches the latest code from GitHub, installs production dependencies, runs database migrations, and refreshes Laravel's caches. Production Vite assets are built before deployment and included in Git, so cPanel does not need Node.js/npm. If npm is available, the script rebuilds those assets; otherwise, it uses the prebuilt files. It does not replace `.env` or delete uploaded files. cPanel needs Git, PHP 8.2+, and Composer in Terminal. If cPanel uses a versioned PHP command, run `PHP_BIN=ea-php82 DEPLOY_BRANCH=main ./scripts/deploy.sh`. Back up the production database before deploying migrations. Keep the domain's document root pointed at the checkout's `public` folder.

## Career application notifications

Set `CAREER_APPLICATIONS_EMAIL` in the production `.env` to the inbox that should receive career applications. It is separate from `MAIL_FROM_ADDRESS`, which remains the sender address. If unset, career notifications continue to go to `MAIL_FROM_ADDRESS` for backward compatibility. After changing `.env`, refresh Laravel's configuration cache by running the deployment script or `php artisan config:cache`.

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
