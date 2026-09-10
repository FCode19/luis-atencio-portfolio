<?php
return [
    [
        'slug' => 'bankops',
        'name' => 'BankOps AI',
        'subtitle' => 'AI-Assisted Banking Operations & RPA',
        'description' => 'AI-assisted banking operations prototype combining tool-using agents, deterministic validation, human approval, telemetry, evaluation and controlled RPA execution.',
        'stack' => ['n8n', 'OpenAI', 'Python / FastAPI', 'IBM Db2', 'Power Automate Desktop', 'PHP'],
        'metrics' => [
            'Automated Python tests' => '74 passed',
            'AI evaluation baseline' => '15 / 18',
            'Initial evaluation score' => '83.3%',
        ],
        'url' => '/projects/bankops',
    ],
    [
        'slug' => 'avip',
        'name' => 'AVIP',
        'subtitle' => 'Asistente Virtual Inteligente de Praga',
        'description' => 'AI-powered platform with specialized agents, RAG workflows and structured-data integrations for administrative operations.',
        'stack' => ['Flowise', 'OpenAI', 'RAG', 'PHP', 'MariaDB', 'Bootstrap'],
        'metrics' => [
            'Queries without escalation' => '23.5% → 90.3%',
            'Administrative errors' => '↓ 73.1%',
            'Physical-document usage' => '↓ 90.3%',
        ],
        'url' => '/projects/avip',
    ],
];