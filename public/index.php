<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HDG — סוכנות שיווק דיגיטלי מבוססת נתונים</title>
<meta name="description" content="HDG היא סוכנות שיווק דיגיטלי שהופכת קמפיינים למספרים שאפשר לסמוך עליהם: SEO, פרסום ממומן, רשתות חברתיות ומיתוג — תחת לוח בקרה אחד.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700;800;900&family=Assistant:wght@400;600;700;800&family=IBM+Plex+Mono:wght@500;600&display=swap" rel="stylesheet">
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
  h1, h2, h3, h4 { font-weight: inherit; }

  /* ================= TOKENS ================= */
  :root {
    --navy-950: #0B1220;
    --navy-900: #121B2E;
    --navy-800: #1B2740;
    --navy-700: #2C3A56;
    --paper: #F5F3ED;
    --paper-card: #FFFFFF;
    --ink: #10182B;
    --slate: #5B6478;
    --slate-light: #9AA5BC;
    --amber: #D9A441;
    --amber-bright: #F0C878;
    --amber-deep: #A9761F;
    --line-dark: rgba(255,255,255,0.09);
    --line-light: rgba(16,24,43,0.10);

    --font-display: 'Heebo', sans-serif;
    --font-body: 'Assistant', sans-serif;
    --font-mono: 'IBM Plex Mono', monospace;

    --radius-sm: 6px;
    --radius-md: 12px;
    --radius-lg: 22px;

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

  .wrap {
    max-width: var(--container);
    margin: 0 auto;
    padding: 0 32px;
  }

  h1, h2, h3 { font-family: var(--font-display); letter-spacing: -0.01em; }

  a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible {
    outline: 2px solid var(--amber);
    outline-offset: 3px;
    border-radius: 4px;
  }

  .skip-link {
    position: absolute; right: 16px; top: -60px;
    background: var(--amber); color: var(--navy-950);
    padding: 10px 18px; border-radius: var(--radius-sm);
    font-weight: 700; z-index: 999; transition: top .2s ease;
  }
  .skip-link:focus { top: 16px; }

  /* eyebrow label */
  .eyebrow {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-mono); font-size: 13px; font-weight: 600;
    letter-spacing: 0.04em; color: var(--slate);
    margin-bottom: 16px;
  }
  .eyebrow::before {
    content: ''; width: 7px; height: 7px; background: var(--amber);
    border-radius: 2px; flex-shrink: 0;
  }
  .on-dark .eyebrow { color: var(--slate-light); }

  .num { font-family: var(--font-mono); }

  /* buttons */
  .btn {
    display: inline-flex; align-items: center; gap: 10px;
    padding: 15px 26px; border-radius: var(--radius-sm);
    font-weight: 700; font-size: 15.5px; font-family: var(--font-body);
    transition: transform .18s ease, box-shadow .18s ease, background .18s ease, border-color .18s ease;
    white-space: nowrap;
  }
  .btn svg { width: 16px; height: 16px; flex-shrink: 0; transition: transform .18s ease; }
  .btn-primary {
    background: var(--amber); color: var(--navy-950);
  }
  .btn-primary:hover { background: var(--amber-bright); transform: translateY(-2px); box-shadow: 0 10px 24px rgba(217,164,65,0.28); }
  .btn-primary:hover svg { transform: translateX(-3px); }
  .btn-outline-dark {
    border: 1.5px solid var(--line-dark); color: #fff;
  }
  .btn-outline-dark:hover { border-color: var(--amber); background: rgba(217,164,65,0.08); }
  .btn-outline-light {
    border: 1.5px solid var(--line-light); color: var(--ink);
  }
  .btn-outline-light:hover { border-color: var(--amber-deep); background: rgba(169,118,31,0.06); }

  /* ================= NAV ================= */
  header {
    position: sticky; top: 0; z-index: 100;
    background: rgba(11,18,32,0.82);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid var(--line-dark);
    transition: background .2s ease;
  }
  nav.wrap {
    display: flex; align-items: center; justify-content: space-between;
    height: 76px;
  }
  .logo { display: flex; align-items: center; gap: 10px; }
  .logo-mark { width: 34px; height: 34px; }
  .logo-word {
    font-family: var(--font-display); font-weight: 800; font-size: 20px;
    color: #fff; letter-spacing: -0.01em;
  }
  .nav-links { display: flex; align-items: center; gap: 34px; }
  .nav-links a {
    color: var(--slate-light); font-weight: 600; font-size: 15px;
    transition: color .15s ease; position: relative;
  }
  .nav-links a:hover { color: #fff; }
  .nav-cta-wrap { display: flex; align-items: center; gap: 18px; }
  .nav-cta { padding: 11px 20px; font-size: 14.5px; }

  .nav-toggle {
    display: none; flex-direction: column; gap: 5px; padding: 8px;
  }
  .nav-toggle span { width: 22px; height: 2px; background: #fff; border-radius: 2px; transition: transform .2s ease, opacity .2s ease; }
  .mobile-panel {
    display: none;
    position: fixed; inset: 76px 0 0 0; background: var(--navy-950);
    z-index: 90; padding: 32px; overflow-y: auto;
  }
  .mobile-panel.open { display: block; }
  .mobile-panel .nav-links { flex-direction: column; align-items: flex-start; gap: 24px; }
  .mobile-panel .nav-links a { font-size: 20px; }
  .mobile-panel .btn { margin-top: 28px; width: 100%; justify-content: center; }

  /* ================= HERO ================= */
  .hero {
    position: relative; overflow: hidden;
    background: var(--navy-950); color: #fff;
    padding: 96px 0 80px;
  }
  .hero::before {
    content: ''; position: absolute; inset: 0;
    background-image:
      linear-gradient(var(--line-dark) 1px, transparent 1px),
      linear-gradient(90deg, var(--line-dark) 1px, transparent 1px);
    background-size: 56px 56px;
    mask-image: radial-gradient(ellipse 75% 65% at 50% 20%, black 30%, transparent 100%);
    -webkit-mask-image: radial-gradient(ellipse 75% 65% at 50% 20%, black 30%, transparent 100%);
  }
  .hero::after {
    content: ''; position: absolute; top: -180px; left: 50%; transform: translateX(-50%);
    width: 640px; height: 420px; border-radius: 50%;
    background: radial-gradient(closest-side, rgba(217,164,65,0.16), transparent 70%);
    pointer-events: none;
  }
  .hero-inner { position: relative; z-index: 1; }
  .hero-top { max-width: 700px; margin: 0 auto; text-align: center; }
  .hero h1 {
    font-size: clamp(34px, 5.2vw, 60px);
    font-weight: 800; line-height: 1.16; margin-bottom: 22px;
  }
  .hero-sub {
    font-size: 18px; color: var(--slate-light); max-width: 560px; margin: 0 auto 36px;
    line-height: 1.7;
  }
  .hero-actions {
    display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap;
    margin-bottom: 72px;
  }

  .hero-chart-block {
    display: grid; grid-template-columns: 1.4fr 1fr; gap: 48px; align-items: center;
    background: var(--navy-900); border: 1px solid var(--line-dark);
    border-radius: var(--radius-lg); padding: 36px 40px;
  }
  .chart-svg { width: 100%; height: auto; overflow: visible; }
  .chart-path {
    fill: none; stroke: var(--amber); stroke-width: 3;
    stroke-linecap: round; stroke-linejoin: round;
  }
  .chart-area { opacity: 0.85; }
  .chart-dot { fill: var(--navy-950); stroke: var(--amber); stroke-width: 2.5; }
  .chart-dot-end { fill: var(--amber); }
  .chart-pulse {
    fill: none; stroke: var(--amber); stroke-width: 2; opacity: 0;
  }
  @keyframes pulse-ring {
    0% { r: 6; opacity: 0.7; }
    100% { r: 18; opacity: 0; }
  }
  .chart-pulse.animate { animation: pulse-ring 2.2s ease-out infinite; }
  .chart-caption {
    font-family: var(--font-mono); font-size: 12px; color: var(--slate-light);
    letter-spacing: 0.03em; margin-top: 14px;
  }

  .hero-stats { display: flex; flex-direction: column; gap: 26px; }
  .stat-item { border-inline-start: 2px solid var(--navy-700); padding-inline-start: 18px; }
  .stat-number {
    font-family: var(--font-mono); font-size: 30px; font-weight: 600;
    color: var(--amber); line-height: 1; margin-bottom: 8px;
  }
  .stat-label { font-size: 14px; color: var(--slate-light); }

  /* ================= INDUSTRIES STRIP ================= */
  .industries {
    background: var(--navy-900); color: var(--slate-light);
    padding: 22px 0; border-bottom: 1px solid var(--line-dark);
  }
  .industries .wrap {
    display: flex; align-items: center; gap: 22px; flex-wrap: wrap;
    justify-content: center; font-size: 14.5px;
  }
  .industries .tag-label { font-family: var(--font-mono); font-size: 12px; color: var(--slate-light); opacity: 0.8; }
  .industries .tags { display: flex; gap: 22px; flex-wrap: wrap; justify-content: center; }
  .industries .tags span { color: #fff; font-weight: 600; opacity: 0.85; }

  /* ================= SECTION HEADERS ================= */
  .section { padding: 108px 0; }
  .section-head { max-width: 640px; margin-bottom: 64px; }
  .section-head.center { margin-inline: auto; text-align: center; }
  .section-head h2 { font-size: clamp(28px, 3.6vw, 42px); font-weight: 800; margin-bottom: 18px; line-height: 1.25; }
  .section-head p { color: var(--slate); font-size: 17px; line-height: 1.7; }

  /* ================= SERVICES ================= */
  .services-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 22px;
  }
  .service-card {
    background: var(--paper-card); border: 1px solid var(--line-light);
    border-radius: var(--radius-md); padding: 32px 26px;
    transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
  }
  .service-card:hover {
    transform: translateY(-4px); border-color: var(--amber-deep);
    box-shadow: 0 18px 40px rgba(16,24,43,0.08);
  }
  .service-icon {
    width: 46px; height: 46px; color: var(--amber-deep);
    margin-bottom: 22px;
  }
  .service-card h3 { font-size: 19px; font-weight: 700; margin-bottom: 12px; }
  .service-card p { font-size: 14.5px; color: var(--slate); line-height: 1.7; margin-bottom: 20px; }
  .service-metric {
    font-family: var(--font-mono); font-size: 13px; font-weight: 600;
    color: var(--amber-deep); border-top: 1px solid var(--line-light);
    padding-top: 16px; display: flex; align-items: center; gap: 8px;
  }
  .service-metric::before { content: '▴'; font-size: 11px; }

  /* ================= PROCESS ================= */
  .process { background: var(--navy-950); color: #fff; }
  .process .section-head p { color: var(--slate-light); }
  .process-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 2px; background: var(--line-dark); border-radius: var(--radius-lg); overflow: hidden; }
  .process-step { background: var(--navy-900); padding: 34px 26px; }
  .process-num {
    font-family: var(--font-mono); font-size: 32px; font-weight: 600;
    color: var(--navy-700); margin-bottom: 22px; line-height: 1;
  }
  .process-step h3 { font-size: 17px; font-weight: 700; margin-bottom: 10px; }
  .process-step p { font-size: 14px; color: var(--slate-light); line-height: 1.7; }

  /* ================= RESULTS ================= */
  .results { background: var(--navy-900); color: #fff; position: relative; overflow: hidden; }
  .results::before {
    content: ''; position: absolute; inset: 0;
    background-image:
      linear-gradient(var(--line-dark) 1px, transparent 1px),
      linear-gradient(90deg, var(--line-dark) 1px, transparent 1px);
    background-size: 56px 56px;
    mask-image: radial-gradient(ellipse 70% 60% at 50% 50%, black 20%, transparent 100%);
    -webkit-mask-image: radial-gradient(ellipse 70% 60% at 50% 50%, black 20%, transparent 100%);
  }
  .results .wrap { position: relative; z-index: 1; }
  .results .section-head p { color: var(--slate-light); }
  .results-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 22px; }
  .result-card {
    background: var(--navy-800); border: 1px solid var(--line-dark);
    border-radius: var(--radius-md); padding: 30px 24px;
  }
  .result-number { font-family: var(--font-mono); font-size: 34px; font-weight: 600; color: #fff; margin-bottom: 10px; }
  .result-label { font-size: 13.5px; color: var(--slate-light); line-height: 1.5; }
  .gauge-wrap { position: relative; width: 84px; height: 84px; margin-bottom: 16px; }
  .gauge-svg { width: 100%; height: 100%; transform: rotate(-90deg); }
  .gauge-track { fill: none; stroke: var(--navy-700); stroke-width: 7; }
  .gauge-fill { fill: none; stroke: var(--amber); stroke-width: 7; stroke-linecap: round; transition: stroke-dashoffset 1.4s cubic-bezier(.2,.7,.3,1); }
  .gauge-text {
    position: absolute; inset: 0; display: flex; align-items: center; justify-content: center;
    font-family: var(--font-mono); font-size: 17px; font-weight: 600; color: #fff;
  }

  /* ================= TESTIMONIAL ================= */
  .testimonial-card {
    max-width: 780px; margin: 0 auto; text-align: center;
    background: var(--paper-card); border: 1px solid var(--line-light);
    border-radius: var(--radius-lg); padding: 64px 48px;
  }
  .testimonial-mark { font-family: var(--font-display); font-size: 64px; color: var(--amber-deep); line-height: 1; margin-bottom: 8px; }
  .testimonial-quote { font-family: var(--font-display); font-size: 24px; font-weight: 500; line-height: 1.55; margin-bottom: 28px; }
  .testimonial-attr { font-size: 14.5px; color: var(--slate); font-weight: 600; }
  .testimonial-attr span { color: var(--slate); font-weight: 400; }

  /* ================= CTA ================= */
  .cta-section { background: var(--navy-950); color: #fff; position: relative; overflow: hidden; text-align: center; }
  .cta-section::after {
    content: ''; position: absolute; bottom: -220px; left: 50%; transform: translateX(-50%);
    width: 700px; height: 420px; border-radius: 50%;
    background: radial-gradient(closest-side, rgba(217,164,65,0.14), transparent 70%);
    pointer-events: none;
  }
  .cta-section .wrap { position: relative; z-index: 1; }
  .cta-section h2 { font-size: clamp(28px, 4vw, 44px); font-weight: 800; margin-bottom: 18px; }
  .cta-section p { color: var(--slate-light); font-size: 17px; max-width: 480px; margin: 0 auto 36px; }
  .cta-actions { display: flex; align-items: center; justify-content: center; gap: 20px; flex-wrap: wrap; margin-bottom: 28px; }
  .cta-contact { font-family: var(--font-mono); font-size: 14px; color: var(--slate-light); }
  .cta-contact a { color: var(--amber-bright); border-bottom: 1px solid transparent; transition: border-color .15s ease; }
  .cta-contact a:hover { border-color: var(--amber-bright); }

  /* ================= FOOTER ================= */
  footer { background: var(--navy-950); border-top: 1px solid var(--line-dark); color: var(--slate-light); padding: 64px 0 32px; }
  .footer-top { display: grid; grid-template-columns: 1.6fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 56px; }
  .footer-brand .logo-word { font-size: 20px; }
  .footer-brand p { margin-top: 14px; font-size: 14px; line-height: 1.7; max-width: 260px; color: var(--slate-light); }
  .footer-col h4 { font-family: var(--font-mono); font-size: 12.5px; letter-spacing: 0.04em; color: #fff; margin-bottom: 18px; }
  .footer-col ul { display: flex; flex-direction: column; gap: 12px; }
  .footer-col a { font-size: 14.5px; transition: color .15s ease; }
  .footer-col a:hover { color: #fff; }
  .footer-bottom {
    display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;
    padding-top: 28px; border-top: 1px solid var(--line-dark);
    font-size: 13px; color: var(--slate-light);
  }
  .footer-social { display: flex; gap: 14px; }
  .footer-social a {
    width: 34px; height: 34px; border-radius: 50%; border: 1px solid var(--line-dark);
    display: flex; align-items: center; justify-content: center; transition: border-color .15s ease, color .15s ease;
  }
  .footer-social a:hover { border-color: var(--amber); color: var(--amber); }
  .footer-social svg { width: 15px; height: 15px; }

  /* ================= SCROLL REVEAL ================= */
  .reveal { opacity: 0; transform: translateY(24px); transition: opacity .7s ease, transform .7s ease; }
  .reveal.in-view { opacity: 1; transform: translateY(0); }

  /* ================= RESPONSIVE ================= */
  @media (max-width: 1024px) {
    .wrap { padding: 0 24px; }
    .services-grid { grid-template-columns: repeat(2, 1fr); }
    .process-grid { grid-template-columns: repeat(2, 1fr); }
    .results-grid { grid-template-columns: repeat(2, 1fr); }
    .footer-top { grid-template-columns: 1fr 1fr; row-gap: 40px; }
    .hero-chart-block { grid-template-columns: 1fr; }
    .hero-stats { flex-direction: row; flex-wrap: wrap; gap: 24px 32px; }
    .stat-item { flex: 1 1 140px; }
  }

  @media (max-width: 860px) {
    .nav-links { display: none; }
    .nav-cta-wrap .btn.nav-cta { display: none; }
    .nav-toggle { display: flex; }
    .section { padding: 76px 0; }
    .hero { padding: 64px 0 56px; }
  }

  @media (max-width: 620px) {
    .services-grid { grid-template-columns: 1fr; }
    .process-grid { grid-template-columns: 1fr; }
    .results-grid { grid-template-columns: repeat(2, 1fr); }
    .footer-top { grid-template-columns: 1fr; }
    .testimonial-card { padding: 44px 24px; }
    .testimonial-quote { font-size: 20px; }
    .hero-chart-block { padding: 24px 20px; }
    .industries .wrap { flex-direction: column; gap: 10px; }
  }

  .nav-toggle.is-open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
  .nav-toggle.is-open span:nth-child(2) { opacity: 0; }
  .nav-toggle.is-open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
</style>


<!-- ============================================================
     PRODUCTION TRACKING SUITE — HDG index.php
     Platforms: Google Analytics 4, Google Ads, Meta (FB) Pixel,
                TikTok Pixel, Snapchat Pixel
     ============================================================ -->

<!-- ① Google Tag Manager (HEAD snippet) - loads GA4 + Google Ads -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PXFMTZVD');</script>
<!-- End Google Tag Manager -->

<!-- ② Google Analytics 4 (direct) + Google Ads Conversion Tag -->
<!-- REPLACE G-XXXXXXXXXX with your GA4 Measurement ID -->
<!-- REPLACE AW-XXXXXXXXXX/XXXXXXXXXXXXXX with your Google Ads Conversion ID/Label -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  // GA4
  gtag('config', 'G-XXXXXXXXXX', {
    page_title: document.title,
    page_location: window.location.href,
    send_page_view: true
  });

  // Google Ads remarketing tag
  gtag('config', 'AW-XXXXXXXXXX');
</script>
<!-- End Google Tag / Google Ads -->

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
<a href="#main" class="skip-link">דלג לתוכן הראשי</a>

<header>
  <nav class="wrap" aria-label="ניווט ראשי">
    <a href="#" class="logo" aria-label="HDG – דף הבית">
      <svg class="logo-mark" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <rect x="1" y="1" width="30" height="30" rx="8" stroke="#fff" stroke-opacity="0.25" stroke-width="1.4"/>
        <path d="M8 21L14.5 13L18.5 16.5L23 9.5" stroke="#D9A441" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M17.5 9H23V14.5" stroke="#D9A441" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span class="logo-word">HDG</span>
    </a>
    <ul class="nav-links">
      <li><a href="#services">שירותים</a></li>
      <li><a href="#process">תהליך</a></li>
      <li><a href="#results">תוצאות</a></li>
      <li><a href="#testimonial">המלצות</a></li>
      <li><a href="#contact">צור קשר</a></li>
    </ul>
    <div class="nav-cta-wrap">
      <a href="signup.php" class="btn btn-primary nav-cta">הקמת קמפיין AI</a>
      <button class="nav-toggle" id="navToggle" aria-label="פתיחת תפריט" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>
  <div class="mobile-panel" id="mobilePanel">
    <ul class="nav-links">
      <li><a href="#services">שירותים</a></li>
      <li><a href="#process">תהליך</a></li>
      <li><a href="#results">תוצאות</a></li>
      <li><a href="#testimonial">המלצות</a></li>
      <li><a href="#contact">צור קשר</a></li>
    </ul>
    <a href="signup.php" class="btn btn-primary">הקמת קמפיין AI</a>
  </div>
</header>

<main id="main">

  <!-- ================= HERO ================= -->
  <section class="hero">
    <div class="wrap hero-inner">
      <div class="hero-top">
        <span class="eyebrow on-dark">שיווק דיגיטלי מבוסס נתונים</span>
        <h1>הצמיחה שלכם.<br>מתוכננת, מדודה, מוכחת.</h1>
        <p class="hero-sub">סוכנות שיווק דיגיטלי שהופכת כל קמפיין למספרים שאפשר לסמוך עליהם. SEO, פרסום ממומן, רשתות חברתיות ותוכן — תחת לוח בקרה אחד.</p>
        <div class="hero-actions">
          <a href="signup.php" class="btn btn-primary">
            הקמת קמפיין AI לעסק
            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14 8H2M2 8L6.5 3.5M2 8L6.5 12.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <a href="#results" class="btn btn-outline-dark">צפייה בתוצאות</a>
        </div>
      </div>

      <div class="hero-chart-block reveal">
        <div>
          <svg class="chart-svg" viewBox="0 0 560 260" id="heroChart" aria-hidden="true">
            <defs>
              <linearGradient id="areaFade" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#D9A441" stop-opacity="0.28"/>
                <stop offset="100%" stop-color="#D9A441" stop-opacity="0"/>
              </linearGradient>
            </defs>
            <path class="chart-area" d="M20,230 L70,214 L140,196 L210,204 L280,162 L350,142 L420,106 L490,80 L540,44 L540,260 L20,260 Z" fill="url(#areaFade)"/>
            <path class="chart-path" id="chartPath" d="M20,230 L70,214 L140,196 L210,204 L280,162 L350,142 L420,106 L490,80 L540,44"/>
            <circle class="chart-dot" cx="140" cy="196" r="4.5"/>
            <circle class="chart-dot" cx="280" cy="162" r="4.5"/>
            <circle class="chart-dot" cx="420" cy="106" r="4.5"/>
            <circle class="chart-pulse" id="chartPulse" cx="540" cy="44" r="6"/>
            <circle class="chart-dot-end" cx="540" cy="44" r="5.5"/>
          </svg>
          <p class="chart-caption">נפח לידים חודשי — לקוח לדוגמה, 9 חודשי עבודה</p>
        </div>
        <div class="hero-stats">
          <div class="stat-item">
            <div class="stat-number" dir="ltr"><span class="stat-value" data-target="3.2" data-decimals="1" data-prefix="×">×0</span></div>
            <div class="stat-label">עלייה ממוצעת בלידים</div>
          </div>
          <div class="stat-item">
            <div class="stat-number" dir="ltr">₪<span class="stat-value" data-target="12" data-decimals="0">0</span>M+</div>
            <div class="stat-label">תקציב מדיה בניהולנו</div>
          </div>
          <div class="stat-item">
            <div class="stat-number" dir="ltr"><span class="stat-value" data-target="94" data-decimals="0">0</span>%</div>
            <div class="stat-label">לקוחות שנשארים איתנו</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= INDUSTRIES STRIP ================= -->
  <div class="industries">
    <div class="wrap">
      <span class="tag-label">עובדים לצד עסקים מתחומי</span>
      <div class="tags">
        <span>קמעונאות</span><span>נדל״ן</span><span>בריאות</span><span>טכנולוגיה</span><span>B2B</span><span>מזון ואירוח</span>
      </div>
    </div>
  </div>

  <!-- ================= SERVICES ================= -->
  <section class="section" id="services">
    <div class="wrap">
      <div class="section-head reveal">
        <span class="eyebrow">השירותים שלנו</span>
        <h2>ארבעה מנועים. צמיחה אחת.</h2>
        <p>כל שירות עומד בפני עצמו, ויחד הם בונים מערכת שיווק אחת שעובדת בסנכרון מלא — לא ערוצים מבודדים, אלא מנוע צמיחה משותף.</p>
      </div>
      <div class="services-grid">
        <div class="service-card reveal">
          <svg class="service-icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <circle cx="21" cy="21" r="13" stroke="currentColor" stroke-width="2.5"/>
            <line x1="30.5" y1="30.5" x2="41" y2="41" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M15 23L19 18L23 21L28 14" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <h3>קידום אתרים (SEO)</h3>
          <p>בונים נוכחות אורגנית שממשיכה להביא תוצאות גם בלי תלות בתקציב פרסום — מחקר מילות מפתח, אופטימיזציה טכנית ותוכן שמדורג לאורך זמן.</p>
          <div class="service-metric">65%+ עלייה בתנועה אורגנית</div>
        </div>
        <div class="service-card reveal">
          <svg class="service-icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <circle cx="24" cy="24" r="16" stroke="currentColor" stroke-width="2.5"/>
            <circle cx="24" cy="24" r="9" stroke="currentColor" stroke-width="2.5"/>
            <circle cx="24" cy="24" r="2.5" fill="currentColor"/>
          </svg>
          <h3>פרסום ממומן (PPC)</h3>
          <p>קמפיינים ב-Google וב-Meta שנבדקים ומשופרים באופן שוטף, כדי שכל שקל בתקציב יביא את התשואה הגבוהה ביותר.</p>
          <div class="service-metric">ROAS ממוצע של ×4.1</div>
        </div>
        <div class="service-card reveal">
          <svg class="service-icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <circle cx="12" cy="14" r="4.5" stroke="currentColor" stroke-width="2.5"/>
            <circle cx="36" cy="14" r="4.5" stroke="currentColor" stroke-width="2.5"/>
            <circle cx="24" cy="36" r="4.5" stroke="currentColor" stroke-width="2.5"/>
            <line x1="15.5" y1="16.5" x2="21" y2="32" stroke="currentColor" stroke-width="2.5"/>
            <line x1="32.5" y1="16.5" x2="27" y2="32" stroke="currentColor" stroke-width="2.5"/>
            <line x1="16.5" y1="14" x2="31.5" y2="14" stroke="currentColor" stroke-width="2.5"/>
          </svg>
          <h3>רשתות חברתיות</h3>
          <p>אסטרטגיית תוכן ותקשורת שבונה קהילה אמיתית סביב המותג — מעורבות שהופכת בהדרגה ללקוחות משלמים.</p>
          <div class="service-metric">×2.8 מעורבות ממוצעת</div>
        </div>
        <div class="service-card reveal">
          <svg class="service-icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <rect x="8" y="12" width="20" height="20" rx="3" stroke="currentColor" stroke-width="2.5"/>
            <rect x="20" y="16" width="20" height="20" rx="3" stroke="currentColor" stroke-width="2.5"/>
          </svg>
          <h3>מיתוג ותוכן</h3>
          <p>זהות מותג ברורה ותוכן שמספר סיפור אחד עקבי בכל נקודת מגע — מהאתר ועד לרשתות החברתיות.</p>
          <div class="service-metric">40+ מותגים מוגדרים מחדש</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= PROCESS ================= -->
  <section class="section process" id="process">
    <div class="wrap">
      <div class="section-head reveal">
        <span class="eyebrow on-dark">איך אנחנו עובדים</span>
        <h2>מנתונים לתוצאות, בארבעה שלבים</h2>
        <p>תהליך עבודה ברור וחוזר על עצמו בכל קמפיין, כדי שתמיד תדעו בדיוק איפה אתם עומדים.</p>
      </div>
      <div class="process-grid reveal">
        <div class="process-step">
          <div class="process-num">01</div>
          <h3>אבחון ומחקר</h3>
          <p>מנתחים את השוק, המתחרים והנתונים הקיימים שלכם, כדי להבין בדיוק איפה אתם עומדים היום.</p>
        </div>
        <div class="process-step">
          <div class="process-num">02</div>
          <h3>אסטרטגיה</h3>
          <p>בונים תוכנית שיווק מותאמת אישית, עם יעדים ברורים ומדדי הצלחה שמוגדרים מראש.</p>
        </div>
        <div class="process-step">
          <div class="process-num">03</div>
          <h3>הרצה</h3>
          <p>משיקים קמפיינים בכל הערוצים הרלוונטיים, עם מעקב צמוד אחר כל שקל שמושקע.</p>
        </div>
        <div class="process-step">
          <div class="process-num">04</div>
          <h3>אופטימיזציה</h3>
          <p>בוחנים תוצאות בזמן אמת ומכוונים את הקמפיינים באופן שוטף לביצועים מקסימליים.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= RESULTS ================= -->
  <section class="section results" id="results">
    <div class="wrap">
      <div class="section-head reveal">
        <span class="eyebrow on-dark">תוצאות</span>
        <h2>התוצאות מדברות בעצמן</h2>
        <p>לא סיסמאות שיווקיות — מספרים אמיתיים מתוך העבודה השוטפת שלנו עם לקוחות.</p>
      </div>
      <div class="results-grid">
        <div class="result-card reveal">
          <div class="result-number" dir="ltr"><span class="stat-value" data-target="3.2" data-decimals="1" data-prefix="×">×0</span></div>
          <div class="result-label">צמיחה ממוצעת בלידים</div>
        </div>
        <div class="result-card reveal">
          <div class="result-number" dir="ltr">₪<span class="stat-value" data-target="12" data-decimals="0">0</span>M+</div>
          <div class="result-label">תקציב מדיה שניהלנו</div>
        </div>
        <div class="result-card reveal">
          <div class="gauge-wrap">
            <svg class="gauge-svg" viewBox="0 0 100 100" aria-hidden="true">
              <circle class="gauge-track" cx="50" cy="50" r="42"/>
              <circle class="gauge-fill" id="gaugeFill" cx="50" cy="50" r="42" stroke-dasharray="263.9" stroke-dashoffset="263.9"/>
            </svg>
            <div class="gauge-text"><span class="stat-value" data-target="94" data-decimals="0">0</span>%</div>
          </div>
          <div class="result-label">לקוחות שנשארים איתנו מעל שנה</div>
        </div>
        <div class="result-card reveal">
          <div class="result-number" dir="ltr"><span class="stat-value" data-target="48" data-decimals="0">0</span></div>
          <div class="result-label">שעות לדוח ותובנות ראשוניות</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= TESTIMONIAL ================= -->
  <section class="section" id="testimonial">
    <div class="wrap">
      <div class="section-head center reveal" style="margin-bottom:44px;">
        <span class="eyebrow" style="justify-content:center;">מה אומרים עלינו</span>
      </div>
      <div class="testimonial-card reveal">
        <div class="testimonial-mark" aria-hidden="true">״</div>
        <p class="testimonial-quote">תוך פחות מחצי שנה הכפלנו את כמות הלידים, ועדיין הצלחנו לצמצם את עלות הרכישה. הרגשנו לראשונה שמישהו באמת עוקב אחרי המספרים שלנו — לא רק אחרי ה״לייקים״.</p>
        <p class="testimonial-attr">סמנכ״לית שיווק PAX <span>· דנה כהן</span></p>
      </div>
    </div>
  </section>

  <!-- ================= CTA ================= -->
  <section class="section cta-section" id="contact">
    <div class="wrap">
      <div class="reveal">
        <h2>מוכנים להתחיל לצמוח?</h2>
        <p>בואו נדבר 20 דקות על העסק והיעדים שלכם — בלי שום התחייבות.</p>
        <div class="cta-actions">
          <a href="signup.php" class="btn btn-primary">
            הקמת קמפיין AI לעסק שלך עכשיו
            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M14 8H2M2 8L6.5 3.5M2 8L6.5 12.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
        <p class="cta-contact">או כתבו לנו ישירות: <a href="mailto:hello@hdg.co.il">hello@hdg.co.il</a> · <span dir="ltr">058-432-1777</span></p>
      </div>
    </div>
  </section>

</main>

<footer>
  <div class="wrap">
    <div class="footer-top">
      <div class="footer-brand">
        <div class="logo">
          <svg class="logo-mark" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <rect x="1" y="1" width="30" height="30" rx="8" stroke="#fff" stroke-opacity="0.25" stroke-width="1.4"/>
            <path d="M8 21L14.5 13L18.5 16.5L23 9.5" stroke="#D9A441" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M17.5 9H23V14.5" stroke="#D9A441" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="logo-word">HDG</span>
        </div>
        <p>סוכנות שיווק דיגיטלי שהופכת קמפיינים למספרים שאפשר לסמוך עליהם.</p>
      </div>
      <div class="footer-col">
        <h4>ניווט</h4>
        <ul>
          <li><a href="#services">שירותים</a></li>
          <li><a href="#process">תהליך</a></li>
          <li><a href="#results">תוצאות</a></li>
          <li><a href="#contact">צור קשר</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>שירותים</h4>
        <ul>
          <li><a href="#services">קידום אתרים (SEO)</a></li>
          <li><a href="#services">פרסום ממומן</a></li>
          <li><a href="#services">רשתות חברתיות</a></li>
          <li><a href="#services">מיתוג ותוכן</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>צור קשר</h4>
        <ul>
          <li><a href="mailto:hello@hdg.co.il">hello@hdg.co.il</a></li>
          <li><a href="tel:031234567" dir="ltr">058-432-1777</a></li>
          <li><span>הגיא 1, הר אדר</span></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 HDG. כל הזכויות שמורות.</span>
      <div class="footer-social">
        <a href="https://www.linkedin.com/company/135194954/" aria-label="לינקדאין">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.5 8.5H7.5V19H4.5V8.5Z" fill="currentColor"/><circle cx="6" cy="5.2" r="1.8" fill="currentColor"/><path d="M10.3 8.5H13.2V10C13.7 9.1 14.9 8.2 16.7 8.2C19.6 8.2 20.5 10 20.5 12.7V19H17.5V13.3C17.5 11.9 17 11 15.8 11C14.8 11 14.2 11.7 13.9 12.3C13.8 12.6 13.8 13 13.8 13.4V19H10.8C10.8 19 10.9 9.3 10.8 8.5H10.3Z" fill="currentColor"/></svg>
        </a>
        <a href="https://www.linkedin.com/company/135194954/" aria-label="אינסטגרם">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="4" y="4" width="16" height="16" rx="5" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="12" r="3.6" stroke="currentColor" stroke-width="1.7"/><circle cx="16.6" cy="7.4" r="1" fill="currentColor"/></svg>
        </a>
      </div>
    </div>
  </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ============================================================
  // TRACKING HELPERS — index.php
  // ============================================================

  /**
   * Fire a tracking event across ALL platforms simultaneously.
   * @param {string} eventName   - Canonical event name (e.g. 'Lead', 'ViewContent')
   * @param {Object} params      - Event parameters
   */
  function trackEvent(eventName, params) {
    params = params || {};

    // — Meta (Facebook) Pixel —
    try {
      if (window.fbq) {
        fbq('track', eventName, params);
      }
    } catch(e) {}

    // — Google Analytics 4 (via gtag) —
    try {
      if (window.gtag) {
        // Map standard FB event names to GA4 equivalents where needed
        var ga4Map = {
          'Lead':               'generate_lead',
          'ViewContent':        'view_item',
          'InitiateCheckout':   'begin_checkout',
          'CompleteRegistration':'sign_up',
          'Contact':            'contact',
          'Schedule':           'schedule',
          'Search':             'search'
        };
        var ga4Event = ga4Map[eventName] || eventName.toLowerCase().replace(/ /g,'_');
        gtag('event', ga4Event, params);
      }
    } catch(e) {}

    // — Google Ads Conversion (for Lead conversions) —
    try {
      if (window.gtag && eventName === 'Lead') {
        gtag('event', 'conversion', {
          send_to: 'AW-XXXXXXXXXX/XXXXXXXXXXXXXX',  // Replace with your Google Ads conversion action
          value: 1.0,
          currency: 'ILS'
        });
      }
    } catch(e) {}

    // — TikTok Pixel —
    try {
      if (window.ttq) {
        var ttqMap = {
          'Lead':               'SubmitForm',
          'ViewContent':        'ViewContent',
          'InitiateCheckout':   'InitiateCheckout',
          'CompleteRegistration':'CompleteRegistration',
          'Contact':            'Contact'
        };
        var ttqEvent = ttqMap[eventName] || eventName;
        ttq.track(ttqEvent, params);
      }
    } catch(e) {}

    // — Snapchat Pixel —
    try {
      if (window.snaptr) {
        var snapMap = {
          'Lead':               'SIGN_UP',
          'ViewContent':        'VIEW_CONTENT',
          'InitiateCheckout':   'START_CHECKOUT',
          'CompleteRegistration':'SIGN_UP',
          'Contact':            'SUBSCRIBE'
        };
        var snapEvent = snapMap[eventName] || 'CUSTOM_EVENT_1';
        snaptr('track', snapEvent, params);
      }
    } catch(e) {}

    // — dataLayer push for GTM —
    try {
      window.dataLayer = window.dataLayer || [];
      dataLayer.push({
        event: 'custom_event',
        eventName: eventName,
        eventParams: params
      });
    } catch(e) {}
  }

  // ---- ViewContent: when page becomes visible (scroll depth 0) ----
  trackEvent('ViewContent', {
    content_name: 'Landing Page — HDG',
    content_category: 'Marketing Agency',
    content_type: 'website'
  });

  // ---- Lead: every CTA click that links to signup ----
  document.querySelectorAll('a[href*="signup"]').forEach(function(link) {
    link.addEventListener('click', function() {
      trackEvent('Lead', {
        content_name: 'CTA Click — ' + (link.textContent.trim().substring(0, 50) || 'signup'),
        content_category: 'Conversion',
        currency: 'ILS'
      });
    });
  });

  // ---- Contact: email / phone link clicks ----
  document.querySelectorAll('a[href^="mailto:"], a[href^="tel:"]').forEach(function(link) {
    link.addEventListener('click', function() {
      trackEvent('Contact', {
        content_name: link.href,
        content_type: link.href.startsWith('mailto') ? 'email' : 'phone'
      });
    });
  });

  // ---- Scroll depth milestones (25%, 50%, 75%, 90%) ----
  var scrollMilestones = {25: false, 50: false, 75: false, 90: false};
  window.addEventListener('scroll', function() {
    var scrollPct = Math.round((window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100);
    Object.keys(scrollMilestones).forEach(function(pct) {
      if (!scrollMilestones[pct] && scrollPct >= parseInt(pct)) {
        scrollMilestones[pct] = true;
        // Push scroll depth to GA4 / GTM dataLayer
        try {
          window.dataLayer = window.dataLayer || [];
          dataLayer.push({
            event: 'scroll_depth',
            scroll_depth: pct + '%',
            page_location: window.location.href
          });
          if (window.gtag) gtag('event', 'scroll', { percent_scrolled: parseInt(pct) });
        } catch(e) {}
      }
    });
  }, { passive: true });

  // ---- Section visibility events (ViewContent per section) ----
  var sectionMap = {
    'services':    'Services Section',
    'process':     'Process Section',
    'results':     'Results Section',
    'testimonial': 'Testimonial Section',
    'contact':     'CTA Section'
  };
  if ('IntersectionObserver' in window) {
    var sectionObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var sectionId = entry.target.getAttribute('id');
          if (sectionId && sectionMap[sectionId]) {
            trackEvent('ViewContent', {
              content_name: sectionMap[sectionId],
              content_category: 'Section View',
              content_type: 'section'
            });
          }
          sectionObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4 });
    Object.keys(sectionMap).forEach(function(id) {
      var el = document.getElementById(id);
      if (el) sectionObserver.observe(el);
    });
  }
  // ============================================================
  // END TRACKING — index.php
  // ============================================================

  /* ---- Mobile nav toggle ---- */
  var navToggle = document.getElementById('navToggle');
  var mobilePanel = document.getElementById('mobilePanel');
  if (navToggle && mobilePanel) {
    navToggle.addEventListener('click', function () {
      var open = mobilePanel.classList.toggle('open');
      navToggle.classList.toggle('is-open', open);
      navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      document.body.style.overflow = open ? 'hidden' : '';
    });
    mobilePanel.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        mobilePanel.classList.remove('open');
        navToggle.classList.remove('is-open');
        navToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
  }

  /* ---- Hero chart draw-in ---- */
  var chartPath = document.getElementById('chartPath');
  if (chartPath) {
    var len = chartPath.getTotalLength();
    chartPath.style.strokeDasharray = len;
    if (reduceMotion) {
      chartPath.style.strokeDashoffset = 0;
    } else {
      chartPath.style.strokeDashoffset = len;
      chartPath.style.transition = 'stroke-dashoffset 1.8s cubic-bezier(.2,.7,.3,1)';
      requestAnimationFrame(function () {
        requestAnimationFrame(function () { chartPath.style.strokeDashoffset = 0; });
      });
      var pulse = document.getElementById('chartPulse');
      if (pulse) setTimeout(function () { pulse.classList.add('animate'); }, 1800);
    }
  }

  /* ---- Gauge fill ---- */
  var gauge = document.getElementById('gaugeFill');

  /* ---- Counter animation ---- */
  function animateCounter(el) {
    var target = parseFloat(el.getAttribute('data-target'));
    var decimals = parseInt(el.getAttribute('data-decimals') || '0', 10);
    var prefix = el.getAttribute('data-prefix') || '';
    if (reduceMotion || isNaN(target)) {
      el.textContent = prefix + target.toFixed(decimals);
      return;
    }
    var duration = 1400;
    var start = null;
    function step(ts) {
      if (!start) start = ts;
      var progress = Math.min((ts - start) / duration, 1);
      var eased = 1 - Math.pow(1 - progress, 3);
      var value = target * eased;
      el.textContent = prefix + value.toFixed(decimals);
      if (progress < 1) requestAnimationFrame(step);
      else el.textContent = prefix + target.toFixed(decimals);
    }
    requestAnimationFrame(step);
  }

  /* ---- Scroll reveal + triggers ---- */
  var revealEls = document.querySelectorAll('.reveal');
  var countedGroups = new WeakSet();

  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');

          var counters = entry.target.querySelectorAll('.stat-value');
          counters.forEach(function (c) {
            if (!countedGroups.has(c)) {
              countedGroups.add(c);
              animateCounter(c);
            }
          });

          if (entry.target.querySelector('#gaugeFill') && gauge) {
            gauge.style.strokeDashoffset = 263.9 * (1 - 0.94);
          }

          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    revealEls.forEach(function (el) { io.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('in-view'); });
    document.querySelectorAll('.stat-value').forEach(animateCounter);
    if (gauge) gauge.style.strokeDashoffset = 263.9 * (1 - 0.94);
  }

  /* ---- Sticky header shadow on scroll ---- */
  var header = document.querySelector('header');
  window.addEventListener('scroll', function () {
    if (window.scrollY > 12) header.style.boxShadow = '0 8px 24px rgba(0,0,0,0.25)';
    else header.style.boxShadow = 'none';
  }, { passive: true });
});
</script>
</body>
</html>
