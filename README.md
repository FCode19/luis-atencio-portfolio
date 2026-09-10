# Luis Atencio Portfolio

Personal portfolio focused on AI, automation, systems integration and process improvement.

Built with PHP and Bootstrap, and designed to showcase technical case studies with implementation evidence, architecture, metrics and source code.

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

- PHP 8.4+
- Apache 2.4+
- Git

No database is required for the portfolio itself.

Run locally:

```bash
php -S localhost:8000 index.php
```

Then open:

```text
http://localhost:8000
```

## Deployment

Designed for Git-based deployment to an Apache + PHP environment.

The production deployment is currently hosted on SaveInCloud and updated manually from the Git repository.

Before deploying, configure the production `APP_URL` in:

```text
config/app.php
```

## Links

Portfolio:  
https://portfolio-luis.sp1.br.saveincloud.net.br/

GitHub:  
https://github.com/FCode19

LinkedIn:  
https://www.linkedin.com/in/luisatencio-tech/
