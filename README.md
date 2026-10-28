# Luis Atencio Portfolio

Personal portfolio focused on AI, automation, systems integration and process improvement.

Built with PHP and Bootstrap, and designed to showcase technical case studies with implementation evidence, architecture, metrics and source code.

The site also includes:

- Persistent Spanish/English language selection
- Interactive GitHub language visualization
- Accessible image lightbox
- File-backed visit counter (one visit per browser every 12 hours)
- Contact form with CSRF protection, honeypot, timed math challenge and hourly rate limiting
- Authenticated SMTP delivery through PHPMailer

## Featured projects

### BankOps AI

AI-assisted banking operations prototype combining:

- AI agents with tool calling
- Structured outputs
- Deterministic validation rules
- Human-in-the-loop authorization
- Telemetry and evaluation
- Power Automate Desktop RPA
- Python / FastAPI
- IBM Db2

Case study:

`/projects/bankops`

Repository:

https://github.com/FCode19/bankops-ai

---

### AVIP

Asistente Virtual Inteligente de Praga.

AI platform with specialized assistants, RAG workflows and structured-data integrations for administrative operations.

Includes:

- Flowise workflows and Agentflows
- OpenAI models
- RAG
- PHP APIs
- MariaDB
- Measured AS IS vs TO BE process improvements

Case study:

`/projects/avip`

Repository:

https://github.com/FCode19/avip-intelligent-virtual-agents-praga

## Tech stack

- PHP
- Bootstrap
- JavaScript
- HTML / CSS
- Git
- GitHub

## Routes

- `/`
- `/projects`
- `/projects/avip`
- `/projects/bankops`

## Local development

Requirements:

- PHP 8.1+
- Composer 2+
- Apache 2.4+
- Git

No database is required for the portfolio itself.

The PHP process needs write permission for `data/visits.json` and `data/contact-rate-limit.json`.

Run locally:

```bash
php -S localhost:8000 router.php
```

Then open:

```text
http://localhost:8000
```

## Contact email

Messages are delivered to `luisatencio0419@gmail.com` through PHPMailer and an external authenticated SMTP provider. Native PHP `mail()` is not used.

Install dependencies and create the local configuration:

```powershell
composer install
Copy-Item .env.example .env
```

For Gmail, enable two-factor authentication and create an App Password. Configure `.env` with:

```text
SMTP_HOST="smtp.gmail.com"
SMTP_PORT="587"
SMTP_USERNAME="your-sender@gmail.com"
SMTP_PASSWORD="your-app-password"
SMTP_ENCRYPTION="tls"
CONTACT_EMAIL="luisatencio0419@gmail.com"
CONTACT_FROM_EMAIL="your-sender@gmail.com"
```

For local validation without sending a real email, set:

```text
PORTFOLIO_CONTACT_DRY_RUN=1
```

## Deployment

The repository includes `.github/workflows/deploy-infinityfree.yml`. Every push to `main` can build the Composer dependencies and synchronize the project to InfinityFree through FTP.

The workflow remains inactive until these GitHub repository secrets exist:

- `IF_FTP_SERVER`
- `IF_FTP_USERNAME`
- `IF_FTP_PASSWORD`
- `IF_PRODUCTION_ENV`

`IF_PRODUCTION_ENV` contains the complete production `.env` contents. The workflow creates that file only inside the temporary GitHub runner and uploads it with the application; SMTP passwords are never committed.

The remote directory is `/htdocs/`. Runtime counter and rate-limit files are excluded from deployments so updates do not reset visits or active limits.

Until the InfinityFree secrets are configured, pushes complete without deploying and display an informational notice in GitHub Actions.

Include the final public URL as `APP_URL` inside `IF_PRODUCTION_ENV` when the InfinityFree domain is known.

## Links

Portfolio:  
https://portfolio-luis.sp1.br.saveincloud.net.br/

GitHub:  
https://github.com/FCode19

LinkedIn:  
https://www.linkedin.com/in/luisatencio-tech/
