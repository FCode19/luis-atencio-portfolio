<section class="project-hero">
    <div class="container">
        <a href="/projects" class="back-link">
            <i class="bi bi-arrow-left"></i> Projects
        </a>

        <div class="row g-5 align-items-end mt-2">
            <div class="col-lg-8">
                <span class="eyebrow">AI AGENTS · TOOL CALLING · HUMAN-IN-THE-LOOP · RPA</span>

                <h1 class="display-4 fw-bold mt-3">BankOps AI</h1>

                <p class="h4 fw-normal text-secondary-custom">
                    AI-Assisted Banking Operations & RPA
                </p>

                <p class="lead mt-4">
                    Technical banking-operations prototype that combines AI agents,
                    deterministic business rules, human authorization, telemetry,
                    evaluation and controlled RPA execution.
                </p>
            </div>

            <div class="col-lg-4">
                <div class="d-grid gap-2">
                    <a class="btn btn-light"
                       href="<?= e(BANKOPS_REPOSITORY_URL) ?>"
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="bi bi-github me-2"></i>View GitHub repository
                    </a>

                    <a class="btn btn-outline-light" href="#evidence">
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
                <h2>Automating banking operations without delegating critical decisions to AI</h2>

                <p class="text-secondary-custom">
                    Banking workflows can combine large amounts of operational data,
                    repetitive validation and administrative processing. Introducing
                    generative AI into these processes also creates an important design
                    challenge: the model should assist analysis without autonomously
                    executing sensitive financial operations.
                </p>

                <p class="text-secondary-custom mb-0">
                    BankOps AI was designed as a synthetic banking environment to explore
                    how AI agents, deterministic controls, human review and RPA can work
                    together while maintaining clear operational boundaries and auditability.
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
                <h2>AI for analysis. Rules for control. Humans for authorization.</h2>

                <p class="text-secondary-custom">
                    The solution integrates an operational PHP portal with IBM Db2,
                    a Python/FastAPI tool layer, n8n AI workflows and Power Automate Desktop.
                    The AI agent can retrieve information through controlled tools and
                    produce structured outputs, while deterministic services independently
                    evaluate operational readiness.
                </p>

                <p class="text-secondary-custom mb-0">
                    Cases that require additional verification remain under human review.
                    RPA execution is only enabled after an explicit administrative
                    authorization and is limited to generating a review dossier rather
                    than modifying financial information.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <span class="eyebrow">ARCHITECTURE</span>
        <h2 class="mt-2 mb-4">Separation of responsibilities</h2>

        <div class="row g-3">
            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>AI orchestration</span>
                    <strong>n8n + OpenAI</strong>
                    <small>Tool calling and structured output</small>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Deterministic services</span>
                    <strong>FastAPI</strong>
                    <small>Validation and business rules</small>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Operational data</span>
                    <strong>IBM Db2</strong>
                    <small>Claims, transfers and audit trail</small>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="impact-card h-100">
                    <span>Administrative automation</span>
                    <strong>Power Automate</strong>
                    <small>Authorized dossier generation</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space section-panel">
    <div class="container">
        <span class="eyebrow">AI ENGINEERING</span>
        <h2 class="mt-2 mb-4">Tool-using agent with structured and observable execution</h2>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="case-info-card h-100">
                    <h3 class="h5">Controlled tool use</h3>
                    <p class="text-secondary-custom mb-0">
                        The agent retrieves banking-operation information through read-only
                        tools instead of accessing the database directly. Tool access is
                        protected through an internal API key and validated by the FastAPI layer.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="case-info-card h-100">
                    <h3 class="h5">Structured output</h3>
                    <p class="text-secondary-custom mb-0">
                        Agent responses are parsed against a defined output structure before
                        being consumed by downstream workflow logic.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="case-info-card h-100">
                    <h3 class="h5">Telemetry</h3>
                    <p class="text-secondary-custom mb-0">
                        Agent executions capture operational telemetry including status,
                        latency and token-related metrics, providing visibility into
                        workflow behavior.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="case-info-card h-100">
                    <h3 class="h5">Evaluation pipeline</h3>
                    <p class="text-secondary-custom mb-0">
                        A dedicated n8n evaluation workflow executes predefined cases,
                        records actual tool behavior and evaluates the resulting contract
                        and routing decisions.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <span class="eyebrow">VALIDATION</span>
        <h2 class="mt-2 mb-4">Tested beyond the happy path</h2>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="validation-card h-100">
                    <strong>74</strong>
                    <span>automated Python tests passed</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="validation-card h-100">
                    <strong>18</strong>
                    <span>AI evaluation cases</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="validation-card h-100">
                    <strong>83.3%</strong>
                    <span>initial evaluation baseline · 15/18</span>
                </div>
            </div>
        </div>

        <p class="project-note mt-4 mb-0">
            Evaluation failures were retained as engineering evidence rather than hidden:
            the initial suite identified structured-output and JSON-contract issues that
            remain documented in the repository.
        </p>
    </div>
</section>

