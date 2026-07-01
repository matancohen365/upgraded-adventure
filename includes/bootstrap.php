<?php

declare(strict_types=1);

require_once __DIR__ . '/Validator.php';
require_once __DIR__ . '/SignupRepository.php';
require_once __DIR__ . '/SignupService.php';

function vector_config(): array
{
    static $config = null;

    if ($config === null) {
        $config = require __DIR__ . '/config.php';
    }

    return $config;
}

function vector_json_response(array $payload, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store');
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
    exit;
}

function vector_read_json_body(): array
{
    $raw = file_get_contents('php://input');

    if ($raw === false || trim($raw) === '') {
        return [];
    }

    $decoded = json_decode($raw, true);

    if (!is_array($decoded)) {
        vector_json_response([
            'success' => false,
            'message' => 'Invalid JSON payload.',
        ], 400);
    }

    return $decoded;
}
