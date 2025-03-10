<img src="public/assets/art/server_logo/end_explorer.png"/>

[![codecov](https://codecov.io/github/James-buzz/minecraftmagic/graph/badge.svg?token=5KTGW6E6PX)](https://codecov.io/github/James-buzz/minecraftmagic)
[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2Fc39e3f98-393c-4239-98e9-06542871514d&style=flat)](https://forge.laravel.com/servers/858254/sites/2524132)

A fun side-project that I built for generating AI art for Minecraft. You can generate art such as Server logos.

## Minecraftmagic.com
Minecraftmagic was originally developed as a project to demonstrate how inexpensive AI can be. 

The project aim was to showcase the potential for server owners to use AI-powered tools to create assets like logos and banners cost-effectively. 

The focus later shifted towards demonstrating Laravel best practices through a concrete implementation.

Minecraftmagic is a work in progress, but I hope that you find it useful for your learning.

## Table of Contents
- 💻 [Getting Started](.docs/getting-started.md)

## Mantras

- Rapid Development - Embrace Laravel's Eloquent directly and magic methods. Avoid unnecessary abstractions
- Smart Testing - Feature tests for user flows, unit tests for complex logic only. No test duplication
- Enterprise Ready - Production-grade with monitoring, S3 storage, metrics, and error tracking

## Software Features

- 📊 Observability - Monitor application metrics and performance with [Prometheus](https://prometheus.io/)

- ⚡ Code Analysis - Ensure code quality and catch potential errors with [PHPStan](https://phpstan.org/)

- 🐛 Debug Tools - Enhance application logging locally with [Laravel Pail](https://github.com/laravel/pail)

- 📈 Code Coverage - Display test coverage status using [Custom Github Action](.github/workflows/update-codecov.yml)

- 🤖 Automated Testing - Validate pull requests with comprehensive checks via [Custom Github Action](.github/workflows/php-run-tests.yml)

- 🚨 Error Monitoring - Track and manage production errors with [Sentry](https://sentry.io/)

- ☁️ Cloud Storage - Handle file storage efficiently using [Cloudflare R2](https://www.cloudflare.com/r2/) (S3 compatible)

- 📧 Email Service - Send transactional emails reliably through [Resend](https://resend.io/)

## TODO

- [ ] Improve test coverage
- [ ] Improve test strategy
- [ ] Add more features
- [ ] Allow deletion of generated images

## Preview
<img src="./.docs/preview.gif" width="400" alt="Minecraftmagic Preview"/>

## Contributing

If you have a suggestion that would make this better, please fork the repo and create a pull request.

## License

Distributed under the MIT License. See `LICENSE.txt` for more information.
