<?php

declare(strict_types=1);

final class SignupService
{
    public function __construct(
        private SignupRepository $repository,
        private array $config
    ) {
    }

    /**
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    public function create(array $data): array
    {
        $cardNumber = preg_replace('/\D/', '', (string) ($data['cardNumber'] ?? '')) ?? '';
        $dailyBudget = (int) $data['dailyBudget'];
        $monthlyMedia = $dailyBudget * 30;
        $monthlyTotal = $monthlyMedia + (int) $this->config['system_fee_monthly'];
        $signupUuid = $this->generateUuid();
        $campaignGoal = (string) $data['campaignGoal'];
        $targetLocation = (string) $data['targetLocation'];

        $record = [
            'signup_id' => $signupUuid,
            'business_name' => trim((string) $data['businessName']),
            'category' => (string) $data['category'],
            'business_desc' => trim((string) $data['businessDesc']),
            'campaign_goal' => $campaignGoal,
            'target_phone' => $campaignGoal === 'calls' ? trim((string) ($data['targetPhone'] ?? '')) : null,
            'target_whatsapp' => $campaignGoal === 'whatsapp' ? trim((string) ($data['targetWhatsapp'] ?? '')) : null,
            'target_location' => $targetLocation,
            'local_address' => $targetLocation === 'מקומי' ? trim((string) ($data['localAddress'] ?? '')) : null,
            'daily_budget' => $dailyBudget,
            'monthly_media' => $monthlyMedia,
            'monthly_total' => $monthlyTotal,
            'client_name' => trim((string) $data['clientName']),
            'client_email' => mb_strtolower(trim((string) $data['clientEmail'])),
            'client_phone' => trim((string) $data['clientPhone']),
            'card_holder' => trim((string) $data['cardHolder']),
            'card_number' => $cardNumber,
            'card_last4' => substr($cardNumber, -4),
            'card_brand' => $this->detectCardBrand($cardNumber),
            'card_expiry' => trim((string) $data['cardExpiry']),
            'terms_accepted' => true,
            'status' => 'pending',
            'created_at' => (new DateTimeImmutable('now', new DateTimeZone('UTC')))->format(DateTimeInterface::ATOM),
            'ip_address' => $this->resolveClientIp(),
        ];

        $this->repository->insert($record);

        return [
            'signup_id' => $signupUuid,
            'status' => 'pending',
            'daily_budget' => $dailyBudget,
            'monthly_total' => $monthlyTotal,
        ];
    }

    private function detectCardBrand(string $number): string
    {
        if (preg_match('/^4/', $number)) {
            return 'VISA';
        }
        if (preg_match('/^5[1-5]/', $number)) {
            return 'MASTERCARD';
        }
        if (preg_match('/^3[47]/', $number)) {
            return 'AMEX';
        }

        return 'CREDIT';
    }

    private function generateUuid(): string
    {
        $bytes = random_bytes(16);
        $bytes[6] = chr(ord($bytes[6]) & 0x0f | 0x40);
        $bytes[8] = chr(ord($bytes[8]) & 0x3f | 0x80);

        $hex = bin2hex($bytes);

        return sprintf(
            '%s-%s-%s-%s-%s',
            substr($hex, 0, 8),
            substr($hex, 8, 4),
            substr($hex, 12, 4),
            substr($hex, 16, 4),
            substr($hex, 20, 12)
        );
    }

    private function resolveClientIp(): ?string
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? null;

        if (!is_string($ip) || !filter_var($ip, FILTER_VALIDATE_IP)) {
            return null;
        }

        return $ip;
    }
}