<section class="section-space section-panel">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <span class="eyebrow">HUMAN-IN-THE-LOOP</span>
            </div>

            <div class="col-lg-8">
                <h2>Automation stops where authorization becomes necessary</h2>

                <p class="text-secondary-custom">
                    A possible duplicate transfer is treated as a candidate for review,
                    not as a confirmed duplicate or fraud event. The deterministic layer
                    can route a claim to manual review, where a supervisor evaluates
                    the available information.
                </p>

                <p class="text-secondary-custom mb-0">
                    Only after explicit authorization can an RPA job be created. That job
                    is restricted to producing an administrative review dossier and does
                    not perform refunds, reversals, balance modifications or other
                    financial mutations.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <span class="eyebrow">RPA EXECUTION</span>
            </div>

            <div class="col-lg-8">
                <h2>Controlled Power Automate Desktop execution</h2>

                <p class="text-secondary-custom">
                    Power Automate Desktop retrieves the authorized dossier data from the
                    local BankOps service, marks the RPA job as running, generates the
                    administrative file and reports completion back to the portal.
                </p>

                <p class="text-secondary-custom mb-0">
                    The completed execution is recorded in the BankOps audit trail together
                    with the responsible actor, timestamps and generated evidence reference.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-space section-panel" id="evidence">
    <div class="container">
        <span class="eyebrow">IMPLEMENTATION EVIDENCE</span>
        <h2 class="mt-2 mb-5">End-to-end implementation</h2>

        <div class="evidence-stack">

            <figure class="evidence-card">
                <img
                    src="/assets/img/bankops/portal-bankops.png"
                    alt="BankOps AI operations portal"
                    loading="lazy"
                >
                <figcaption>
                    <strong>BankOps operations portal</strong>
                    <span>
                        Operational interface for customers, accounts, transfers and claims.
                    </span>
                </figcaption>
            </figure>

            <figure class="evidence-card">
                <img
                    src="/assets/img/bankops/ai-agent-telemetry.png"
                    alt="BankOps AI agent telemetry workflow in n8n"
                    loading="lazy"
                >
                <figcaption>
                    <strong>AI Agent & Telemetry · n8n</strong>
                    <span>
                        Tool-using agent with OpenAI, read-only tools, structured output,
                        BankOps rules and execution telemetry.
                    </span>
                </figcaption>
            </figure>

            <figure class="evidence-card">
                <img
                    src="/assets/img/bankops/claim-validation-subworkflow.png"
                    alt="BankOps claim validation subworkflow in n8n"
                    loading="lazy"
                >
                <figcaption>
                    <strong>Claim Validation Subworkflow · n8n</strong>
                    <span>
                        Deterministic readiness evaluation with Ready, Manual Review and
                        Blocked routing.
                    </span>
                </figcaption>
            </figure>

            <figure class="evidence-card">
                <img
                    src="/assets/img/bankops/eval-runner.png"
                    alt="BankOps AI evaluation runner in n8n"
                    loading="lazy"
                >
                <figcaption>
                    <strong>AI Evaluation Pipeline · n8n</strong>
                    <span>
                        Repeatable evaluation workflow for cases, actual tool calls,
                        error normalization and result validation.
                    </span>
                </figcaption>
            </figure>

            <figure class="evidence-card">
                <img
                    src="/assets/img/bankops/power-automate-flow.png"
                    alt="BankOps RPA workflow in Power Automate Desktop"
                    loading="lazy"
                >
                <figcaption>
                    <strong>Administrative RPA · Power Automate Desktop</strong>
                    <span>
                        Authorized dossier generation with explicit start and completion
                        reporting to BankOps.
                    </span>
                </figcaption>
            </figure>

            <figure class="evidence-card">
                <img
                    src="/assets/img/bankops/claim-audit-rpa.png"
                    alt="BankOps claim audit trail and successful RPA job"
                    loading="lazy"
                >
                <figcaption>
                    <strong>Claim Audit Trail & RPA Success</strong>
                    <span>
                        Traceability from claim lifecycle and human authorization to
                        successful RPA execution.
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
                <div class="d-flex flex-wrap gap-2">
                    <span class="tech-badge">n8n</span>
                    <span class="tech-badge">OpenAI</span>
                    <span class="tech-badge">Python</span>
                    <span class="tech-badge">FastAPI</span>
                    <span class="tech-badge">IBM Db2</span>
                    <span class="tech-badge">Power Automate Desktop</span>
                    <span class="tech-badge">PHP</span>
                    <span class="tech-badge">Bootstrap</span>
                    <span class="tech-badge">Docker</span>
                    <span class="tech-badge">Pytest</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space section-panel">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <span class="eyebrow">CURRENT SCOPE</span>
            </div>

            <div class="col-lg-8">
                <h2>Prototype boundaries</h2>

                <p class="text-secondary-custom">
                    BankOps AI uses synthetic banking data and is designed as a portfolio
                    engineering prototype rather than a production banking platform.
                    Infrastructure currently runs in a controlled development environment.
                </p>

                <p class="text-secondary-custom mb-0">
                    The current RPA implementation uses a fixed development job identifier
                    for the validated demonstration scenario. A production implementation
                    would require dynamic job dispatch, centralized secret management,
                    hardened infrastructure and production-grade identity controls.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container text-center">
        <span class="eyebrow">SOURCE CODE</span>
        <h2 class="mt-2 mb-3">Explore the implementation</h2>

        <p class="text-secondary-custom mb-4">
            Architecture, source code, tests, evaluation evidence and technical
            documentation are available in the repository.
        </p>

        <a
            class="btn btn-light btn-lg"
            href="<?= e(BANKOPS_REPOSITORY_URL) ?>"
            target="_blank"
            rel="noopener noreferrer"
        >
            <i class="bi bi-github me-2"></i>View BankOps AI on GitHub
        </a>
    </div>
</section>