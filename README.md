# Luis Atencio Portfolio

Personal portfolio built with PHP and Bootstrap.

## Requirements

- PHP 8.4+
- Apache 2.4+
- Git

No database is required for the initial version.

## Local development

```bash
php -S localhost:8000 index.php
```

Open `http://localhost:8000`.

## Routes

- `/`
- `/projects`
- `/projects/avip`

## Deployment

Designed for Git deployment to an Apache + PHP environment.

After connecting the production domain, update `APP_URL` in `config/app.php`.
