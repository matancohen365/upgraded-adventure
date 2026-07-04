<?php

declare(strict_types=1);

final class Validator
{
    public function __construct(private array $config)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return array<string, string>
     */
    public function validateSignup(array $data): array
    {
        $errors = [];

        $businessName = trim((string) ($data['businessName'] ?? ''));
        if (mb_strlen($businessName) < 2) {
            $errors['businessName'] = 'נא להזין את שם העסק';
        }

        $businessPhone = trim((string) ($data['businessPhone'] ?? ''));
        if (!$this->isValidPhone($businessPhone)) {
            $errors['businessPhone'] = 'נא להזין מספר טלפון תקין לעסק';
        }

        $category = (string) ($data['category'] ?? '');
        if (!in_array($category, $this->config['allowed_categories'], true)) {
            $errors['category'] = 'נא לבחור תחום פעילות';
        }

        $businessDesc = trim((string) ($data['businessDesc'] ?? ''));
        if (mb_strlen($businessDesc) < 10) {
            $errors['businessDesc'] = 'נא להזין תיאור קצר של העסק';
        }

        $campaignGoal = (string) ($data['campaignGoal'] ?? '');
        if (!in_array($campaignGoal, $this->config['allowed_goals'], true)) {
            $errors['campaignGoal'] = 'נא לבחור מטרת קמפיין';
        }

        $targetPhone = trim((string) ($data['targetPhone'] ?? ''));
        $targetWhatsapp = trim((string) ($data['targetWhatsapp'] ?? ''));

        if ($campaignGoal === 'calls' && !$this->isValidPhone($targetPhone)) {
            $errors['targetPhone'] = 'נא להזין מספר טלפון תקין לקבלת שיחות';
        }

        if ($campaignGoal === 'whatsapp' && !$this->isValidPhone($targetWhatsapp)) {
            $errors['targetWhatsapp'] = 'נא להזין מספר וואטסאפ תקין';
        }

        $targetLocation = (string) ($data['targetLocation'] ?? '');
        if (!in_array($targetLocation, $this->config['allowed_locations'], true)) {
            $errors['targetLocation'] = 'נא לבחור אזור פרסום';
        }

        $localAddress = trim((string) ($data['localAddress'] ?? ''));
        if ($targetLocation === 'מקומי' && mb_strlen($localAddress) < 5) {
            $errors['localAddress'] = 'נא להזין כתובת לעסק';
        }

        $dailyBudget = (int) ($data['dailyBudget'] ?? 0);
        if ($dailyBudget < $this->config['budget_min'] || $dailyBudget > $this->config['budget_max']) {
            $errors['dailyBudget'] = 'תקציב יומי לא תקין';
        }

        $clientName = trim((string) ($data['clientName'] ?? ''));
        if (mb_strlen($clientName) < 2) {
            $errors['clientName'] = 'נא להזין שם מלא';
        }

        $clientEmail = trim((string) ($data['clientEmail'] ?? ''));
        if (!filter_var($clientEmail, FILTER_VALIDATE_EMAIL)) {
            $errors['clientEmail'] = 'נא להזין כתובת אימייל תקינה';
        }

        $clientPhone = trim((string) ($data['clientPhone'] ?? ''));
        if (!$this->isValidPhone($clientPhone)) {
            $errors['clientPhone'] = 'נא להזין טלפון נייד תקין';
        }

        $cardHolder = trim((string) ($data['cardHolder'] ?? ''));
        if (mb_strlen($cardHolder) < 3) {
            $errors['cardHolder'] = 'נא להזין את שם בעל הכרטיס';
        }

        $cardNumber = preg_replace('/\D/', '', (string) ($data['cardNumber'] ?? ''));
        if (strlen($cardNumber) < 14 || strlen($cardNumber) > 19 || !$this->passesLuhn($cardNumber)) {
            $errors['cardNumber'] = 'נא להזין מספר כרטיס אשראי תקין';
        }

        $cardExpiry = trim((string) ($data['cardExpiry'] ?? ''));
        if (!$this->isValidExpiry($cardExpiry)) {
            $errors['cardExpiry'] = 'תוקף פג או שגוי';
        }

        $cardCvv = preg_replace('/\D/', '', (string) ($data['cardCvv'] ?? ''));
        if (!preg_match('/^\d{3,4}$/', $cardCvv)) {
            $errors['cardCvv'] = '3 או 4 ספרות';
        }

        $termsAccepted = filter_var($data['termsAccepted'] ?? false, FILTER_VALIDATE_BOOLEAN);
        if (!$termsAccepted) {
            $errors['termsCheck'] = 'עליך לאשר את תנאי השירות כדי להמשיך';
        }

        return $errors;
    }

    private function isValidPhone(string $phone): bool
    {
        $digits = preg_replace('/\D/', '', $phone) ?? '';
        $length = strlen($digits);

        return $length >= 9 && $length <= 11;
    }

    private function isValidExpiry(string $value): bool
    {
        if (!preg_match('/^\d{2}\/\d{2}$/', $value)) {
            return false;
        }

        [$month, $year] = array_map('intval', explode('/', $value));
        if ($month < 1 || $month > 12) {
            return false;
        }

        $now = new DateTimeImmutable('now');
        $currentYear = (int) $now->format('y');
        $currentMonth = (int) $now->format('n');

        if ($year < $currentYear) {
            return false;
        }

        if ($year === $currentYear && $month < $currentMonth) {
            return false;
        }

        return true;
    }

    private function passesLuhn(string $number): bool
    {
        $sum = 0;
        $alt = false;

        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $digit = (int) $number[$i];
            if ($alt) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            $sum += $digit;
            $alt = !$alt;
        }

        return $sum % 10 === 0;
    }
}
