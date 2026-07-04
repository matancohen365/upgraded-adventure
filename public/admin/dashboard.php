<?php
declare(strict_types=1);

session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: /admin/login.php');
    exit;
}

$storagePath = __DIR__ . '/../../data/signups.json';
$signups = [];

if (file_exists($storagePath)) {
    $raw = file_get_contents($storagePath);
    if ($raw !== false && trim($raw) !== '') {
        $decoded = json_decode($raw, true);
        if (is_array($decoded)) {
            $signups = $decoded;
        }
    }
}

// Load partial signups
$partialPath = __DIR__ . '/../../data/partial_signups.json';
$partialSignups = [];

if (file_exists($partialPath)) {
    $rawPartial = file_get_contents($partialPath);
    if ($rawPartial !== false && trim($rawPartial) !== '') {
        $decodedPartial = json_decode($rawPartial, true);
        if (is_array($decodedPartial)) {
            $partialSignups = $decodedPartial;
        }
    }
}

// Sort newest first
usort($signups, fn($a, $b) => strcmp($b['created_at'] ?? '', $a['created_at'] ?? ''));
usort($partialSignups, fn($a, $b) => strcmp($b['saved_at'] ?? '', $a['saved_at'] ?? ''));

// Stats
$total        = count($signups);
$pending      = count(array_filter($signups, fn($s) => ($s['status'] ?? '') === 'pending'));
$active       = count(array_filter($signups, fn($s) => ($s['status'] ?? '') === 'active'));
$totalRev     = array_sum(array_column($signups, 'monthly_total'));
$partialCount = count($partialSignups);

function statusBadge(string $status): string {
    return match($status) {
        'pending'   => '<span class="badge badge-pending">ממתין</span>',
        'active'    => '<span class="badge badge-active">פעיל</span>',
        'cancelled' => '<span class="badge badge-cancelled">בוטל</span>',
        'completed' => '<span class="badge badge-completed">הושלם</span>',
        default     => '<span class="badge badge-default">' . htmlspecialchars($status) . '</span>',
    };
}

function categoryLabel(string $cat): string {
    return match($cat) {
        'beauty'   => '💅 יופי',
        'services' => '🔧 שירותים',
        'lawyer'   => '⚖️ עורך דין',
        'food'     => '🍕 מזון',
        'shop'     => '🛍️ חנות',
        'clinic'   => '🏥 קליניקה',
        default    => htmlspecialchars($cat),
    };
}

