document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('.portfolio-nav');
    const languageButtons = [...document.querySelectorAll('[data-language]')];
    const storageKey = 'luis-atencio-portfolio-language';

    const translations = {
        'Projects': 'Proyectos',
        'View GitHub repository': 'Ver repositorio en GitHub',
        'View implementation': 'Ver implementación',
        'Watch demo': 'Ver demostración',
        'THE PROBLEM': 'EL PROBLEMA',
        'THE SOLUTION': 'LA SOLUCIÓN',
        'ARCHITECTURE': 'ARQUITECTURA',
        'AI ENGINEERING': 'INGENIERÍA DE IA',
        'VALIDATION': 'VALIDACIÓN',
        'HUMAN-IN-THE-LOOP': 'HUMANO EN EL CICLO',
        'RPA EXECUTION': 'EJECUCIÓN RPA',
        'IMPLEMENTATION EVIDENCE': 'EVIDENCIA DE IMPLEMENTACIÓN',
        'TECH STACK': 'TECNOLOGÍAS',
        'CURRENT SCOPE': 'ALCANCE ACTUAL',
        'SOURCE CODE': 'CÓDIGO FUENTE',
        'AI AGENTS · TOOL CALLING · HUMAN-IN-THE-LOOP · RPA': 'AGENTES DE IA · USO DE HERRAMIENTAS · HUMANO EN EL CICLO · RPA',
        'AI-Assisted Banking Operations & RPA': 'Operaciones bancarias asistidas por IA y RPA',
        'Technical banking-operations prototype that combines AI agents, deterministic business rules, human authorization, telemetry, evaluation and controlled RPA execution.': 'Prototipo técnico de operaciones bancarias que combina agentes de IA, reglas de negocio deterministas, autorización humana, telemetría, evaluación y ejecución RPA controlada.',
        'Automating banking operations without delegating critical decisions to AI': 'Automatizar operaciones bancarias sin delegar decisiones críticas a la IA',
        'Banking workflows can combine large amounts of operational data, repetitive validation and administrative processing. Introducing generative AI into these processes also creates an important design challenge: the model should assist analysis without autonomously executing sensitive financial operations.': 'Los flujos bancarios pueden combinar grandes volúmenes de datos operativos, validaciones repetitivas y procesamiento administrativo. Introducir IA generativa en estos procesos también crea un reto de diseño importante: el modelo debe asistir el análisis sin ejecutar de forma autónoma operaciones financieras sensibles.',
        'BankOps AI was designed as a synthetic banking environment to explore how AI agents, deterministic controls, human review and RPA can work together while maintaining clear operational boundaries and auditability.': 'BankOps AI fue diseñado como un entorno bancario sintético para explorar cómo los agentes de IA, los controles deterministas, la revisión humana y RPA pueden trabajar juntos manteniendo límites operativos claros y auditabilidad.',
        'AI for analysis. Rules for control. Humans for authorization.': 'IA para analizar. Reglas para controlar. Personas para autorizar.',
        'The solution integrates an operational PHP portal with IBM Db2, a Python/FastAPI tool layer, n8n AI workflows and Power Automate Desktop. The AI agent can retrieve information through controlled tools and produce structured outputs, while deterministic services independently evaluate operational readiness.': 'La solución integra un portal operativo en PHP con IBM Db2, una capa de herramientas en Python/FastAPI, flujos de IA en n8n y Power Automate Desktop. El agente consulta información mediante herramientas controladas y genera salidas estructuradas, mientras servicios deterministas evalúan de forma independiente la preparación operativa.',
        'Cases that require additional verification remain under human review. RPA execution is only enabled after an explicit administrative authorization and is limited to generating a review dossier rather than modifying financial information.': 'Los casos que requieren verificación adicional permanecen bajo revisión humana. La ejecución RPA solo se habilita después de una autorización administrativa explícita y se limita a generar un expediente de revisión, sin modificar información financiera.',
        'Separation of responsibilities': 'Separación de responsabilidades',
        'AI orchestration': 'Orquestación de IA',
        'Tool calling and structured output': 'Uso de herramientas y salida estructurada',
        'Deterministic services': 'Servicios deterministas',
        'Validation and business rules': 'Validación y reglas de negocio',
        'Operational data': 'Datos operativos',
        'Claims, transfers and audit trail': 'Reclamos, transferencias y trazabilidad',
        'Administrative automation': 'Automatización administrativa',
        'Authorized dossier generation': 'Generación autorizada de expedientes',
        'Tool-using agent with structured and observable execution': 'Agente con herramientas, ejecución estructurada y observable',
        'Controlled tool use': 'Uso controlado de herramientas',
        'The agent retrieves banking-operation information through read-only tools instead of accessing the database directly. Tool access is protected through an internal API key and validated by the FastAPI layer.': 'El agente obtiene información de operaciones bancarias mediante herramientas de solo lectura en vez de acceder directamente a la base de datos. El acceso está protegido por una clave API interna y validado por la capa FastAPI.',
        'Structured output': 'Salida estructurada',
        'Agent responses are parsed against a defined output structure before being consumed by downstream workflow logic.': 'Las respuestas del agente se validan contra una estructura definida antes de ser utilizadas por la lógica posterior del flujo.',
        'Telemetry': 'Telemetría',
        'Agent executions capture operational telemetry including status, latency and token-related metrics, providing visibility into workflow behavior.': 'Las ejecuciones capturan telemetría operativa, incluyendo estado, latencia y métricas de tokens, para dar visibilidad al comportamiento del flujo.',
        'Evaluation pipeline': 'Flujo de evaluación',
        'A dedicated n8n evaluation workflow executes predefined cases, records actual tool behavior and evaluates the resulting contract and routing decisions.': 'Un flujo dedicado de evaluación en n8n ejecuta casos predefinidos, registra el comportamiento real de las herramientas y evalúa el contrato resultante y las decisiones de enrutamiento.',
        'Tested beyond the happy path': 'Probado más allá del camino ideal',
        'automated Python tests passed': 'pruebas automatizadas de Python superadas',
        'AI evaluation cases': 'casos de evaluación de IA',
        'initial evaluation baseline · 15/18': 'línea base de evaluación inicial · 15/18',
        'Evaluation failures were retained as engineering evidence rather than hidden: the initial suite identified structured-output and JSON-contract issues that remain documented in the repository.': 'Los fallos de evaluación se conservaron como evidencia de ingeniería: la suite inicial identificó problemas de salida estructurada y contrato JSON que siguen documentados en el repositorio.',
        'Automation stops where authorization becomes necessary': 'La automatización se detiene cuando la autorización es necesaria',
        'A possible duplicate transfer is treated as a candidate for review, not as a confirmed duplicate or fraud event. The deterministic layer can route a claim to manual review, where a supervisor evaluates the available information.': 'Una posible transferencia duplicada se trata como candidata a revisión, no como duplicado o fraude confirmado. La capa determinista puede enviar un reclamo a revisión manual para que un supervisor evalúe la información disponible.',
        'Only after explicit authorization can an RPA job be created. That job is restricted to producing an administrative review dossier and does not perform refunds, reversals, balance modifications or other financial mutations.': 'Solo después de una autorización explícita puede crearse un trabajo RPA. Este se restringe a producir un expediente administrativo y no realiza reembolsos, reversos, modificaciones de saldo ni otras mutaciones financieras.',
        'Controlled Power Automate Desktop execution': 'Ejecución controlada con Power Automate Desktop',
        'Power Automate Desktop retrieves the authorized dossier data from the local BankOps service, marks the RPA job as running, generates the administrative file and reports completion back to the portal.': 'Power Automate Desktop obtiene los datos autorizados del expediente desde el servicio local de BankOps, marca el trabajo RPA como en ejecución, genera el archivo administrativo y reporta la finalización al portal.',
        'The completed execution is recorded in the BankOps audit trail together with the responsible actor, timestamps and generated evidence reference.': 'La ejecución completada queda registrada en la trazabilidad de BankOps junto con el responsable, las marcas de tiempo y la referencia de evidencia generada.',
        'End-to-end implementation': 'Implementación de extremo a extremo',
        'BankOps operations portal': 'Portal de operaciones BankOps',
        'Operational interface for customers, accounts, transfers and claims.': 'Interfaz operativa para clientes, cuentas, transferencias y reclamos.',
        'AI Agent & Telemetry · n8n': 'Agente de IA y telemetría · n8n',
        'Tool-using agent with OpenAI, read-only tools, structured output, BankOps rules and execution telemetry.': 'Agente con OpenAI, herramientas de solo lectura, salida estructurada, reglas de BankOps y telemetría de ejecución.',
        'Claim Validation Subworkflow · n8n': 'Subflujo de validación de reclamos · n8n',
        'Deterministic readiness evaluation with Ready, Manual Review and Blocked routing.': 'Evaluación determinista con rutas Listo, Revisión manual y Bloqueado.',
        'AI Evaluation Pipeline · n8n': 'Flujo de evaluación de IA · n8n',
        'Repeatable evaluation workflow for cases, actual tool calls, error normalization and result validation.': 'Flujo repetible para casos, llamadas reales a herramientas, normalización de errores y validación de resultados.',
        'Administrative RPA · Power Automate Desktop': 'RPA administrativa · Power Automate Desktop',
        'Authorized dossier generation with explicit start and completion reporting to BankOps.': 'Generación autorizada de expedientes con reporte explícito de inicio y finalización a BankOps.',
        'Claim Audit Trail & RPA Success': 'Trazabilidad del reclamo y RPA exitosa',
        'Traceability from claim lifecycle and human authorization to successful RPA execution.': 'Trazabilidad desde el ciclo del reclamo y la autorización humana hasta la ejecución RPA exitosa.',
        'Prototype boundaries': 'Límites del prototipo',
        'BankOps AI uses synthetic banking data and is designed as a portfolio engineering prototype rather than a production banking platform. Infrastructure currently runs in a controlled development environment.': 'BankOps AI usa datos bancarios sintéticos y está diseñado como prototipo de ingeniería para portafolio, no como plataforma bancaria de producción. La infraestructura opera actualmente en un entorno de desarrollo controlado.',
        'The current RPA implementation uses a fixed development job identifier for the validated demonstration scenario. A production implementation would require dynamic job dispatch, centralized secret management, hardened infrastructure and production-grade identity controls.': 'La implementación RPA actual usa un identificador fijo de trabajo para el escenario validado. Una implementación productiva requeriría despacho dinámico, gestión centralizada de secretos, infraestructura reforzada y controles de identidad de nivel productivo.',
        'Explore the implementation': 'Explora la implementación',
        'Architecture, source code, tests, evaluation evidence and technical documentation are available in the repository.': 'La arquitectura, el código, las pruebas, la evidencia de evaluación y la documentación técnica están disponibles en el repositorio.',
        'View BankOps AI on GitHub': 'Ver BankOps AI en GitHub',
        'AI AGENTS · RAG · SYSTEMS INTEGRATION': 'AGENTES DE IA · RAG · INTEGRACIÓN DE SISTEMAS',
        'AI-powered platform designed to improve administrative operations through specialized agents, retrieval-augmented generation and structured-data integrations.': 'Plataforma impulsada por IA para mejorar operaciones administrativas mediante agentes especializados, generación aumentada por recuperación e integraciones de datos estructurados.',
        'Fragmented knowledge and repetitive administrative work': 'Conocimiento fragmentado y trabajo administrativo repetitivo',
        'Administrative operations depended on physical documents, extensive spreadsheets, informal knowledge and repeated human escalation. This increased retrieval time, operational errors and dependency on specific staff members.': 'Las operaciones administrativas dependían de documentos físicos, hojas de cálculo extensas, conocimiento informal y escalamiento humano repetido. Esto aumentaba el tiempo de consulta, los errores operativos y la dependencia de personal específico.',
        'Information was distributed across documents and structured operational records, requiring different approaches depending on whether a consultation needed institutional knowledge or current transactional data.': 'La información estaba distribuida entre documentos y registros operativos estructurados, lo que exigía enfoques distintos según la consulta necesitara conocimiento institucional o datos transaccionales actuales.',
        'Specialized AI agents for different operational domains': 'Agentes de IA especializados para distintos dominios operativos',
        'AVIP combines retrieval-augmented generation for institutional documentation with specialized agents capable of consulting structured operational information through custom application APIs.': 'AVIP combina generación aumentada por recuperación para documentación institucional con agentes especializados capaces de consultar información operativa estructurada mediante APIs personalizadas.',
        'The web platform acts as the operational interface while Flowise orchestrates the AI workflows and agent logic, OpenAI provides the language and embedding models, and PHP with MariaDB exposes the required application data.': 'La plataforma web funciona como interfaz operativa mientras Flowise orquesta los flujos y la lógica de agentes, OpenAI aporta los modelos de lenguaje y embeddings, y PHP con MariaDB expone los datos necesarios.',
        'SYSTEM DESIGN': 'DISEÑO DEL SISTEMA',
        'Different data sources, different AI strategies': 'Distintas fuentes de datos, distintas estrategias de IA',
        'Document-based knowledge': 'Conocimiento basado en documentos',
        'RAG workflows transform institutional PDF and CSV content into retrievable knowledge so assistants can answer questions using relevant organizational information instead of relying only on the model\'s general knowledge.': 'Los flujos RAG transforman contenido institucional PDF y CSV en conocimiento recuperable para que los asistentes respondan con información relevante de la organización y no solo con el conocimiento general del modelo.',
        'Structured operational data': 'Datos operativos estructurados',
        'Other assistants use agent workflows connected to custom PHP APIs to retrieve structured information from MariaDB and provide responses based on current system records.': 'Otros asistentes usan flujos de agentes conectados a APIs PHP personalizadas para obtener información estructurada de MariaDB y responder con base en registros actuales.',
        'SPECIALIZED AGENTS': 'AGENTES ESPECIALIZADOS',
        'One platform, multiple operational domains': 'Una plataforma, múltiples dominios operativos',
        'Administrative': 'Administrativo',
        'Institutional documentation': 'Documentación institucional',
        'Logistics': 'Logística',
        'Structured warehouse data': 'Datos estructurados de almacén',
        'Nutrition': 'Nutrición',
        'Structured student data': 'Datos estructurados de estudiantes',
        'Nursing': 'Enfermería',
        'Structured care records': 'Registros estructurados de atención',
        'MEASURED IMPACT': 'IMPACTO MEDIDO',
        'Queries resolved without escalation': 'Consultas resueltas sin escalamiento',
        '+66.8 percentage points': '+66.8 puntos porcentuales',
        'Administrative error rate': 'Tasa de errores administrativos',
        '73.1% relative reduction': '73.1% de reducción relativa',
        'Physical-document usage': 'Uso de documentos físicos',
        '90.3% relative reduction': '90.3% de reducción relativa',
        'Updated logistics records': 'Registros logísticos actualizados',
        '+35.88 percentage points': '+35.88 puntos porcentuales',
        'From AI orchestration to operational use': 'De la orquestación de IA al uso operativo',
        'Specialized assistants': 'Asistentes especializados',
        'Operational interface exposing assistants for administrative, logistics, nutrition and nursing use cases.': 'Interfaz operativa con asistentes para casos administrativos, logística, nutrición y enfermería.',
        'RAG Knowledge Workflow · Flowise': 'Flujo de conocimiento RAG · Flowise',
        'Document ingestion, embeddings, vector retrieval and language-model generation for institutional knowledge consultations.': 'Ingesta de documentos, embeddings, recuperación vectorial y generación con modelo de lenguaje para consultas de conocimiento institucional.',
        'Structured-Data Agentflow · Flowise': 'Flujo de agente con datos estructurados · Flowise',
        'Agent orchestration using application APIs to retrieve structured operational data before generating a natural-language response.': 'Orquestación de agentes que usa APIs de la aplicación para obtener datos operativos estructurados antes de generar una respuesta en lenguaje natural.',
        'Assistant Administration': 'Administración de asistentes',
        'Management interface for configuring assistants, operational endpoints, availability and assigned performance indicators.': 'Interfaz de gestión para configurar asistentes, endpoints operativos, disponibilidad e indicadores de rendimiento asignados.',
        'AI Service Usage': 'Uso del servicio de IA',
        'API activity generated during development, testing and operation of the AVIP intelligent assistants.': 'Actividad de API generada durante el desarrollo, las pruebas y la operación de los asistentes inteligentes de AVIP.',
        'Technologies used': 'Tecnologías utilizadas',
        'ENGINEERING APPROACH': 'ENFOQUE DE INGENIERÍA',
        'AI integrated into an existing operational system': 'IA integrada en un sistema operativo existente',
        'AVIP was implemented as more than a standalone chatbot. The assistants were integrated into an authenticated PHP application containing users, operational modules, assistant configuration and measurement of process indicators.': 'AVIP se implementó como algo más que un chatbot independiente. Los asistentes se integraron en una aplicación PHP autenticada con usuarios, módulos operativos, configuración de asistentes y medición de indicadores de proceso.',
        'This allowed the implementation to evaluate not only whether the AI could answer questions, but whether its introduction improved measurable administrative processes.': 'Esto permitió evaluar no solo si la IA podía responder preguntas, sino si su incorporación mejoraba procesos administrativos medibles.',
        'Explore the AVIP implementation': 'Explora la implementación de AVIP',
        'Source code, architecture, workflows, diagrams, evidence and technical documentation are available in the project repository.': 'El código fuente, la arquitectura, los flujos, los diagramas, la evidencia y la documentación técnica están disponibles en el repositorio del proyecto.',
        'View AVIP on GitHub': 'Ver AVIP en GitHub',
        'BankOps AI operations portal': 'Portal de operaciones de BankOps AI',
        'BankOps AI agent telemetry workflow in n8n': 'Flujo de telemetría del agente de BankOps AI en n8n',
        'BankOps claim validation subworkflow in n8n': 'Subflujo de validación de reclamos de BankOps en n8n',
        'BankOps AI evaluation runner in n8n': 'Ejecutor de evaluación de BankOps AI en n8n',
        'BankOps RPA workflow in Power Automate Desktop': 'Flujo RPA de BankOps en Power Automate Desktop',
        'BankOps claim audit trail and successful RPA job': 'Trazabilidad del reclamo de BankOps y trabajo RPA exitoso',
        'AVIP specialized assistants platform': 'Plataforma de asistentes especializados de AVIP',
        'AVIP retrieval augmented generation workflow in Flowise': 'Flujo de generación aumentada por recuperación de AVIP en Flowise',
        'AVIP structured data agent workflow in Flowise': 'Flujo del agente de datos estructurados de AVIP en Flowise',
        'AVIP assistant administration interface': 'Interfaz de administración de asistentes de AVIP',
        'OpenAI API activity generated during AVIP operation': 'Actividad de la API de OpenAI generada durante la operación de AVIP',
        'Page not found': 'Página no encontrada',
        'The page you requested does not exist.': 'La página solicitada no existe.',
        'Back home': 'Volver al inicio'
    };

    const getStoredLanguage = () => {
        try { return localStorage.getItem(storageKey); } catch (error) { return null; }
    };

    const getPreferredLanguage = () => {
        const stored = getStoredLanguage();
        if (stored === 'es' || stored === 'en') return stored;
        return navigator.language?.toLowerCase().startsWith('es') ? 'es' : 'en';
    };

    const translateLooseText = (language) => {
        const walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, {
            acceptNode(node) {
                const parent = node.parentElement;
                if (!parent || parent.closest('script, style, [data-i18n-en]')) return NodeFilter.FILTER_REJECT;
                return node.nodeValue.trim() ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
            }
        });
        const nodes = [];
        while (walker.nextNode()) nodes.push(walker.currentNode);
        nodes.forEach((node) => {
            if (!node.__originalValue) node.__originalValue = node.nodeValue;
            const original = node.__originalValue;
            const key = original.replace(/\s+/g, ' ').trim();
            const replacement = language === 'es' ? translations[key] : key;
            if (!replacement) return;
            const leading = original.match(/^\s*/)?.[0] ?? '';
            const trailing = original.match(/\s*$/)?.[0] ?? '';
            node.nodeValue = leading + replacement + trailing;
        });
    };

    const applyLanguage = (language, persist = true) => {
        document.documentElement.lang = language;
        document.querySelectorAll('[data-i18n-en][data-i18n-es]').forEach((element) => {
            element.textContent = language === 'es' ? element.dataset.i18nEs : element.dataset.i18nEn;
        });
        document.querySelectorAll('[data-i18n-placeholder-en][data-i18n-placeholder-es]').forEach((element) => {
            element.placeholder = language === 'es' ? element.dataset.i18nPlaceholderEs : element.dataset.i18nPlaceholderEn;
        });
        translateLooseText(language);
        languageButtons.forEach((button) => {
            const active = button.dataset.language === language;
            button.classList.toggle('is-active', active);
            button.setAttribute('aria-pressed', String(active));
        });
        const description = document.querySelector('meta[name="description"]');
        if (description) description.content = language === 'es'
            ? 'Portafolio de Luis Atencio: agentes de IA, automatización, integración de sistemas e ingeniería de software.'
            : "Luis Atencio's portfolio: AI agents, automation, systems integration and software engineering.";
        const titles = {
            '/': { en: 'Luis Atencio | AI & Automation Portfolio', es: 'Luis Atencio | Portafolio de IA y automatización' },
            '/projects': { en: 'Projects | Luis Atencio', es: 'Proyectos | Luis Atencio' },
            '/projects/bankops': { en: 'BankOps AI | Luis Atencio', es: 'BankOps AI | Luis Atencio' },
            '/projects/avip': { en: 'AVIP | Luis Atencio', es: 'AVIP | Luis Atencio' }
        };
        document.title = titles[window.location.pathname]?.[language] || (language === 'es' ? 'Página no encontrada | Luis Atencio' : 'Page not found | Luis Atencio');
        const menuButton = document.querySelector('.navbar-toggler');
        if (menuButton) menuButton.setAttribute('aria-label', language === 'es' ? 'Abrir navegación' : 'Open navigation');
        const modalClose = document.querySelector('.lightbox-close');
        if (modalClose) modalClose.setAttribute('aria-label', language === 'es' ? 'Cerrar imagen' : 'Close image');
        document.querySelectorAll('.evidence-card img').forEach((image) => {
            if (!image.dataset.altEn) image.dataset.altEn = image.alt;
            image.alt = language === 'es' ? (translations[image.dataset.altEn] || image.dataset.altEn) : image.dataset.altEn;
        });
        if (persist) {
            try { localStorage.setItem(storageKey, language); } catch (error) { /* Storage can be disabled. */ }
        }
        document.dispatchEvent(new CustomEvent('portfolio:languagechange', { detail: { language } }));
    };

    languageButtons.forEach((button) => button.addEventListener('click', () => applyLanguage(button.dataset.language)));
    applyLanguage(getPreferredLanguage(), false);

    const updateNavbar = () => navbar?.classList.toggle('is-scrolled', window.scrollY > 12);
    updateNavbar();
    window.addEventListener('scroll', updateNavbar, { passive: true });

    document.querySelectorAll('#mainNav .nav-link').forEach((link) => link.addEventListener('click', () => {
        const nav = document.querySelector('#mainNav');
        if (nav?.classList.contains('show') && window.bootstrap) bootstrap.Collapse.getOrCreateInstance(nav).hide();
    }));

    // One lightweight live request refreshes mutable metadata. Static PHP data remains the fallback.
    const syncGitHubMetadata = async () => {
        const status = document.querySelector('#githubSyncStatus');
        if (!status || !document.querySelector('[data-repo-name]')) return;
        try {
            const response = await fetch('https://api.github.com/users/FCode19/repos?per_page=100&sort=updated', {
                headers: { Accept: 'application/vnd.github+json' }
            });
            if (!response.ok) throw new Error(`GitHub ${response.status}`);
            const repos = await response.json();
            const byName = new Map(repos.map((repo) => [repo.name.toLowerCase(), repo]));
            document.querySelectorAll('[data-repo-name]').forEach((card) => {
                const repo = byName.get(card.dataset.repoName.toLowerCase());
                if (!repo) return;
                card.querySelector('[data-repo-stars]').textContent = repo.stargazers_count;
                card.querySelector('[data-repo-forks]').textContent = repo.forks_count;
            });
            status.dataset.i18nEn = 'Live GitHub metadata loaded';
            status.dataset.i18nEs = 'Metadatos actuales de GitHub cargados';
        } catch (error) {
            status.dataset.i18nEn = 'Offline snapshot in use';
            status.dataset.i18nEs = 'Usando instantánea local';
        }
        const language = document.documentElement.lang === 'es' ? 'es' : 'en';
        status.textContent = language === 'es' ? status.dataset.i18nEs : status.dataset.i18nEn;
    };
    syncGitHubMetadata();

    const visualization = document.querySelector('[data-language-visualization]');
    if (visualization) {
        const segments = [...visualization.querySelectorAll('[data-language-segment]')];
        const controls = [...visualization.querySelectorAll('[data-language-control]')];
        const chartValue = visualization.querySelector('[data-chart-value]');
        const chartLabel = visualization.querySelector('[data-chart-label]');
        const chartHint = visualization.querySelector('.language-chart-hint');
        const defaultValue = chartValue?.textContent || '18';
        let pinnedLanguage = null;

        const resetChart = () => {
            segments.forEach((segment) => {
                segment.classList.remove('is-active', 'is-muted');
                segment.setAttribute('aria-pressed', 'false');
            });
            controls.forEach((control) => {
                control.classList.remove('is-active', 'is-muted');
                control.setAttribute('aria-pressed', 'false');
            });
            if (chartValue) chartValue.textContent = defaultValue;
            if (chartLabel) chartLabel.textContent = document.documentElement.lang === 'es' ? 'repos públicos' : 'public repos';
            if (chartHint) chartHint.textContent = document.documentElement.lang === 'es' ? 'Selecciona un lenguaje' : 'Select a language';
        };

        const highlightLanguage = (language) => {
            const activeSegment = segments.find((segment) => segment.dataset.languageSegment === language);
            if (!activeSegment) return;
            segments.forEach((segment) => {
                const active = segment.dataset.languageSegment === language;
                segment.classList.toggle('is-active', active);
                segment.classList.toggle('is-muted', !active);
                segment.setAttribute('aria-pressed', String(active));
            });
            controls.forEach((control) => {
                const active = control.dataset.languageControl === language;
                control.classList.toggle('is-active', active);
                control.classList.toggle('is-muted', !active);
                control.setAttribute('aria-pressed', String(active));
            });
            if (chartValue) chartValue.textContent = `${activeSegment.dataset.languagePercent}%`;
            if (chartLabel) chartLabel.textContent = language;
            if (chartHint) chartHint.textContent = `${activeSegment.dataset.languageBytes} bytes`;
        };

        const bindChartItem = (element, language) => {
            element.setAttribute('aria-pressed', 'false');
            element.addEventListener('mouseenter', () => highlightLanguage(language));
            element.addEventListener('focus', () => highlightLanguage(language));
            element.addEventListener('mouseleave', () => pinnedLanguage ? highlightLanguage(pinnedLanguage) : resetChart());
            element.addEventListener('blur', () => pinnedLanguage ? highlightLanguage(pinnedLanguage) : resetChart());
            element.addEventListener('click', () => {
                pinnedLanguage = pinnedLanguage === language ? null : language;
                pinnedLanguage ? highlightLanguage(pinnedLanguage) : resetChart();
            });
            element.addEventListener('keydown', (event) => {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    pinnedLanguage = pinnedLanguage === language ? null : language;
                    pinnedLanguage ? highlightLanguage(pinnedLanguage) : resetChart();
                }
                if (event.key === 'Escape') {
                    pinnedLanguage = null;
                    resetChart();
                    element.blur();
                }
            });
        };

        segments.forEach((segment) => bindChartItem(segment, segment.dataset.languageSegment));
        controls.forEach((control) => bindChartItem(control, control.dataset.languageControl));
        document.addEventListener('portfolio:languagechange', () => pinnedLanguage ? highlightLanguage(pinnedLanguage) : resetChart());
        resetChart();
    }

    const contactForm = document.querySelector('#contactForm');
    if (contactForm) {
        const messageField = contactForm.querySelector('[name="message"]');
        const messageCount = contactForm.querySelector('[data-message-count]');
        const status = contactForm.querySelector('[data-contact-status]');
        const submitButton = contactForm.querySelector('button[type="submit"]');
        const submitLabel = contactForm.querySelector('[data-submit-label]');
        const captchaQuestion = contactForm.querySelector('[data-captcha-question]');
        const captchaToken = contactForm.querySelector('[name="captcha_token"]');

        const contactMessages = {
            success: { en: 'Message sent. Thank you — I’ll reply to your email.', es: 'Mensaje enviado. Gracias, responderé a tu correo.' },
            validation_error: { en: 'Please check your name, email and message. The message needs at least 20 characters.', es: 'Revisa tu nombre, correo y mensaje. El mensaje necesita al menos 20 caracteres.' },
            captcha_error: { en: 'The security answer is incorrect. Try the new operation.', es: 'La respuesta de seguridad es incorrecta. Intenta la nueva operación.' },
            too_fast: { en: 'Please take a moment to review the form and try again.', es: 'Tómate un momento para revisar el formulario e inténtalo nuevamente.' },
            rate_limited: { en: 'Too many messages were sent from this connection. Please try again in one hour.', es: 'Se enviaron demasiados mensajes desde esta conexión. Inténtalo nuevamente en una hora.' },
            csrf_error: { en: 'Your form session expired. Reload the page and try again.', es: 'La sesión del formulario expiró. Recarga la página e inténtalo nuevamente.' },
            mail_unavailable: { en: 'The mail service is temporarily unavailable. Please contact me through LinkedIn.', es: 'El servicio de correo no está disponible temporalmente. Contáctame por LinkedIn.' },
            mail_not_configured: { en: 'Email delivery is not configured yet. Please contact me through LinkedIn.', es: 'El envío de correo aún no está configurado. Contáctame por LinkedIn.' },
            method_not_allowed: { en: 'The form could not be submitted.', es: 'No se pudo enviar el formulario.' },
            network_error: { en: 'Connection error. Check your internet access and try again.', es: 'Error de conexión. Revisa tu acceso a internet e inténtalo nuevamente.' }
        };

        const showContactStatus = (code, success = false) => {
            const language = document.documentElement.lang === 'es' ? 'es' : 'en';
            const message = contactMessages[code] || contactMessages.network_error;
            status.textContent = message[language];
            status.dataset.statusCode = code;
            status.dataset.statusSuccess = String(success);
            status.classList.toggle('is-success', success);
            status.classList.toggle('is-error', !success);
        };

        const updateMessageCount = () => {
            if (messageCount && messageField) messageCount.textContent = String(messageField.value.length);
        };
        messageField?.addEventListener('input', updateMessageCount);
        updateMessageCount();
        document.addEventListener('portfolio:languagechange', () => {
            if (status.dataset.statusCode) showContactStatus(status.dataset.statusCode, status.dataset.statusSuccess === 'true');
        });

        contactForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            if (!contactForm.reportValidity()) return;
            const language = document.documentElement.lang === 'es' ? 'es' : 'en';
            submitButton.disabled = true;
            submitLabel.textContent = language === 'es' ? 'Enviando…' : 'Sending…';
            status.textContent = '';
            delete status.dataset.statusCode;
            delete status.dataset.statusSuccess;
            status.classList.remove('is-success', 'is-error');

            try {
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    body: new FormData(contactForm),
                    headers: { Accept: 'application/json' },
                    credentials: 'same-origin'
                });
                const result = await response.json();
                if (result.challenge?.question && captchaQuestion) captchaQuestion.textContent = result.challenge.question;
                if (result.challenge?.token && captchaToken) captchaToken.value = result.challenge.token;
                showContactStatus(result.code, response.ok && result.code === 'success');
                if (response.ok && result.code === 'success') {
                    contactForm.reset();
                    updateMessageCount();
                } else {
                    const captchaField = contactForm.querySelector('[name="captcha"]');
                    if (captchaField) captchaField.value = '';
                }
            } catch (error) {
                showContactStatus('network_error');
            } finally {
                submitButton.disabled = false;
                const currentLanguage = document.documentElement.lang === 'es' ? 'es' : 'en';
                submitLabel.textContent = currentLanguage === 'es' ? 'Enviar mensaje' : 'Send message';
            }
        });
    }

    const lightbox = document.querySelector('#portfolioLightbox');
    const lightboxImage = lightbox?.querySelector('.lightbox-image');
    const lightboxCaption = lightbox?.querySelector('.lightbox-caption');
    const closeButton = lightbox?.querySelector('.lightbox-close');
    let activeImage = null;

    const getCaption = (image) => image.closest('figure')?.querySelector('figcaption')?.innerText.trim() || image.alt;
    const openLightbox = (image) => {
        if (!lightbox || !lightboxImage || !lightboxCaption) return;
        activeImage = image;
        lightboxImage.src = image.currentSrc || image.src;
        lightboxImage.alt = image.alt;
        lightboxCaption.textContent = getCaption(image);
        lightbox.hidden = false;
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
        closeButton?.focus();
    };
    const closeLightbox = () => {
        if (!lightbox || lightbox.hidden) return;
        lightbox.hidden = true;
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
        lightboxImage.removeAttribute('src');
        activeImage?.focus();
        activeImage = null;
    };

    document.querySelectorAll('.evidence-card img').forEach((image) => {
        image.tabIndex = 0;
        image.setAttribute('role', 'button');
        image.setAttribute('aria-label', `${image.alt}. ${document.documentElement.lang === 'es' ? 'Abrir imagen ampliada' : 'Open enlarged image'}`);
        image.addEventListener('click', () => openLightbox(image));
        image.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); openLightbox(image); }
        });
    });
    lightbox?.querySelectorAll('[data-lightbox-close]').forEach((element) => element.addEventListener('click', closeLightbox));
    document.addEventListener('keydown', (event) => {
        if (!lightbox || lightbox.hidden) return;
        if (event.key === 'Escape') closeLightbox();
        if (event.key === 'Tab') {
            event.preventDefault();
            closeButton?.focus();
        }
    });
    document.addEventListener('portfolio:languagechange', () => {
        if (activeImage && lightboxCaption) lightboxCaption.textContent = getCaption(activeImage);
        document.querySelectorAll('.evidence-card img').forEach((image) => image.setAttribute('aria-label', `${image.alt}. ${document.documentElement.lang === 'es' ? 'Abrir imagen ampliada' : 'Open enlarged image'}`));
    });
});
