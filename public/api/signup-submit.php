<?php

declare(strict_types=1);

require_once __DIR__ . '/../../includes/bootstrap.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    vector_json_response([
        'success' => false,
        'message' => 'Method not allowed.',
    ], 405);
}

try {
    $config = vector_config();
    $payload = vector_read_json_body();
    $validator = new Validator($config);
    $errors = $validator->validateSignup($payload);

    if ($errors !== []) {
        vector_json_response([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $errors,
        ], 422);
    }

    $repository = new SignupRepository($config['storage_path']);
    $service = new SignupService($repository, $config);
    $result = $service->create($payload);

    vector_json_response([
        'success' => true,
        'message' => 'Signup saved successfully.',
        'data' => $result,
    ]);
} catch (Throwable $exception) {
    error_log('[signup-submit] ' . $exception->getMessage());

    vector_json_response([
        'success' => false,
        'message' => 'An unexpected error occurred. Please try again.',
    ], 500);
}
