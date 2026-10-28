<?php
$projects = require __DIR__ . '/../../data/projects.php';
$github = require __DIR__ . '/../../data/github.php';
$languageTotal = array_sum($github['languageTotals']);
$languageColors = [
    'Java' => '#2563eb', 'PHP' => '#16a085', 'Python' => '#e9a23b',
    'CSS' => '#8b5cf6', 'HTML' => '#ef6a4c', 'JavaScript' => '#d4a814',
    'Hack' => '#64748b', 'Dockerfile' => '#0ea5e9',
];
$languageRows = [];
$languageOffset = 0.0;
foreach ($github['languageTotals'] as $language => $bytes) {
    $rawPercent = ($bytes / $languageTotal) * 100;
    $languageRows[] = [
        'name' => $language,
        'bytes' => $bytes,
        'percent' => round($rawPercent, 1),
        'offset' => $languageOffset,
        'color' => $languageColors[$language] ?? '#94a3b8',
    ];
    $languageOffset += $rawPercent;
}
?>

<section class="hero-section">
    <div class="container hero-grid">
        <div class="hero-copy">
            <span class="eyebrow"><?= bilingual('SYSTEMS · AI · AUTOMATION', 'SISTEMAS · IA · AUTOMATIZACIÓN') ?></span>
            <h1><?= bilingual('I build practical AI and automation systems for real operations.', 'Construyo sistemas prácticos de IA y automatización para operaciones reales.') ?></h1>
            <p class="hero-lead"><?= bilingual('Systems engineer focused on controlled AI agents, workflow automation, process improvement and reliable integrations.', 'Ingeniero de sistemas enfocado en agentes de IA controlados, automatización de flujos, mejora de procesos e integraciones confiables.') ?></p>
            <div class="hero-actions">
                <a href="/projects" class="btn btn-primary btn-lg"><?= bilingual('Explore projects', 'Explorar proyectos') ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                <a href="<?= e(GITHUB_URL) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-lg"><i class="bi bi-github" aria-hidden="true"></i> GitHub</a>
            </div>
            <div class="hero-availability"><span class="availability-dot" aria-hidden="true"></span><span class="availability-text"><?= bilingual('Open to technology, automation and AI opportunities', 'Disponible para oportunidades en tecnología, automatización e IA') ?></span></div>
        </div>
        <aside class="hero-profile" aria-label="Professional focus">
            <div class="profile-topline"><span>LA</span><span><?= bilingual('Lima, Peru', 'Lima, Perú') ?></span></div>
            <h2><?= bilingual('From operational problem to measurable system.', 'Del problema operativo al sistema medible.') ?></h2>
            <div class="profile-stat-list">
                <div><strong><?= e((string) $github['publicRepos']) ?></strong><span><?= bilingual('public repositories', 'repositorios públicos') ?></span></div>
                <div><strong>2</strong><span><?= bilingual('detailed case studies', 'casos de estudio detallados') ?></span></div>
                <div><strong>8</strong><span><?= bilingual('languages detected', 'lenguajes detectados') ?></span></div>
                <div class="profile-since"><i class="bi bi-github" aria-hidden="true"></i><span><?= bilingual('On GitHub since', 'En GitHub desde') ?> <strong><?= e($github['profileSince']) ?></strong></span></div>
            </div>
        </aside>
    </div>
</section>

<section class="section-space" aria-labelledby="focus-title">
    <div class="container">
        <div class="section-heading">
            <div><span class="eyebrow"><?= bilingual('WHAT I DO', 'LO QUE HAGO') ?></span><h2 id="focus-title"><?= bilingual('Engineering with an operational point of view', 'Ingeniería con perspectiva operativa') ?></h2></div>
            <p><?= bilingual('I connect software, automation and AI while keeping business rules, human decisions and traceability visible.', 'Conecto software, automatización e IA manteniendo visibles las reglas de negocio, las decisiones humanas y la trazabilidad.') ?></p>
        </div>
        <div class="capability-grid">
            <article class="capability-card"><span class="card-index">01</span><i class="bi bi-cpu" aria-hidden="true"></i><h3><?= bilingual('Applied AI', 'IA aplicada') ?></h3><p><?= bilingual('Agents, RAG, tool use, structured outputs and evaluation designed around controlled workflows.', 'Agentes, RAG, uso de herramientas, salidas estructuradas y evaluación diseñados para flujos controlados.') ?></p></article>
            <article class="capability-card"><span class="card-index">02</span><i class="bi bi-diagram-3" aria-hidden="true"></i><h3><?= bilingual('Process automation', 'Automatización de procesos') ?></h3><p><?= bilingual('RPA and orchestration that reduce repetitive work without hiding decision boundaries.', 'RPA y orquestación que reducen el trabajo repetitivo sin ocultar los límites de decisión.') ?></p></article>
            <article class="capability-card"><span class="card-index">03</span><i class="bi bi-braces" aria-hidden="true"></i><h3><?= bilingual('Systems integration', 'Integración de sistemas') ?></h3><p><?= bilingual('APIs, databases and web interfaces connected into maintainable operational solutions.', 'APIs, bases de datos e interfaces web conectadas en soluciones operativas mantenibles.') ?></p></article>
        </div>
    </div>
