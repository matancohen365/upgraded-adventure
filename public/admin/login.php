<?php
declare(strict_types=1);

session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === 'matancohen365@gmail.com' && $password === 'ef38c98f1c38c53d657467879') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $username;
        header('Location: /admin/dashboard.php');
        exit;
    } else {
        $error = 'שם משתמש או סיסמה שגויים.';
    }
}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login · Vector Agency</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0c14;
            --surface: #111521;
            --surface2: #181d2e;
            --border: rgba(255,255,255,0.07);
            --accent: #6366f1;
            --accent2: #818cf8;
            --accent-glow: rgba(99,102,241,0.35);
            --text: #e8eaf6;
            --muted: #6b7280;
            --error: #f87171;
            --success: #34d399;
            --gold: #f59e0b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated background */
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 50% -20%, rgba(99,102,241,0.15) 0%, transparent 70%),
                radial-gradient(ellipse 60% 40% at 80% 80%, rgba(129,140,248,0.08) 0%, transparent 60%);
            pointer-events: none;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.15;
            animation: float 8s ease-in-out infinite;
        }
        .orb-1 { width: 400px; height: 400px; background: #6366f1; top: -100px; left: -100px; animation-delay: 0s; }
        .orb-2 { width: 300px; height: 300px; background: #818cf8; bottom: -80px; right: -60px; animation-delay: 3s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
        }

        .login-card {
            position: relative;
            z-index: 10;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 48px 44px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 32px 80px rgba(0,0,0,0.5), 0 0 0 1px var(--border), inset 0 1px 0 rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .logo-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .logo-icon {
            width: 48px; height: 48px;
            background: linear-gradient(135deg, #6366f1, #818cf8);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            box-shadow: 0 8px 24px var(--accent-glow);
        }

        .logo-text {
            font-size: 20px;
            font-weight: 700;
            background: linear-gradient(135deg, #e8eaf6, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo-sub {
            font-size: 11px;
            color: var(--muted);
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        h1 {
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 6px;
            background: linear-gradient(135deg, #e8eaf6 60%, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            font-size: 13.5px;
            color: var(--muted);
            margin-bottom: 32px;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #c7d2fe;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 13px 16px;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text);
            font-size: 14.5px;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border-color 0.25s, box-shadow 0.25s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-glow);
        }

        input::placeholder { color: var(--muted); }

        .error-msg {
            background: rgba(248,113,113,0.1);
            border: 1px solid rgba(248,113,113,0.3);
            color: var(--error);
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13.5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #6366f1, #818cf8);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s, opacity 0.2s;
            box-shadow: 0 8px 24px var(--accent-glow);
            margin-top: 8px;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 32px rgba(99,102,241,0.5);
        }

        .btn-login:active { transform: translateY(0); }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(245,158,11,0.12);
            border: 1px solid rgba(245,158,11,0.25);
            color: var(--gold);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 600;
            margin-top: 28px;
            letter-spacing: 0.02em;
        }
    </style>
</head>
<body>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="login-card">
        <div class="logo-wrap">
            <div class="logo-icon">⚡</div>
            <div>
                <div class="logo-text">Vector Agency</div>
                <div class="logo-sub">Admin Panel</div>
            </div>
        </div>

        <h1>כניסה לממשק</h1>
        <p class="subtitle">הזן את פרטי הגישה שלך להמשך</p>

        <?php if ($error): ?>
        <div class="error-msg">⚠️ <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="field">
                <label for="username">שם משתמש</label>
                <input id="username" type="text" name="username"
                       placeholder="admin"
                       value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                       autocomplete="username" required />
            </div>
            <div class="field">
                <label for="password">סיסמה</label>
                <input id="password" type="password" name="password"
                       placeholder="••••••••"
                       autocomplete="current-password" required />
            </div>
            <button id="btn-login" class="btn-login" type="submit">כניסה לממשק →</button>
        </form>

        <div style="text-align:center;">
            <span class="badge">🔒 גישה מוגבלת לצוות בלבד</span>
        </div>
    </div>
</body>
</html>
