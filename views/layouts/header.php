<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Luis Atencio's portfolio: AI agents, automation, systems integration and software engineering.">
    <meta name="theme-color" content="#f7f9fc">
    <title><?= e($pageTitle) ?></title>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="<?= asset('css/app.css') ?>" rel="stylesheet">
</head>
<body>
<a class="skip-link" href="#main-content"><?= bilingual('Skip to content', 'Saltar al contenido') ?></a>
<nav class="navbar navbar-expand-lg navbar-light fixed-top portfolio-nav" aria-label="Primary navigation">
    <div class="container">
        <a class="navbar-brand" href="/" aria-label="Luis Atencio — Home">
            <span class="brand-mark" aria-hidden="true">LA</span>
            <span>Luis Atencio</span>
        </a>
        <div class="d-flex align-items-center gap-2 order-lg-3">
            <div class="language-switch" role="group" aria-label="Language / Idioma">
                <button class="language-option" type="button" data-language="es" aria-pressed="false">ES</button>
                <button class="language-option" type="button" data-language="en" aria-pressed="true">EN</button>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Open navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto me-lg-3 align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link <?= isActive('/') ?>" href="/"><?= bilingual('Home', 'Inicio') ?></a></li>
                <li class="nav-item"><a class="nav-link <?= isActive('/projects') ?>" href="/projects"><?= bilingual('Projects', 'Proyectos') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="/#github">GitHub</a></li>
                <li class="nav-item"><a class="nav-link" href="/#contact"><?= bilingual('Contact', 'Contacto') ?></a></li>
            </ul>
        </div>
    </div>
</nav>
<main id="main-content">