</section>

<section class="section-space section-tint" aria-labelledby="work-title">
    <div class="container">
        <div class="section-heading">
            <div><span class="eyebrow"><?= bilingual('SELECTED WORK', 'TRABAJO DESTACADO') ?></span><h2 id="work-title"><?= bilingual('Projects with implementation evidence', 'Proyectos con evidencia de implementación') ?></h2></div>
            <a class="text-link" href="/projects"><?= bilingual('See all projects', 'Ver todos los proyectos') ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </div>
        <div class="featured-projects">
            <article class="featured-project featured-project-primary">
                <div class="featured-number">01</div>
                <div><span class="project-kicker"><?= bilingual('AI + BANKING OPERATIONS', 'IA + OPERACIONES BANCARIAS') ?></span><h3>BankOps AI</h3><p><?= bilingual('Controlled AI agents, deterministic rules, human authorization, observability, evaluation and RPA in a synthetic banking environment.', 'Agentes de IA controlados, reglas deterministas, autorización humana, observabilidad, evaluación y RPA en un entorno bancario sintético.') ?></p>
                    <div class="chip-row"><span>n8n</span><span>OpenAI</span><span>FastAPI</span><span>Db2</span><span>Power Automate</span></div>
                    <a class="btn btn-light" href="/projects/bankops"><?= bilingual('Read case study', 'Leer caso de estudio') ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="project-outcomes"><div><strong>74</strong><span><?= bilingual('automated tests', 'pruebas automatizadas') ?></span></div><div><strong>15/18</strong><span><?= bilingual('evaluation baseline', 'línea base de evaluación') ?></span></div></div>
            </article>
            <article class="featured-project">
                <div class="featured-number">02</div>
                <div><span class="project-kicker"><?= bilingual('RAG + SPECIALIZED AGENTS', 'RAG + AGENTES ESPECIALIZADOS') ?></span><h3>AVIP</h3><p><?= bilingual('A multi-agent platform that combines institutional knowledge and structured operational data to improve administrative processes.', 'Plataforma multiagente que combina conocimiento institucional y datos operativos estructurados para mejorar procesos administrativos.') ?></p>
                    <div class="chip-row"><span>Flowise</span><span>RAG</span><span>PHP</span><span>MariaDB</span></div>
                    <a class="btn btn-outline-primary" href="/projects/avip"><?= bilingual('Read case study', 'Leer caso de estudio') ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="project-outcomes"><div><strong>90.3%</strong><span><?= bilingual('queries without escalation', 'consultas sin escalamiento') ?></span></div><div><strong>↓73.1%</strong><span><?= bilingual('administrative errors', 'errores administrativos') ?></span></div></div>
            </article>
        </div>
    </div>
</section>

