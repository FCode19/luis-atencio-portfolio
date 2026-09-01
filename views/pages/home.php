<?php
$projects = require __DIR__ . '/../../data/projects.php';
$featured = $projects[0];
?>
<section class="hero-section d-flex align-items-center">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-8">
                <span class="eyebrow">SYSTEMS · AI · AUTOMATION</span>
                <h1 class="display-3 fw-bold mt-3 mb-4">Building AI solutions that solve real operational problems.</h1>
                <p class="lead text-secondary-custom mb-4">Systems engineer focused on AI agents, workflow automation, process improvement and technology integration.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="/projects" class="btn btn-primary btn-lg">View projects</a>
                    <a href="<?= e(GITHUB_URL) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-github me-2"></i>GitHub
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <span class="eyebrow">FEATURED CASE STUDY</span>
        <h2 class="mt-2 mb-4">AVIP — <?= e($featured['subtitle']) ?></h2>

        <div class="project-feature-card">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7">
                    <p class="text-secondary-custom mb-4"><?= e($featured['description']) ?></p>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <?php foreach ($featured['stack'] as $technology): ?>
                            <span class="tech-badge"><?= e($technology) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <a href="<?= e($featured['url']) ?>" class="btn btn-light">
                        View case study <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-5">
                    <div class="metrics-grid">
                        <?php foreach ($featured['metrics'] as $label => $value): ?>
                            <div class="metric-card">
                                <strong><?= e($value) ?></strong>
                                <span><?= e($label) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
