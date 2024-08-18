# 🛠️ Laravel Template
<!-- PROJECT SHIELDS -->
![Project Maintenance][maintenance-shield]
[![License][license-shield]](LICENSE)

[![GitHub Activity][commits-shield]][commits]
[![GitHub Last Commit][last-commit-shield]][commits]
[![Contributors][contributors-shield]][contributors-url]

[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]

## About

This is a laravel template repository project, which can be used as a basis for future projects. Based on the TALL stack and packed with useful features to get started right away.

## Features

The Laravel template project comes with the following features:

- PHP 8.3
- Laravel 11.x
- [Laravel Sail][sail] (docker)
- [Laravel Backup][backup] (from spatie)
- [Filament PHP][filament] (admin dashboard)
- [Filament Shield][shield] (roles and permissions)
- [Devcontainer][devcontainer] for Visual Studio Code
- [GIthub Actions](.github/workflows) for CI/CD on Github
    - [Pest](.github/workflows/tests.yaml)
    - [Pint](.github/workflows/linting.yaml)
    - [Larastan](.github/workflows/typing.yaml)

## Roles and permissions

By default there are 3 types of roles:

- Admin
- Moderator
- User

## Getting started

Follow the steps below to get started with the Laravel template project.

## Setting up development environment

1. Clone the repository
2. Open a terminal and navigate to the **laravel** folder

3. Copy the `.env.example` file to `.env`:
```bash
cp .env.example .env
```

4. Uncomment and/or change the following lines in the `.env` file:
```bash
APP_NAME=Template

FORWARD_APP_PORT=80
FORWARD_DB_PORT=3306

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

5. Change the name in `docker-compose.yml`:
```yaml
---
name: 'template'
```

6. Install the composer dependencies and generate a new application key:
```bash
composer install && php artisan key:generate
```

7. Start the development server:
```bash
./vendor/bin/sail up -d
```

8. Run the database migrations and seed the database:
```bash
./vendor/bin/sail php artisan migrate --seed
```

9. Build the frontend assets:
```bash
npm install && npm run dev
```

### Create admin user

To create an admin user for the Filament dashboard, run the following command:

```bash
php artisan make:filament-user
```

### Testing with Pest

To run the tests with Pest, run the following command:

```bash
./vendor/bin/sail pest --coverage
```

## License

Distributed under the **MIT** License. See [`LICENSE`](LICENSE) for more information.

<!-- MARKDOWN LINKS & IMAGES -->
[backup]: https://spatie.be/docs/laravel-backup/v8/introduction
[devcontainer]: https://laravel.com/docs/11.x/sail#using-devcontainers
[filament]: https://filamentphp.com
[sail]: https://laravel.com/docs/11.x/sail
[shield]: https://github.com/bezhanSalleh/filament-shield

[maintenance-shield]: https://img.shields.io/maintenance/yes/2024.svg?style=for-the-badge
[contributors-shield]: https://img.shields.io/github/contributors/klaasnicolaas/laravel-template.svg?style=for-the-badge
[contributors-url]: https://github.com/klaasnicolaas/laravel-template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/klaasnicolaas/laravel-template.svg?style=for-the-badge
[forks-url]: https://github.com/klaasnicolaas/laravel-template/network/members
[stars-shield]: https://img.shields.io/github/stars/klaasnicolaas/laravel-template.svg?style=for-the-badge
[stars-url]: https://github.com/klaasnicolaas/laravel-template/stargazers
[issues-shield]: https://img.shields.io/github/issues/klaasnicolaas/laravel-template.svg?style=for-the-badge
[issues-url]: https://github.com/klaasnicolaas/laravel-template/issues
[license-shield]: https://img.shields.io/github/license/klaasnicolaas/laravel-template.svg?style=for-the-badge
[commits-shield]: https://img.shields.io/github/commit-activity/y/klaasnicolaas/laravel-template.svg?style=for-the-badge
[commits]: https://github.com/klaasnicolaas/laravel-template/commits/master
[last-commit-shield]: https://img.shields.io/github/last-commit/klaasnicolaas/laravel-template.svg?style=for-the-badge