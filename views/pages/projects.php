<?php
$projects = require __DIR__ . '/../../data/projects.php';
?>
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">PORTFOLIO</span>
        <h1 class="display-5 fw-bold mt-2">Projects</h1>
        <p class="text-secondary-custom col-lg-7">Technical projects focused on AI, automation, systems integration and measurable process improvement.</p>
    </div>
</section>
<section class="pb-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($projects as $project): ?>
                <div class="col-lg-6">
                    <article class="project-card h-100">
                        <span class="project-kicker"><?= e($project['name']) ?></span>
                        <h2 class="h3"><?= e($project['subtitle']) ?></h2>
                        <p class="text-secondary-custom"><?= e($project['description']) ?></p>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <?php foreach ($project['stack'] as $technology): ?>
                                <span class="tech-badge"><?= e($technology) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <a href="<?= e($project['url']) ?>" class="stretched-link text-decoration-none">
                            View case study <i class="bi bi-arrow-right"></i>
                        </a>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
