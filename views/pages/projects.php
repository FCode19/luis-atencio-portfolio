<?php $github = require __DIR__ . '/../../data/github.php'; ?>
<section class="page-hero">
    <div class="container page-hero-grid">
        <div><span class="eyebrow"><?= bilingual('PORTFOLIO', 'PORTAFOLIO') ?></span><h1><?= bilingual('Projects built around real operational problems', 'Proyectos construidos alrededor de problemas operativos reales') ?></h1></div>
        <p><?= bilingual('Detailed case studies and public repositories covering applied AI, automation, testing, infrastructure and business systems.', 'Casos de estudio detallados y repositorios públicos sobre IA aplicada, automatización, pruebas, infraestructura y sistemas de negocio.') ?></p>
    </div>
</section>

<section class="section-space pt-0">
    <div class="container">
        <div class="case-study-grid">
            <article class="case-study-card case-study-accent">
                <div class="case-study-top"><span>01</span><span><?= bilingual('FEATURED CASE STUDY', 'CASO DESTACADO') ?></span></div>
                <h2>BankOps AI</h2><h3><?= bilingual('AI-assisted banking operations & RPA', 'Operaciones bancarias asistidas por IA y RPA') ?></h3>
                <p><?= bilingual('A technical prototype that separates probabilistic analysis, deterministic controls, human authorization and controlled execution.', 'Prototipo técnico que separa el análisis probabilístico, los controles deterministas, la autorización humana y la ejecución controlada.') ?></p>
                <div class="chip-row"><span>n8n</span><span>OpenAI</span><span>Python / FastAPI</span><span>IBM Db2</span><span>Power Automate</span></div>
                <div class="case-metrics"><div><strong>74</strong><span><?= bilingual('tests passed', 'pruebas superadas') ?></span></div><div><strong>83.3%</strong><span><?= bilingual('initial evaluation', 'evaluación inicial') ?></span></div><div><strong>HITL</strong><span><?= bilingual('controlled approval', 'aprobación controlada') ?></span></div></div>
                <a href="/projects/bankops" class="btn btn-light"><?= bilingual('View full case study', 'Ver caso completo') ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </article>
            <article class="case-study-card">
                <div class="case-study-top"><span>02</span><span><?= bilingual('FEATURED CASE STUDY', 'CASO DESTACADO') ?></span></div>
                <h2>AVIP</h2><h3><?= bilingual('Intelligent Virtual Assistant for Praga', 'Asistente Virtual Inteligente de Praga') ?></h3>
                <p><?= bilingual('Specialized agents, RAG workflows and structured-data integrations applied to measurable administrative-process improvements.', 'Agentes especializados, flujos RAG e integraciones de datos estructurados aplicados a mejoras medibles de procesos administrativos.') ?></p>
                <div class="chip-row"><span>Flowise</span><span>OpenAI</span><span>RAG</span><span>PHP</span><span>MariaDB</span></div>
                <div class="case-metrics"><div><strong>90.3%</strong><span><?= bilingual('without escalation', 'sin escalamiento') ?></span></div><div><strong>↓73.1%</strong><span><?= bilingual('admin errors', 'errores administrativos') ?></span></div><div><strong>4</strong><span><?= bilingual('specialized domains', 'dominios especializados') ?></span></div></div>
                <a href="/projects/avip" class="btn btn-outline-primary"><?= bilingual('View full case study', 'Ver caso completo') ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </article>
        </div>
    </div>
</section>

<section class="section-space section-tint">
    <div class="container">
        <div class="section-heading"><div><span class="eyebrow"><?= bilingual('PUBLIC CODE', 'CÓDIGO PÚBLICO') ?></span><h2><?= bilingual('More repositories, more range', 'Más repositorios, más amplitud') ?></h2></div><p><?= bilingual('The priority selection below spans quality engineering, containers, networking, automation and web applications.', 'La selección prioritaria incluye ingeniería de calidad, contenedores, redes, automatización y aplicaciones web.') ?></p></div>
        <div class="compact-repo-list">
            <?php foreach (array_slice($github['featuredRepos'], 2) as $repo): ?>
                <a href="<?= e($repo['url']) ?>" target="_blank" rel="noopener noreferrer" class="compact-repo-item">
                    <span class="repo-icon"><i class="bi bi-git" aria-hidden="true"></i></span>
                    <span><strong><?= e($repo['name']) ?></strong><small data-i18n-en="<?= e($repo['roleEn']) ?>" data-i18n-es="<?= e($repo['roleEs']) ?>"><?= e($repo['roleEn']) ?></small></span>
                    <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5"><a class="btn btn-primary btn-lg" href="<?= e(GITHUB_URL) ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-github" aria-hidden="true"></i> <?= bilingual('View all 18 public repositories', 'Ver los 18 repositorios públicos') ?></a></div>
    </div>
</section>
