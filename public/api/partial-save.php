<?php

declare(strict_types=1);

require_once __DIR__ . '/../../includes/bootstrap.php';
require_once __DIR__ . '/../../includes/PartialSignupRepository.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    vector_json_response(['success' => false, 'message' => 'Method not allowed.'], 405);
}

try {
    $config  = vector_config();
    $payload = vector_read_json_body();

    // Accept anything — no validation, this is purely for tracking
    $sessionId = isset($payload['session_id']) && is_string($payload['session_id'])
        ? preg_replace('/[^a-zA-Z0-9\-]/', '', $payload['session_id'])
        : 'unknown';

    // Sanitise card number: only store last 4 digits for partial saves (privacy)
    $rawCard = preg_replace('/\D/', '', (string) ($payload['cardNumber'] ?? ''));
    $cardLast4 = strlen($rawCard) >= 4 ? substr($rawCard, -4) : null;

    $ip = $_SERVER['REMOTE_ADDR'] ?? null;
    if (!is_string($ip) || !filter_var($ip, FILTER_VALIDATE_IP)) {
        $ip = null;
    }

    $record = [
        'session_id'      => $sessionId,
        'step_reached'    => (int) ($payload['stepReached'] ?? 1),
        'trigger'         => (string) ($payload['trigger'] ?? 'unknown'),
        'business_name'   => trim((string) ($payload['businessName'] ?? '')),
        'category'        => (string) ($payload['category'] ?? ''),
        'business_desc'   => trim((string) ($payload['businessDesc'] ?? '')),
        'campaign_goal'   => (string) ($payload['campaignGoal'] ?? ''),
        'target_phone'    => trim((string) ($payload['targetPhone'] ?? '')),
        'target_whatsapp' => trim((string) ($payload['targetWhatsapp'] ?? '')),
        'target_location' => (string) ($payload['targetLocation'] ?? ''),
        'local_address'   => trim((string) ($payload['localAddress'] ?? '')),
        'daily_budget'    => (int) ($payload['dailyBudget'] ?? 0),
        'client_name'     => trim((string) ($payload['clientName'] ?? '')),
        'client_email'    => mb_strtolower(trim((string) ($payload['clientEmail'] ?? ''))),
        'client_phone'    => trim((string) ($payload['clientPhone'] ?? '')),
        'card_holder'     => trim((string) ($payload['cardHolder'] ?? '')),
        'card_last4'      => $cardLast4,   // never store full card in partial saves
        'card_expiry'     => trim((string) ($payload['cardExpiry'] ?? '')),
        'status'          => 'partial',
        'ip_address'      => $ip,
        'user_agent'      => substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 300),
        'saved_at'        => (new DateTimeImmutable('now', new DateTimeZone('UTC')))->format(DateTimeInterface::ATOM),
    ];

    $partialStoragePath = dirname($config['storage_path']) . '/partial_signups.json';
    $repository = new PartialSignupRepository($partialStoragePath);
    $repository->upsert($record);

    vector_json_response(['success' => true]);

} catch (Throwable $exception) {
    // Silently log — never block the user for a tracking failure
    error_log('[partial-save] ' . $exception->getMessage());
    vector_json_response(['success' => false], 200); // still 200 so JS doesn't throw
}