function goalLabel(string $goal): string {
    return match($goal) {
        'calls'     => '📞 שיחות',
        'whatsapp'  => '💬 וואטסאפ',
        'leads'     => '📋 לידים',
        default     => htmlspecialchars($goal),
    };
}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>לוח בקרה · Vector Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #07090f;
            --surface: #0e1118;
            --surface2: #141823;
            --surface3: #1b2133;
            --border: rgba(255,255,255,0.07);
            --border2: rgba(255,255,255,0.12);
            --accent: #6366f1;
            --accent2: #818cf8;
            --accent-glow: rgba(99,102,241,0.3);
            --text: #e8eaf6;
            --text2: #9ca3af;
            --muted: #4b5563;
            --gold: #f59e0b;
            --green: #10b981;
            --red: #f87171;
            --cyan: #22d3ee;
            --sidebar-w: 260px;
        }

        html, body { height: 100%; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            font-size: 14px;
        }

        /* ── Sidebar ── */
        .sidebar {
            width: var(--sidebar-w);
            flex-shrink: 0;
            background: var(--surface);
            border-left: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; right: 0; bottom: 0;
            z-index: 100;
        }

        .sidebar-logo {
            padding: 28px 24px 20px;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-logo .logo-row {
            display: flex; align-items: center; gap: 12px;
        }

        .logo-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, #6366f1, #818cf8);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
            box-shadow: 0 6px 20px var(--accent-glow);
            flex-shrink: 0;
        }

        .logo-name { font-size: 16px; font-weight: 700; color: var(--text); }
        .logo-tag  { font-size: 10.5px; color: var(--text2); margin-top: 2px; font-weight: 500; letter-spacing: 0.04em; text-transform: uppercase; }

        .sidebar-nav {
            flex: 1;
            padding: 20px 12px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            overflow-y: auto;
        }

        .nav-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: var(--muted);
            text-transform: uppercase;
            padding: 8px 12px 4px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--text2);
            font-size: 13.5px;
            font-weight: 500;
            transition: background 0.2s, color 0.2s;
            cursor: pointer;
        }

        .nav-item:hover  { background: var(--surface2); color: var(--text); }
        .nav-item.active { background: rgba(99,102,241,0.15); color: var(--accent2); }

        .nav-item .icon { font-size: 16px; width: 20px; text-align: center; }

        .nav-item .count {
            margin-right: auto;
            background: var(--surface3);
            color: var(--text2);
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 20px;
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid var(--border);
        }

        .user-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 10px;
            background: var(--surface2);
        }

        .user-avatar {
            width: 34px; height: 34px;
            background: linear-gradient(135deg, #6366f1, #22d3ee);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; font-weight: 700; color: #fff;
            flex-shrink: 0;
        }

        .user-name  { font-size: 13px; font-weight: 600; }
        .user-role  { font-size: 11px; color: var(--text2); }
        .logout-btn {
            margin-right: auto;
            background: none;
            border: none;
            color: var(--text2);
            cursor: pointer;
            font-size: 16px;
            padding: 4px;
            border-radius: 6px;
            transition: color 0.2s, background 0.2s;
        }
        .logout-btn:hover { color: var(--red); background: rgba(248,113,113,0.1); }

        /* ── Main Content ── */
        .main {
            flex: 1;
            margin-left: 0;
            margin-right: var(--sidebar-w);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .topbar {
            padding: 20px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
            background: rgba(7,9,15,0.8);
            backdrop-filter: blur(12px);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-title h2 {
            font-size: 20px;
            font-weight: 700;
        }

        .topbar-title p {
            font-size: 12.5px;
            color: var(--text2);
            margin-top: 2px;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1, #818cf8);
            color: #fff;
            box-shadow: 0 4px 16px var(--accent-glow);
        }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 8px 24px rgba(99,102,241,0.45); }

        .btn-ghost {
            background: var(--surface2);
            color: var(--text2);
            border: 1px solid var(--border);
        }
        .btn-ghost:hover { background: var(--surface3); color: var(--text); }

        .content {
            padding: 32px;
            flex: 1;
        }

        /* ── Stats Grid ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px 24px;
            position: relative;
            overflow: hidden;
            transition: border-color 0.2s, transform 0.2s;
        }
        .stat-card:hover { border-color: var(--border2); transform: translateY(-2px); }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: var(--card-color, #6366f1);
            opacity: 0.8;
        }

        .stat-icon {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: var(--card-bg, rgba(99,102,241,0.12));
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
            margin-bottom: 14px;
        }

        .stat-label { font-size: 12px; color: var(--text2); font-weight: 500; margin-bottom: 6px; }
        .stat-value { font-size: 30px; font-weight: 800; line-height: 1; }
        .stat-sub   { font-size: 11.5px; color: var(--text2); margin-top: 6px; }

        /* ── Table Section ── */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
        }

        .section-sub {
            font-size: 12px;
            color: var(--text2);
            margin-top: 2px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-input {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 9px 14px;
            color: var(--text);
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            outline: none;
            width: 220px;
            transition: border-color 0.2s;
        }
        .search-input:focus { border-color: var(--accent); }
        .search-input::placeholder { color: var(--muted); }

        .filter-select {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 9px 14px;
            color: var(--text);
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            outline: none;
            cursor: pointer;
        }

        .table-wrap {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            padding: 13px 18px;
            text-align: right;
            font-size: 11.5px;
            font-weight: 700;
            color: var(--text2);
            letter-spacing: 0.05em;
            text-transform: uppercase;
            background: var(--surface2);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.15s;
            cursor: pointer;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: rgba(255,255,255,0.025); }

        tbody td {
            padding: 14px 18px;
            font-size: 13.5px;
            vertical-align: middle;
        }

        .td-biz { font-weight: 600; }
        .td-client { color: var(--text2); font-size: 12.5px; margin-top: 2px; }
        .td-money { font-weight: 700; color: var(--green); font-size: 15px; }
        .td-phone { color: var(--text2); font-size: 12.5px; direction: ltr; text-align: right; }

        /* Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: 0.02em;
        }
        .badge-pending   { background: rgba(245,158,11,0.12); color: #fbbf24; border: 1px solid rgba(245,158,11,0.25); }
        .badge-active    { background: rgba(16,185,129,0.12); color: #34d399; border: 1px solid rgba(16,185,129,0.25); }
        .badge-cancelled { background: rgba(248,113,113,0.12); color: #f87171; border: 1px solid rgba(248,113,113,0.25); }
        .badge-completed { background: rgba(99,102,241,0.12); color: #818cf8; border: 1px solid rgba(99,102,241,0.25); }
        .badge-partial   { background: rgba(251,146,60,0.12); color: #fb923c; border: 1px solid rgba(251,146,60,0.25); }
        .badge-default   { background: var(--surface2); color: var(--text2); border: 1px solid var(--border); }

        .td-actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-btn {
            padding: 5px 12px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            font-family: 'Inter', sans-serif;
            transition: all 0.18s;
        }

        .action-btn.approve  { background: rgba(16,185,129,0.12); color: #34d399; border: 1px solid rgba(16,185,129,0.2); }
        .action-btn.approve:hover  { background: rgba(16,185,129,0.22); }
        .action-btn.cancel   { background: rgba(248,113,113,0.12); color: #f87171; border: 1px solid rgba(248,113,113,0.2); }
        .action-btn.cancel:hover   { background: rgba(248,113,113,0.22); }
        .action-btn.view     { background: rgba(99,102,241,0.12); color: #818cf8; border: 1px solid rgba(99,102,241,0.2); }
        .action-btn.view:hover     { background: rgba(99,102,241,0.22); }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--muted);
        }
        .empty-state .es-icon { font-size: 48px; margin-bottom: 12px; }
        .empty-state p { font-size: 14px; }

        /* ── Partial signups section ── */
        .partial-section { margin-top: 48px; }

        .partial-section .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .partial-section .section-badge {
            background: rgba(251,146,60,0.12);
            border: 1px solid rgba(251,146,60,0.25);
            color: #fb923c;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .step-indicator {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .step-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: var(--surface3);
        }
        .step-dot.filled { background: #fb923c; }
        .step-dot.filled-0 { background: #f87171; }
        .step-dot.filled-1 { background: #fb923c; }
        .step-dot.filled-2 { background: #fbbf24; }
        .step-dot.filled-3 { background: #34d399; }

        .td-trigger {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 9px;
            border-radius: 6px;
            font-size: 11.5px;
            font-weight: 600;
        }
        .trigger-page_unload   { background: rgba(248,113,113,0.1); color: #f87171; }
        .trigger-idle_timeout  { background: rgba(251,146,60,0.1);  color: #fb923c; }
        .trigger-tab_hidden    { background: rgba(99,102,241,0.1);  color: #818cf8; }
        .trigger-default       { background: var(--surface2); color: var(--text2); }

        .td-ua {
            max-width: 180px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 11px;
            color: var(--muted);
        }

        /* ── Modal ── */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(6px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.2s;
        }
        .modal-overlay.open { display: flex; }

        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

        .modal {
            background: var(--surface);
            border: 1px solid var(--border2);
            border-radius: 20px;
            padding: 32px 36px;
            max-width: 580px;
            width: 95%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 40px 100px rgba(0,0,0,0.6);
            animation: slideUp 0.3s ease-out;
            direction: rtl;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .modal-title { font-size: 19px; font-weight: 700; }
        .modal-close {
            background: var(--surface2);
            border: none;
            color: var(--text2);
            width: 32px; height: 32px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            display: flex; align-items: center; justify-content: center;
            transition: all 0.18s;
        }
        .modal-close:hover { background: var(--surface3); color: var(--text); }

        .modal-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .modal-field { }
        .modal-field.full { grid-column: 1 / -1; }

        .modal-field-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text2);
            letter-spacing: 0.07em;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .modal-field-value {
            font-size: 14px;
            font-weight: 500;
            color: var(--text);
            background: var(--surface2);
            padding: 9px 14px;
            border-radius: 9px;
            border: 1px solid var(--border);
        }

        .modal-section {
            font-size: 11.5px;
            font-weight: 700;
            color: var(--accent2);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin: 20px 0 12px;
            padding-bottom: 6px;
            border-bottom: 1px solid var(--border);
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 24px;
        }

        /* Flash message */
        .flash {
            position: fixed;
            bottom: 24px;
            left: 24px;
            background: var(--surface);
            border: 1px solid var(--border2);
            border-radius: 12px;
            padding: 14px 20px;
            font-size: 13.5px;
            font-weight: 600;
            z-index: 9999;
            box-shadow: 0 16px 40px rgba(0,0,0,0.4);
            display: flex;
            align-items: center;
            gap: 10px;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .flash.show { transform: translateY(0); opacity: 1; }
        .flash.success { border-color: rgba(16,185,129,0.4); color: #34d399; }
        .flash.error   { border-color: rgba(248,113,113,0.4); color: #f87171; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--surface3); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--muted); }

        @media (max-width: 1024px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main { margin-right: 0; }
            .modal-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-row">
            <div class="logo-icon">⚡</div>
            <div>
                <div class="logo-name">Vector Agency</div>
                <div class="logo-tag">Admin Dashboard</div>
            </div>
        </div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-label">ניהול</div>
        <a class="nav-item active" href="dashboard.php">
            <span class="icon">📊</span>
            לוח בקרה
            <span class="count"><?= $total ?></span>
        </a>
        <a class="nav-item" href="dashboard.php?filter=pending">
            <span class="icon">⏳</span>
            הרשמות ממתינות
            <span class="count"><?= $pending ?></span>
        </a>
        <a class="nav-item" href="dashboard.php?filter=active">
            <span class="icon">✅</span>
            פעיל
            <span class="count"><?= $active ?></span>
        </a>
        <a class="nav-item" href="#partial-signups">
            <span class="icon">🔸</span>
            הרשמות חלקיות
            <span class="count"><?= $partialCount ?></span>
        </a>

        <div class="nav-label" style="margin-top:12px;">נתונים</div>
        <a class="nav-item" href="../../data/signups.json" target="_blank">
            <span class="icon">📁</span>
            signups.json
        </a>
        <a class="nav-item" href="../../data/partial_signups.json" target="_blank">
            <span class="icon">📁</span>
            partial_signups.json
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="user-row">
            <div class="user-avatar">A</div>
            <div>
                <div class="user-name">Admin</div>
                <div class="user-role">מנהל מערכת</div>
            </div>
            <form method="POST" action="logout.php" style="margin:0;">
                <button class="logout-btn" type="submit" title="התנתק">⬅</button>
            </form>
        </div>
    </div>
</aside>

<!-- Main -->
<main class="main">
    <div class="topbar">
        <div class="topbar-title">
            <h2>📊 לוח בקרה</h2>
            <p>סקירה כללית של כל ההרשמות והלקוחות</p>
        </div>
        <div class="topbar-actions">
            <span style="font-size:12px;color:var(--text2);">עודכן: <?= date('d/m/Y H:i') ?></span>
            <a href="dashboard.php" class="btn btn-ghost">🔄 רענן</a>
        </div>
    </div>

    <div class="content">
        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card" style="--card-color:#6366f1;--card-bg:rgba(99,102,241,0.1);">
                <div class="stat-icon">📋</div>
                <div class="stat-label">סה"כ הרשמות</div>
                <div class="stat-value"><?= $total ?></div>
                <div class="stat-sub">כל הזמנים</div>
            </div>
            <div class="stat-card" style="--card-color:#f59e0b;--card-bg:rgba(245,158,11,0.1);">
                <div class="stat-icon">⏳</div>
                <div class="stat-label">ממתינות לאישור</div>
                <div class="stat-value"><?= $pending ?></div>
                <div class="stat-sub">דורש טיפול</div>
            </div>
            <div class="stat-card" style="--card-color:#10b981;--card-bg:rgba(16,185,129,0.1);">
                <div class="stat-icon">✅</div>
                <div class="stat-label">קמפיינים פעילים</div>
                <div class="stat-value"><?= $active ?></div>
                <div class="stat-sub">רצים כעת</div>
            </div>
            <div class="stat-card" style="--card-color:#22d3ee;--card-bg:rgba(34,211,238,0.1);">
                <div class="stat-icon">💰</div>
                <div class="stat-label">הכנסה חודשית פוטנציאלית</div>
                <div class="stat-value">₪<?= number_format($totalRev) ?></div>
                <div class="stat-sub">כלל הלקוחות</div>
            </div>
            <div class="stat-card" style="--card-color:#fb923c;--card-bg:rgba(251,146,60,0.1);">
                <div class="stat-icon">🔸</div>
                <div class="stat-label">הרשמות חלקיות</div>
                <div class="stat-value"><?= $partialCount ?></div>
                <div class="stat-sub">נטושות / לא הושלמו</div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="section-header">
            <div>
                <div class="section-title">רשימת הרשמות</div>
                <div class="section-sub"><?= $total ?> רשומות נמצאו</div>
            </div>
            <div class="search-bar">
                <input id="search-input" class="search-input" type="text" placeholder="🔍 חיפוש לפי שם / אימייל..." />
                <select id="status-filter" class="filter-select">
                    <option value="">כל הסטטוסים</option>
                    <option value="pending"  <?= (($_GET['filter'] ?? '') === 'pending')   ? 'selected' : '' ?>>ממתין</option>
                    <option value="active"   <?= (($_GET['filter'] ?? '') === 'active')    ? 'selected' : '' ?>>פעיל</option>
                    <option value="cancelled"<?= (($_GET['filter'] ?? '') === 'cancelled') ? 'selected' : '' ?>>בוטל</option>
                    <option value="completed"<?= (($_GET['filter'] ?? '') === 'completed') ? 'selected' : '' ?>>הושלם</option>
                </select>
            </div>
        </div>

        <div class="table-wrap">
            <table id="signups-table">
                <thead>
                    <tr>
                        <th>עסק / לקוח</th>
                        <th>קטגוריה</th>
                        <th>מטרה</th>
                        <th>תקציב חודשי</th>
                        <th>כרטיס</th>
                        <th>סטטוס</th>
                        <th>תאריך</th>
                        <th>פעולות</th>
                    </tr>
                </thead>
                <tbody id="signups-tbody">
                <?php foreach ($signups as $i => $s): ?>
                    <tr class="signup-row"
                        data-search="<?= htmlspecialchars(strtolower(($s['business_name'] ?? '') . ' ' . ($s['client_name'] ?? '') . ' ' . ($s['client_email'] ?? ''))) ?>"
                        data-status="<?= htmlspecialchars($s['status'] ?? '') ?>"
                        data-record="<?= htmlspecialchars(json_encode($s, JSON_UNESCAPED_UNICODE), ENT_QUOTES) ?>"
                        onclick="openModal(this)">
                        <td>
                            <div class="td-biz"><?= htmlspecialchars($s['business_name'] ?? '–') ?></div>
                            <div class="td-client"><?= htmlspecialchars($s['client_name'] ?? '–') ?> · <?= htmlspecialchars($s['client_email'] ?? '') ?></div>
                        </td>
                        <td><?= categoryLabel($s['category'] ?? '') ?></td>
                        <td><?= goalLabel($s['campaign_goal'] ?? '') ?></td>
                        <td>
                            <div class="td-money">₪<?= number_format((float)($s['monthly_total'] ?? 0)) ?></div>
                            <div class="td-phone">מדיה: ₪<?= number_format((float)($s['monthly_media'] ?? 0)) ?></div>
                        </td>
                        <td>
                            <div><?= htmlspecialchars($s['card_brand'] ?? '–') ?> ****<?= htmlspecialchars($s['card_last4'] ?? '–') ?></div>
                            <div class="td-phone"><?= htmlspecialchars($s['card_expiry'] ?? '') ?></div>
                        </td>
                        <td onclick="event.stopPropagation()"><?= statusBadge($s['status'] ?? 'pending') ?></td>
                        <td><?= date('d/m/Y', strtotime($s['created_at'] ?? 'now')) ?></td>
                        <td onclick="event.stopPropagation()">
                            <div class="td-actions">
                                <button class="action-btn approve"
                                    onclick="updateStatus('<?= htmlspecialchars($s['signup_id'] ?? '') ?>', 'active')">אשר</button>
                                <button class="action-btn cancel"
                                    onclick="updateStatus('<?= htmlspecialchars($s['signup_id'] ?? '') ?>', 'cancelled')">בטל</button>
                                <button class="action-btn view"
                                    onclick="openModalById('<?= htmlspecialchars($s['signup_id'] ?? '') ?>')">צפה</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if ($total === 0): ?>
                    <tr><td colspan="8">
                        <div class="empty-state">
                            <div class="es-icon">📭</div>
                            <p>אין הרשמות במערכת עדיין.</p>
                        </div>
                    </td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Partial Signups Section -->
        <div class="partial-section" id="partial-signups">
            <div class="section-header">
                <div>
                    <div class="section-title">
                        🔸 הרשמות חלקיות
                        <span class="partial-section section-badge"><?= $partialCount ?></span>
                    </div>
                    <div class="section-sub">משתמשים שהתחילו הרשמה אך לא השלימו</div>
                </div>
                <div class="search-bar">
                    <input id="partial-search-input" class="search-input" type="text" placeholder="🔍 חיפוש..." />
                </div>
            </div>

            <div class="table-wrap">
                <table id="partial-table">
                    <thead>
                        <tr>
                            <th>עסק</th>
                            <th>קטגוריה</th>
                            <th>מטרה</th>
                            <th>תקציב יומי</th>
                            <th>שלב</th>
                            <th>סיבת נטישה</th>
                            <th>תאריך</th>
                            <th>פעולות</th>
                        </tr>
                    </thead>
                    <tbody id="partial-tbody">
                    <?php foreach ($partialSignups as $p): ?>
                        <tr class="partial-row"
                            data-search="<?= htmlspecialchars(strtolower(($p['business_name'] ?? '') . ' ' . ($p['client_name'] ?? '') . ' ' . ($p['client_email'] ?? ''))) ?>"
                            data-record="<?= htmlspecialchars(json_encode($p, JSON_UNESCAPED_UNICODE), ENT_QUOTES) ?>"
                            onclick="openPartialModal(this)">
                            <td>
                                <div class="td-biz"><?= htmlspecialchars($p['business_name'] ?? '–') ?></div>
                                <?php if (!empty($p['client_name'])): ?>
                                    <div class="td-client"><?= htmlspecialchars($p['client_name']) ?></div>
                                <?php endif; ?>
                            </td>
                            <td><?= categoryLabel($p['category'] ?? '') ?></td>
                            <td><?= goalLabel($p['campaign_goal'] ?? '') ?></td>
                            <td>
                                <?php if (!empty($p['daily_budget'])): ?>
                                    <div class="td-money">₪<?= number_format((float)$p['daily_budget']) ?></div>
                                <?php else: ?>
                                    <span style="color:var(--muted)">–</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="step-indicator" title="שלב <?= (int)($p['step_reached'] ?? 0) ?> מתוך 4">
                                    <?php for ($step = 0; $step < 4; $step++): ?>
                                        <div class="step-dot <?= $step < (int)($p['step_reached'] ?? 0) ? 'filled filled-' . $step : '' ?>"></div>
                                    <?php endfor; ?>
                                    <span style="font-size:11px;color:var(--text2);margin-right:4px;"><?= (int)($p['step_reached'] ?? 0) ?>/4</span>
                                </div>
                            </td>
                            <td>
                                <?php
                                    $trigger = $p['trigger'] ?? 'unknown';
                                    $triggerClass = match($trigger) {
                                        'page_unload'  => 'trigger-page_unload',
                                        'idle_timeout'  => 'trigger-idle_timeout',
                                        'tab_hidden'    => 'trigger-tab_hidden',
                                        default         => 'trigger-default',
                                    };
                                    $triggerLabel = match($trigger) {
                                        'page_unload'  => '🚪 עזב את הדף',
                                        'idle_timeout'  => '⏰ פסק זמן',
                                        'tab_hidden'    => '👁️ הסתיר טאב',
                                        default         => htmlspecialchars($trigger),
                                    };
                                ?>
                                <span class="td-trigger <?= $triggerClass ?>"><?= $triggerLabel ?></span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($p['saved_at'] ?? 'now')) ?></td>
                            <td onclick="event.stopPropagation()">
                                <div class="td-actions">
                                    <button class="action-btn view"
                                        onclick="openPartialModalById('<?= htmlspecialchars($p['session_id'] ?? '') ?>')">צפה</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($partialCount === 0): ?>
                        <tr><td colspan="8">
                            <div class="empty-state">
                                <div class="es-icon">✨</div>
                                <p>אין הרשמות חלקיות – כולם השלימו!</p>
                            </div>
                        </td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Detail Modal -->
<div class="modal-overlay" id="modal-overlay">
    <div class="modal" id="modal-content">
        <div class="modal-header">
            <div class="modal-title" id="modal-biz-name">–</div>
            <button class="modal-close" onclick="closeModal()">✕</button>
        </div>
        <div id="modal-body"></div>
    </div>
</div>

<!-- Flash -->
<div class="flash" id="flash"></div>

<script>
// All signups data
const allSignups = <?= json_encode(array_values($signups), JSON_UNESCAPED_UNICODE) ?>;
const allPartials = <?= json_encode(array_values($partialSignups), JSON_UNESCAPED_UNICODE) ?>;

// ── Search & Filter ──
const searchInput  = document.getElementById('search-input');
const statusFilter = document.getElementById('status-filter');
const tbody        = document.getElementById('signups-tbody');

function filterTable() {
    const q   = searchInput.value.toLowerCase().trim();
    const st  = statusFilter.value;
    document.querySelectorAll('.signup-row').forEach(row => {
        const matchSearch = !q || row.dataset.search.includes(q);
        const matchStatus = !st || row.dataset.status === st;
        row.style.display = (matchSearch && matchStatus) ? '' : 'none';
    });
}

searchInput.addEventListener('input', filterTable);
statusFilter.addEventListener('change', filterTable);

// Apply initial filter from URL
const urlFilter = new URLSearchParams(location.search).get('filter');
if (urlFilter) { statusFilter.value = urlFilter; filterTable(); }

// ── Modal ──
function openModal(row) {
    const data = JSON.parse(row.dataset.record);
    showModal(data);
}

function openModalById(id) {
    const data = allSignups.find(s => s.signup_id === id);
    if (data) showModal(data);
}

function showModal(data) {
    document.getElementById('modal-biz-name').textContent = data.business_name || '–';

    const fieldHtml = (label, value) => `
        <div class="modal-field">
            <div class="modal-field-label">${label}</div>
            <div class="modal-field-value">${value || '–'}</div>
        </div>`;

    const fullFieldHtml = (label, value) => `
        <div class="modal-field full">
            <div class="modal-field-label">${label}</div>
            <div class="modal-field-value">${value || '–'}</div>
        </div>`;

    document.getElementById('modal-body').innerHTML = `
        <div class="modal-section">פרטי עסק</div>
        <div class="modal-grid">
            ${fieldHtml('שם העסק', data.business_name)}
            ${fieldHtml('קטגוריה', data.category)}
            ${fieldHtml('טלפון עסק', data.business_phone)}
            ${fieldHtml('מטרת קמפיין', data.campaign_goal)}
            ${fieldHtml('אזור', data.target_location)}
            ${fieldHtml('כתובת', data.local_address)}
            ${fullFieldHtml('תיאור', data.business_desc)}
        </div>

        <div class="modal-section">פרטי לקוח</div>
        <div class="modal-grid">
            ${fieldHtml('שם', data.client_name)}
            ${fieldHtml('אימייל', data.client_email)}
            ${fieldHtml('טלפון לקוח', data.client_phone)}
            ${fieldHtml('טלפון קמפיין', data.target_phone)}
        </div>

        <div class="modal-section">תקציב ותשלום</div>
        <div class="modal-grid">
            ${fieldHtml('תקציב יומי', '₪' + data.daily_budget)}
            ${fieldHtml('מדיה חודשית', '₪' + data.monthly_media)}
            ${fieldHtml('סה"כ חודשי', '₪' + data.monthly_total)}
            ${fieldHtml('מותג כרטיס', data.card_brand)}
            ${fieldHtml('4 ספרות אחרונות', '****' + data.card_last4)}
            ${fieldHtml('תוקף', data.card_expiry)}
            ${fieldHtml('שם בעל הכרטיס', data.card_holder)}
        </div>

        <div class="modal-section">מטא</div>
        <div class="modal-grid">
            ${fieldHtml('ID', data.signup_id)}
            ${fieldHtml('סטטוס', data.status)}
            ${fieldHtml('נוצר ב', data.created_at ? new Date(data.created_at).toLocaleString('he-IL') : '–')}
            ${fieldHtml('IP', data.ip_address)}
        </div>

        <div class="modal-actions">
            <button class="btn btn-primary" onclick="updateStatus('${data.signup_id}','active');closeModal()">✅ אשר ויצא</button>
            <button class="btn btn-ghost" onclick="updateStatus('${data.signup_id}','cancelled');closeModal()">🚫 בטל</button>
        </div>`;

    document.getElementById('modal-overlay').classList.add('open');
}

function closeModal() {
    document.getElementById('modal-overlay').classList.remove('open');
}

document.getElementById('modal-overlay').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});

// ── Status update ──
function updateStatus(signupId, newStatus) {
    fetch('update-status.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ signup_id: signupId, status: newStatus }),
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            showFlash('✅ הסטטוס עודכן בהצלחה!', 'success');
            setTimeout(() => location.reload(), 1200);
        } else {
            showFlash('❌ שגיאה: ' + (data.message || 'נסה שוב'), 'error');
        }
    })
    .catch(() => showFlash('❌ שגיאת רשת', 'error'));
}

// ── Flash message ──
function showFlash(msg, type = 'success') {
    const el = document.getElementById('flash');
    el.textContent = msg;
    el.className = `flash ${type}`;
    void el.offsetWidth;
    el.classList.add('show');
    setTimeout(() => el.classList.remove('show'), 3000);
}

// Keyboard close
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

// ── Partial signups search ──
const partialSearchInput = document.getElementById('partial-search-input');
if (partialSearchInput) {
    partialSearchInput.addEventListener('input', function() {
        const q = this.value.toLowerCase().trim();
        document.querySelectorAll('.partial-row').forEach(row => {
            const match = !q || row.dataset.search.includes(q);
            row.style.display = match ? '' : 'none';
        });
    });
}

// ── Partial modal ──
function openPartialModal(row) {
    const data = JSON.parse(row.dataset.record);
    showPartialModal(data);
}

function openPartialModalById(id) {
    const data = allPartials.find(s => s.session_id === id);
    if (data) showPartialModal(data);
}

function showPartialModal(data) {
    document.getElementById('modal-biz-name').textContent = (data.business_name || 'הרשמה חלקית') + ' (חלקי)';

    const fieldHtml = (label, value) => `
        <div class="modal-field">
            <div class="modal-field-label">${label}</div>
            <div class="modal-field-value">${value || '–'}</div>
        </div>`;

    const fullFieldHtml = (label, value) => `
        <div class="modal-field full">
            <div class="modal-field-label">${label}</div>
            <div class="modal-field-value">${value || '–'}</div>
        </div>`;

    const triggerLabel = {
        'page_unload': '🚪 עזב את הדף',
        'idle_timeout': '⏰ פסק זמן',
        'tab_hidden': '👁️ הסתיר טאב',
    };

    document.getElementById('modal-body').innerHTML = `
        <div style="margin-bottom:16px;">
            <span class="badge badge-partial">🔸 הרשמה חלקית – שלב ${data.step_reached || 0} מתוך 4</span>
        </div>

        <div class="modal-section">פרטי עסק</div>
        <div class="modal-grid">
            ${fieldHtml('שם העסק', data.business_name)}
            ${fieldHtml('קטגוריה', data.category)}
            ${fieldHtml('טלפון עסק', data.business_phone)}
            ${fieldHtml('מטרת קמפיין', data.campaign_goal)}
            ${fieldHtml('אזור', data.target_location)}
            ${fieldHtml('כתובת', data.local_address)}
            ${fullFieldHtml('תיאור', data.business_desc)}
        </div>

        <div class="modal-section">פרטי לקוח (אם מולאו)</div>
        <div class="modal-grid">
            ${fieldHtml('שם', data.client_name)}
            ${fieldHtml('אימייל', data.client_email)}
            ${fieldHtml('טלפון', data.client_phone)}
            ${fieldHtml('טלפון קמפיין', data.target_phone)}
        </div>

        <div class="modal-section">תקציב</div>
        <div class="modal-grid">
            ${fieldHtml('תקציב יומי', data.daily_budget ? '₪' + data.daily_budget : null)}
        </div>

        <div class="modal-section">מטא</div>
        <div class="modal-grid">
            ${fieldHtml('Session ID', data.session_id)}
            ${fieldHtml('סיבת נטישה', triggerLabel[data.trigger] || data.trigger)}
            ${fieldHtml('שלב', data.step_reached + ' / 4')}
            ${fieldHtml('IP', data.ip_address)}
            ${fieldHtml('נשמר ב', data.saved_at ? new Date(data.saved_at).toLocaleString('he-IL') : '–')}
            ${fieldHtml('נצפה לראשונה', data.first_seen ? new Date(data.first_seen).toLocaleString('he-IL') : '–')}
            ${fullFieldHtml('דפדפן', data.user_agent)}
        </div>`;

    document.getElementById('modal-overlay').classList.add('open');
}
</script>

</body>
</html>
