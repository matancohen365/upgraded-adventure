<?php

declare(strict_types=1);

return [
    'storage_path' => __DIR__ . '/../data/signups.json',
    'system_fee_monthly' => 250,
    'allowed_categories' => ['beauty', 'services', 'lawyer', 'food', 'shop', 'clinic'],
    'allowed_goals' => ['calls', 'whatsapp', 'leads'],
    'allowed_locations' => ['מרכז', 'ארצי', 'צפון', 'דרום', 'ירושלים', 'מקומי'],
    'budget_min' => 5,
    'budget_max' => 500,
];
