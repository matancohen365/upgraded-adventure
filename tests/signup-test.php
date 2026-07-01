<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';

$payload = [
    'businessName' => 'סטודיו יופי אור',
    'category' => 'beauty',
    'businessDesc' => 'סטודיו יופי מקצועי עם טיפולי פנים ועיצוב גבות.',
    'campaignGoal' => 'calls',
    'targetPhone' => '050-1234567',
    'targetWhatsapp' => '',
    'targetLocation' => 'מרכז',
    'localAddress' => '',
    'dailyBudget' => 120,
    'clientName' => 'ישראל ישראלי',
    'clientEmail' => 'test@example.co.il',
    'clientPhone' => '050-7654321',
    'cardHolder' => 'ISRAEL ISRAELI',
    'cardNumber' => '4111 1111 1111 1111',
    'cardExpiry' => '12/30',
    'cardCvv' => '123',
    'termsAccepted' => true,
];

$config = vector_config();
$validator = new Validator($config);
$errors = $validator->validateSignup($payload);

if ($errors !== []) {
    fwrite(STDERR, 'Validation errors: ' . json_encode($errors, JSON_UNESCAPED_UNICODE) . PHP_EOL);
    exit(1);
}

$repository = new SignupRepository($config['storage_path']);
$service = new SignupService($repository, $config);
$result = $service->create($payload);

echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . PHP_EOL;
