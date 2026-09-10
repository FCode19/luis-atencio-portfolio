<section class="project-hero">
    <div class="container">
        <a href="/projects" class="back-link">
            <i class="bi bi-arrow-left"></i> Projects
        </a>

        <div class="row g-5 align-items-end mt-2">
            <div class="col-lg-8">
                <span class="eyebrow">AI AGENTS · RAG · SYSTEMS INTEGRATION</span>

                <h1 class="display-4 fw-bold mt-3">AVIP</h1>

                <p class="h4 fw-normal text-secondary-custom">
                    Asistente Virtual Inteligente de Praga
                </p>

                <p class="lead mt-4">
                    AI-powered platform designed to improve administrative operations
                    through specialized agents, retrieval-augmented generation and
                    structured-data integrations.
                </p>
            </div>

            <div class="col-lg-4">
                <div class="d-grid gap-2">
                    <a
                        class="btn btn-light"
                        href="<?= e(AVIP_REPOSITORY_URL) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <i class="bi bi-github me-2"></i>View GitHub repository
                    </a>

                    <a
                        class="btn btn-outline-light"
                        href="<?= e(AVIP_DEMO_URL) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <i class="bi bi-play-circle me-2"></i>Watch demo
                    </a>

                    <a class="btn btn-outline-light" href="#avip-evidence">
                        <i class="bi bi-images me-2"></i>View implementation
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <span class="eyebrow">THE PROBLEM</span>
            </div>

            <div class="col-lg-8">
                <h2>Fragmented knowledge and repetitive administrative work</h2>

                <p class="text-secondary-custom">
                    Administrative operations depended on physical documents,
                    extensive spreadsheets, informal knowledge and repeated human
                    escalation. This increased retrieval time, operational errors and
                    dependency on specific staff members.
                </p>

                <p class="text-secondary-custom mb-0">
                    Information was distributed across documents and structured
                    operational records, requiring different approaches depending on
                    whether a consultation needed institutional knowledge or current
                    transactional data.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-space section-panel">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <span class="eyebrow">THE SOLUTION</span>
            </div>

            <div class="col-lg-8">
                <h2>Specialized AI agents for different operational domains</h2>

                <p class="text-secondary-custom">
                    AVIP combines retrieval-augmented generation for institutional
                    documentation with specialized agents capable of consulting
                    structured operational information through custom application APIs.
                </p>

                <p class="text-secondary-custom mb-0">
                    The web platform acts as the operational interface while Flowise
                    orchestrates the AI workflows and agent logic, OpenAI provides the
                    language and embedding models, and PHP with MariaDB exposes the
                    required application data.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <span class="eyebrow">SYSTEM DESIGN</span>
        <h2 class="mt-2 mb-4">Different data sources, different AI strategies</h2>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="case-info-card h-100">
                    <h3 class="h5">Document-based knowledge</h3>

                    <p class="text-secondary-custom mb-0">
                        RAG workflows transform institutional PDF and CSV content into
                        retrievable knowledge so assistants can answer questions using
                        relevant organizational information instead of relying only on
                        the model's general knowledge.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="case-info-card h-100">
                    <h3 class="h5">Structured operational data</h3>

                    <p class="text-secondary-custom mb-0">
                        Other assistants use agent workflows connected to custom PHP
                        APIs to retrieve structured information from MariaDB and provide
                        responses based on current system records.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space section-panel">
    <div class="container">
        <span class="eyebrow">SPECIALIZED AGENTS</span>
        <h2 class="mt-2 mb-4">One platform, multiple operational domains</h2>

        <div class="row g-3">
            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Administrative</span>
                    <strong>RAG</strong>
                    <small>Institutional documentation</small>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Logistics</span>
                    <strong>Agent</strong>
                    <small>Structured warehouse data</small>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Nutrition</span>
                    <strong>Agent</strong>
                    <small>Structured student data</small>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Nursing</span>
                    <strong>Agent</strong>
                    <small>Structured care records</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <span class="eyebrow">MEASURED IMPACT</span>
        <h2 class="mt-2 mb-4">AS IS vs TO BE</h2>

        <div class="row g-3">
            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Queries resolved without escalation</span>
                    <strong>23.5% → 90.3%</strong>
                    <small>+66.8 percentage points</small>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Administrative error rate</span>
                    <strong>4.20% → 1.13%</strong>
                    <small>73.1% relative reduction</small>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Physical-document usage</span>
                    <strong>17.2% → 1.67%</strong>
                    <small>90.3% relative reduction</small>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Updated logistics records</span>
                    <strong>9.52% → 45.4%</strong>
                    <small>+35.88 percentage points</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space section-panel" id="avip-evidence">
    <div class="container">
        <span class="eyebrow">IMPLEMENTATION EVIDENCE</span>
        <h2 class="mt-2 mb-5">From AI orchestration to operational use</h2>

        <div class="evidence-stack">

            <figure class="evidence-card">
                <img
                    src="/assets/img/avip/agents.png"
                    alt="AVIP specialized assistants platform"
                    loading="lazy"
                >

                <figcaption>
                    <strong>Specialized assistants</strong>
                    <span>
                        Operational interface exposing assistants for administrative,
                        logistics, nutrition and nursing use cases.
                    </span>
                </figcaption>
            </figure>

            <figure class="evidence-card">
                <img
                    src="/assets/img/avip/rag-workflow.png"
                    alt="AVIP retrieval augmented generation workflow in Flowise"
                    loading="lazy"
                >

                <figcaption>
                    <strong>RAG Knowledge Workflow · Flowise</strong>
                    <span>
                        Document ingestion, embeddings, vector retrieval and language-model
                        generation for institutional knowledge consultations.
                    </span>
                </figcaption>
            </figure>

            <figure class="evidence-card">
                <img
                    src="/assets/img/avip/structured-data-agentflow.png"
                    alt="AVIP structured data agent workflow in Flowise"
                    loading="lazy"
                >

                <figcaption>
                    <strong>Structured-Data Agentflow · Flowise</strong>
                    <span>
                        Agent orchestration using application APIs to retrieve structured
                        operational data before generating a natural-language response.
                    </span>
                </figcaption>
            </figure>

            <figure class="evidence-card">
                <img
                    src="/assets/img/avip/assistant-maintenance.png"
                    alt="AVIP assistant administration interface"
                    loading="lazy"
                >

                <figcaption>
                    <strong>Assistant Administration</strong>
                    <span>
                        Management interface for configuring assistants, operational
                        endpoints, availability and assigned performance indicators.
                    </span>
                </figcaption>
            </figure>

            <figure class="evidence-card">
                <img
                    src="/assets/img/avip/dashboard.png"
                    alt="OpenAI API activity generated during AVIP operation"
                    loading="lazy"
                >

                <figcaption>
                    <strong>AI Service Usage</strong>
                    <span>
                        API activity generated during development, testing and operation
                        of the AVIP intelligent assistants.
                    </span>
                </figcaption>
            </figure>

        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <span class="eyebrow">TECH STACK</span>
            </div>

            <div class="col-lg-8">
                <h2 class="mb-4">Technologies used</h2>

                <div class="d-flex flex-wrap gap-2">
                    <span class="tech-badge">Flowise</span>
                    <span class="tech-badge">OpenAI</span>
                    <span class="tech-badge">RAG</span>
                    <span class="tech-badge">Agentflows</span>
                    <span class="tech-badge">PHP</span>
                    <span class="tech-badge">MariaDB</span>
                    <span class="tech-badge">Bootstrap</span>
                    <span class="tech-badge">JavaScript</span>
                    <span class="tech-badge">REST APIs</span>
                    <span class="tech-badge">GitHub</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space section-panel">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <span class="eyebrow">ENGINEERING APPROACH</span>
            </div>

            <div class="col-lg-8">
                <h2>AI integrated into an existing operational system</h2>

                <p class="text-secondary-custom">
                    AVIP was implemented as more than a standalone chatbot. The assistants
                    were integrated into an authenticated PHP application containing
                    users, operational modules, assistant configuration and measurement
                    of process indicators.
                </p>

                <p class="text-secondary-custom mb-0">
                    This allowed the implementation to evaluate not only whether the AI
                    could answer questions, but whether its introduction improved
                    measurable administrative processes.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container text-center">
        <span class="eyebrow">SOURCE CODE</span>

        <h2 class="mt-2 mb-3">
            Explore the AVIP implementation
        </h2>

        <p class="text-secondary-custom mb-4">
            Source code, architecture, workflows, diagrams, evidence and technical
            documentation are available in the project repository.
        </p>

        <a
            class="btn btn-light btn-lg"
            href="<?= e(AVIP_REPOSITORY_URL) ?>"
            target="_blank"
            rel="noopener noreferrer"
        >
            <i class="bi bi-github me-2"></i>View AVIP on GitHub
        </a>
    </div>
</section>