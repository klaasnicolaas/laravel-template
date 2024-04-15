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

This is a template repository for Laravel projects, including the following features:

- Laravel 11.x
- PHP 8.3
- [Laravel Sail][sail] (docker)
- [Laravel Pint][pint] (linting)
- Devcontainer for Visual Studio Code
- [Filament PHP][filament] (admin dashboard)

## Getting Started

TODO

### Create admin user

To create an admin user for the Filament dashboard, run the following command:

```bash
php artisan make:filament-user
```

### Roles and permissions

By default there are 3 types of roles:

- Admin
- Moderator
- User

## License

Distributed under the **MIT** License. See [`LICENSE`](LICENSE) for more information.

<!-- MARKDOWN LINKS & IMAGES -->
[sail]: https://laravel.com/docs/11.x/sail
[pint]: https://laravel.com/docs/11.x/pint
[filament]: https://filamentphp.com

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