<section class="section-space" id="github" aria-labelledby="github-title">
    <div class="container">
        <div class="github-intro">
            <div><span class="eyebrow">GITHUB PROFILE</span><h2 id="github-title"><?= bilingual('A broader view of the technology I use', 'Una vista más amplia de la tecnología que utilizo') ?></h2><p><?= bilingual('Language distribution calculated from the byte counts reported by GitHub for all public repositories. It shows code composition, not proficiency.', 'Distribución calculada con los bytes de lenguaje reportados por GitHub en todos los repositorios públicos. Representa composición de código, no nivel de dominio.') ?></p></div>
            <a class="btn btn-outline-primary" href="<?= e(GITHUB_URL) ?>" target="_blank" rel="noopener noreferrer"><?= bilingual('Open GitHub profile', 'Abrir perfil de GitHub') ?> <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i></a>
        </div>
        <div class="language-panel" data-language-visualization>
            <div class="language-chart" data-language-chart>
                <svg viewBox="0 0 120 120" role="group" aria-label="GitHub language distribution">
                    <circle class="language-track" cx="60" cy="60" r="48"></circle>
                    <?php foreach ($languageRows as $row): ?>
                        <circle
                            class="language-segment"
                            cx="60" cy="60" r="48"
                            pathLength="100"
                            tabindex="0"
                            role="button"
                            data-language-segment="<?= e($row['name']) ?>"
                            data-language-percent="<?= e(number_format($row['percent'], 1, '.', '')) ?>"
                            data-language-bytes="<?= e(number_format($row['bytes'])) ?>"
                            aria-label="<?= e($row['name'] . ': ' . number_format($row['percent'], 1) . '%') ?>"
                            stroke-dasharray="<?= e(number_format(($row['bytes'] / $languageTotal) * 100, 6, '.', '')) ?> <?= e(number_format(100 - (($row['bytes'] / $languageTotal) * 100), 6, '.', '')) ?>"
                            stroke-dashoffset="<?= e(number_format(-$row['offset'], 6, '.', '')) ?>"
                            style="--segment-color: <?= e($row['color']) ?>"
                        ></circle>
                    <?php endforeach; ?>
                </svg>
                <div class="language-chart-center" aria-live="polite"><strong data-chart-value><?= e((string) $github['publicRepos']) ?></strong><span data-chart-label data-i18n-en="public repos" data-i18n-es="repos públicos">public repos</span></div>
                <div class="language-chart-hint"><?= bilingual('Select a language', 'Selecciona un lenguaje') ?></div>
            </div>
            <div class="language-list">
                <?php foreach ($languageRows as $row): ?>
                    <button class="language-row" type="button" data-language-control="<?= e($row['name']) ?>" style="--language-color: <?= e($row['color']) ?>">
                        <span class="language-name"><span class="language-dot"></span><strong><?= e($row['name']) ?></strong></span>
                        <span class="language-bar"><span style="--bar-width: <?= e((string) $row['percent']) ?>%"></span></span>
                        <span><?= e(number_format($row['percent'], 1)) ?>%</span>
                    </button>
                <?php endforeach; ?>
                <p class="data-note"><i class="bi bi-info-circle" aria-hidden="true"></i> <?= bilingual('Snapshot: 28 Oct 2026 · Includes public repositories only.', 'Instantánea: 28 oct 2026 · Solo incluye repositorios públicos.') ?></p>
            </div>
        </div>

        <div class="repo-heading"><div><span class="eyebrow"><?= bilingual('PRIORITY REPOSITORIES', 'REPOSITORIOS PRIORITARIOS') ?></span><h3><?= bilingual('Explore the code', 'Explora el código') ?></h3></div><span class="sync-status" id="githubSyncStatus" aria-live="polite"><?= bilingual('Static snapshot ready', 'Instantánea local disponible') ?></span></div>
        <div class="repo-grid" id="repoGrid">
            <?php foreach ($github['featuredRepos'] as $index => $repo): ?>
                <article class="repo-card <?= $index < 2 ? 'repo-card-featured' : '' ?>" data-repo-name="<?= e($repo['name']) ?>">
                    <div class="repo-card-top"><span class="repo-icon"><i class="bi bi-git" aria-hidden="true"></i></span><div class="repo-count">0<?= $index + 1 ?></div></div>
                    <p class="repo-role" data-i18n-en="<?= e($repo['roleEn']) ?>" data-i18n-es="<?= e($repo['roleEs']) ?>"><?= e($repo['roleEn']) ?></p>
                    <h4><?= e($repo['name']) ?></h4>
                    <p class="repo-description" data-i18n-en="<?= e($repo['descriptionEn']) ?>" data-i18n-es="<?= e($repo['descriptionEs']) ?>"><?= e($repo['descriptionEn']) ?></p>
                    <div class="chip-row small"><?php foreach ($repo['languages'] as $language): ?><span><?= e($language) ?></span><?php endforeach; ?></div>
                    <div class="repo-meta"><span title="Stars"><i class="bi bi-star" aria-hidden="true"></i> <span data-repo-stars><?= e((string) $repo['stars']) ?></span></span><span title="Forks"><i class="bi bi-diagram-2" aria-hidden="true"></i> <span data-repo-forks><?= e((string) $repo['forks']) ?></span></span><a href="<?= e($repo['url']) ?>" target="_blank" rel="noopener noreferrer" aria-label="Open <?= e($repo['name']) ?> on GitHub"><?= bilingual('Repository', 'Repositorio') ?> <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a></div>
                    <?php if (isset($repo['caseStudy'])): ?><a class="card-link-overlay" href="<?= e($repo['caseStudy']) ?>" aria-label="<?= e('View ' . $repo['name'] . ' case study') ?>"></a><?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="contact-section" id="contact">
    <div class="container contact-layout">
        <div class="contact-copy">
            <span class="eyebrow"><?= bilingual('LET’S CONNECT', 'CONECTEMOS') ?></span>
            <h2><?= bilingual('Interested in systems that make operations clearer and faster?', '¿Te interesan sistemas que hagan las operaciones más claras y rápidas?') ?></h2>
            <p><?= bilingual('I’m available to discuss software, automation, systems integration and applied AI opportunities.', 'Estoy disponible para conversar sobre oportunidades en software, automatización, integración de sistemas e IA aplicada.') ?></p>
            <div class="contact-actions"><a class="btn btn-primary btn-lg" href="<?= e(LINKEDIN_URL) ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-linkedin" aria-hidden="true"></i> LinkedIn</a><a class="btn btn-outline-primary btn-lg" href="<?= e(GITHUB_URL) ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-github" aria-hidden="true"></i> GitHub</a></div>
        </div>
        <div class="contact-form-card">
            <div class="form-heading"><span class="form-icon"><i class="bi bi-envelope" aria-hidden="true"></i></span><div><h3><?= bilingual('Send me a message', 'Envíame un mensaje') ?></h3><p><?= bilingual('I’ll reply directly to your email.', 'Responderé directamente a tu correo.') ?></p></div></div>
            <form id="contactForm" action="/api/contact.php" method="post">
                <input type="hidden" name="csrf_token" value="<?= e($contactCsrf) ?>">
                <input type="hidden" name="captcha_token" value="<?= e($contactChallenge['token']) ?>">
                <div class="contact-honeypot" aria-hidden="true"><label for="contactWebsite">Website</label><input id="contactWebsite" name="website" type="text" tabindex="-1" autocomplete="off"></div>
                <div class="form-row">
                    <div class="form-field"><label for="contactName"><?= bilingual('Name', 'Nombre') ?></label><input id="contactName" name="name" type="text" required minlength="2" maxlength="80" autocomplete="name" data-i18n-placeholder-en="Your name" data-i18n-placeholder-es="Tu nombre" placeholder="Your name"></div>
                    <div class="form-field"><label for="contactEmail"><?= bilingual('Email', 'Correo') ?></label><input id="contactEmail" name="email" type="email" required maxlength="160" autocomplete="email" data-i18n-placeholder-en="you@example.com" data-i18n-placeholder-es="tu@correo.com" placeholder="you@example.com"></div>
                </div>
                <div class="form-field"><label for="contactMessage"><?= bilingual('Message', 'Mensaje') ?></label><textarea id="contactMessage" name="message" required minlength="20" maxlength="3000" rows="6" data-i18n-placeholder-en="Tell me briefly about your idea, project or opportunity…" data-i18n-placeholder-es="Cuéntame brevemente sobre tu idea, proyecto u oportunidad…" placeholder="Tell me briefly about your idea, project or opportunity…"></textarea><small><span data-message-count>0</span>/3000</small></div>
                <div class="captcha-row">
                    <div class="form-field"><label for="contactCaptcha"><?= bilingual('Security check', 'Verificación de seguridad') ?>: <strong data-captcha-question><?= e($contactChallenge['question']) ?></strong></label><input id="contactCaptcha" name="captcha" type="text" required inputmode="numeric" pattern="[0-9]+" maxlength="3" autocomplete="off" data-i18n-placeholder-en="Answer" data-i18n-placeholder-es="Respuesta" placeholder="Answer"></div>
                    <div class="captcha-note"><i class="bi bi-shield-check" aria-hidden="true"></i><span><?= bilingual('Protected with validation and rate limiting.', 'Protegido con validación y límite de frecuencia.') ?></span></div>
                </div>
                <button class="btn btn-primary contact-submit" type="submit"><span data-submit-label data-i18n-en="Send message" data-i18n-es="Enviar mensaje">Send message</span><i class="bi bi-send" aria-hidden="true"></i></button>
                <p class="form-status" data-contact-status role="status" aria-live="polite"></p>
                <p class="privacy-note"><i class="bi bi-lock" aria-hidden="true"></i> <?= bilingual('Your data is used only to reply to this message.', 'Tus datos se usan únicamente para responder este mensaje.') ?></p>
            </form>
        </div>
    </div>
</section>
