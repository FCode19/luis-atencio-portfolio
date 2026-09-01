<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portfolio focused on AI agents, automation, systems and process improvement.">
    <title><?= e($pageTitle) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="<?= asset('css/app.css') ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top portfolio-nav">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="/">Luis Atencio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link <?= isActive('/') ?>" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link <?= isActive('/projects') ?>" href="/projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= e(GITHUB_URL) ?>" target="_blank" rel="noopener noreferrer">GitHub</a></li>
                <li class="nav-item"><a class="btn btn-outline-light btn-sm ms-lg-2" href="<?= e(LINKEDIN_URL) ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
