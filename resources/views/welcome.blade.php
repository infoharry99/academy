<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sports Academy</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --bg:#f0f6ff;
  --surface:#ffffff;
  --surface-2:#e8f1fd;
  --border:#d0e2f7;
  --border-strong:#a8c8f0;
  --text-primary:#0d1f3c;
  --text-secondary:#4a6890;
  --text-muted:#8aaac8;
  --accent:#1a6fd4;
  --accent-light:#e3eefd;
  --accent-hover:#1558b0;
  --green:#16a34a;
  --green-light:#dcfce7;
  --green-border:#86efac;
  --blue:#2563eb;
  --blue-light:#dbeafe;
  --blue-border:#93c5fd;
  --red:#dc2626;
  --red-light:#fee2e2;
}

html{scroll-behavior:smooth}

body{
  background:var(--bg);
  color:var(--text-primary);
  font-family:'DM Sans',sans-serif;
  font-size:16px;
  line-height:1.6;
  min-height:100vh;
}

/* ── Header ── */
header{
  position:sticky;top:0;z-index:100;
  background:rgba(255,255,255,0.92);
  backdrop-filter:blur(12px);
  border-bottom:1px solid var(--border);
  box-shadow:0 1px 12px rgba(26,111,212,0.07);
}
.header-inner{
  max-width:1280px;margin:0 auto;padding:0 2rem;
  height:68px;display:flex;align-items:center;justify-content:space-between;
}
.logo{
  font-family:'Bebas Neue',sans-serif;
  font-size:1.8rem;letter-spacing:0.04em;
  color:var(--text-primary);display:flex;align-items:center;gap:8px;
  text-decoration:none;
}
.logo span{color:var(--accent)}
nav{display:flex;align-items:center;gap:6px}
nav a{
  padding:6px 14px;border-radius:6px;
  font-size:0.875rem;font-weight:500;
  color:var(--text-secondary);
  text-decoration:none;transition:all 0.18s;
}
nav a:hover{color:var(--accent);background:var(--accent-light)}
.btn{
  display:inline-flex;align-items:center;gap:6px;
  padding:7px 18px;border-radius:8px;
  font-size:0.875rem;font-weight:600;
  text-decoration:none;transition:all 0.18s;cursor:pointer;border:none;
}
.btn-accent{background:var(--accent);color:#fff}
.btn-accent:hover{background:var(--accent-hover)}
.btn-ghost{
  background:var(--accent-light);color:var(--accent);
  border:1px solid var(--blue-border);
}
.btn-ghost:hover{background:#c8dff9}
.btn-danger{background:var(--red-light);color:var(--red);border:1px solid #fca5a5}
.btn-danger:hover{background:#fecaca}
.nav-user{
  display:flex;align-items:center;gap:8px;
  padding:5px 12px;border-radius:8px;
  background:var(--surface-2);border:1px solid var(--border);
  font-size:0.875rem;font-weight:500;color:var(--text-primary);
}
.cart-btn{position:relative}
.cart-badge{
  position:absolute;top:-6px;right:-6px;
  background:var(--accent);color:#fff;
  font-size:10px;font-weight:700;
  width:18px;height:18px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
}

/* ── Hero strip ── */
.hero-strip{
  background:linear-gradient(135deg,#c8dff9 0%,#ddeeff 40%,#e8f4ff 100%);
  border-bottom:1px solid var(--border);
  padding:4rem 2rem 3rem;
  position:relative;overflow:hidden;
}
.hero-strip::before{
  content:'SPORTS ACADEMY';
  position:absolute;right:-2rem;top:50%;transform:translateY(-50%);
  font-family:'Bebas Neue',sans-serif;font-size:12rem;
  color:rgba(26,111,212,0.07);letter-spacing:0.02em;
  white-space:nowrap;pointer-events:none;line-height:1;
}
.hero-inner{max-width:1280px;margin:0 auto}
.hero-tag{
  display:inline-flex;align-items:center;gap:8px;
  background:rgba(26,111,212,0.1);
  border:1px solid rgba(26,111,212,0.3);
  border-radius:20px;padding:4px 14px;
  font-size:0.75rem;font-weight:600;letter-spacing:0.08em;
  color:var(--accent);text-transform:uppercase;margin-bottom:1rem;
}
.hero-title{
  font-family:'Bebas Neue',sans-serif;
  font-size:clamp(2.5rem,6vw,4.5rem);letter-spacing:0.03em;
  line-height:1;margin-bottom:0.5rem;color:var(--text-primary);
}
.hero-title em{color:var(--accent);font-style:normal}
.hero-sub{color:var(--text-secondary);font-size:1rem;max-width:520px}

/* ── Main ── */
main{max-width:1280px;margin:0 auto;padding:3rem 2rem 6rem}

/* ── Section header ── */
.section-header{
  display:flex;align-items:flex-end;justify-content:space-between;
  margin-bottom:2rem;
  border-bottom:1.5px solid var(--border);
  padding-bottom:1.25rem;
}
.section-label{display:flex;align-items:center;gap:12px}
.section-icon{
  width:44px;height:44px;border-radius:10px;
  display:flex;align-items:center;justify-content:center;font-size:1.25rem;
}
.icon-green{background:var(--green-light)}
.icon-blue{background:var(--blue-light)}
.section-title{
  font-family:'Bebas Neue',sans-serif;
  font-size:1.9rem;letter-spacing:0.05em;color:var(--text-primary);
}
.section-count{font-size:0.8rem;color:var(--text-muted);font-weight:500}
.section-gap{margin-top:4.5rem}

/* ── Grid ── */
.grid{
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(300px,1fr));
  gap:1.25rem;
}

/* ── Card ── */
.card{
  background:var(--surface);
  border:1px solid var(--border);
  border-radius:16px;overflow:hidden;
  transition:transform 0.22s,border-color 0.22s,box-shadow 0.22s;
  display:flex;flex-direction:column;
}
.card:hover{
  transform:translateY(-4px);
  border-color:var(--border-strong);
  box-shadow:0 12px 36px rgba(26,111,212,0.13);
}
.card-media{
  height:180px;
  display:flex;align-items:center;justify-content:center;
  position:relative;overflow:hidden;
}
.card-media-inner{
  width:72px;height:72px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;font-size:2rem;
}
.card-media-tag{
  position:absolute;top:12px;left:12px;
  font-size:0.7rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;
  padding:3px 10px;border-radius:20px;
}
.tag-training{background:var(--green-light);color:var(--green);border:1px solid var(--green-border)}
.tag-course{background:var(--blue-light);color:var(--blue);border:1px solid var(--blue-border)}
.card-body{padding:1.25rem;flex:1;display:flex;flex-direction:column;gap:8px}
.card-title{font-size:1.05rem;font-weight:600;line-height:1.3;color:var(--text-primary)}
.card-desc{font-size:0.85rem;color:var(--text-secondary);line-height:1.55;flex:1}
.card-footer{
  padding:1rem 1.25rem;
  border-top:1px solid var(--border);
  display:flex;align-items:center;justify-content:space-between;
  background:var(--surface-2);
}
.price{font-family:'Bebas Neue',sans-serif;font-size:1.6rem;letter-spacing:0.03em}
.price-green{color:var(--green)}
.price-blue{color:var(--blue)}
.add-btn{
  display:inline-flex;align-items:center;gap:6px;
  padding:8px 18px;border-radius:8px;
  font-size:0.85rem;font-weight:600;
  text-decoration:none;transition:all 0.18s;
}
.add-green{background:var(--green-light);color:var(--green);border:1px solid var(--green-border)}
.add-green:hover{background:#bbf7d0;border-color:#4ade80}
.add-blue{background:var(--blue-light);color:var(--blue);border:1px solid var(--blue-border)}
.add-blue:hover{background:#bfdbfe;border-color:#60a5fa}

/* ── Footer ── */
footer{
  border-top:1px solid var(--border);
  background:var(--surface);
  padding:2rem;text-align:center;
  color:var(--text-muted);font-size:0.8rem;
}
footer strong{color:var(--text-secondary)}

/* ── Responsive ── */
@media(max-width:640px){
  .header-inner{padding:0 1rem}
  nav a:not(.btn){display:none}
  .hero-strip{padding:2.5rem 1rem 2rem}
  .hero-strip::before{font-size:5rem}
  main{padding:2rem 1rem 4rem}
  .section-header{flex-direction:column;align-items:flex-start;gap:8px}
  .grid{grid-template-columns:1fr}
}

/* ── Animations ── */
@keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
.card{animation:fadeUp 0.4s ease both}
.card:nth-child(1){animation-delay:.05s}
.card:nth-child(2){animation-delay:.1s}
.card:nth-child(3){animation-delay:.15s}
.card:nth-child(4){animation-delay:.2s}
.card:nth-child(5){animation-delay:.25s}
.card:nth-child(6){animation-delay:.3s}
</style>
</head>
<body>

<!-- ═══ HEADER (layouts/header.blade.php) ═══ -->
<header>
  <div class="header-inner">
    <a href="/" class="logo">⚡<span>Sports</span>Academy</a>
    <nav>
      <a href="/">Home</a>

      <!-- @if(auth()->check()) -->
      <div class="nav-user">👋 Rahul</div>
      <a href="/profile" class="btn btn-ghost">Profile</a>
      <a href="/cart" class="btn btn-ghost cart-btn">
        🛒 Cart
        <span class="cart-badge">3</span>
      </a>
      <a href="/my-orders" class="btn btn-ghost">Orders</a>
      <a href="/logout" class="btn btn-danger">Logout</a>
      <!-- @else -->
      <!--
      <a href="/login" class="btn btn-ghost">Login</a>
      <a href="/register" class="btn btn-accent">Register</a>
      <a href="/vendor/register" style="background:#fef3c7;color:#b45309;border:1px solid #fcd34d" class="btn">Become Seller</a>
      -->
      <!-- @endif -->
    </nav>
  </div>
</header>

<!-- ═══ HERO ═══ -->
<div class="hero-strip">
  <div class="hero-inner">
    <div class="hero-tag">🏆 Level Up Your Game</div>
    <h1 class="hero-title">Train Hard.<br><em>Win Big.</em></h1>
    <p class="hero-sub">Expert-led trainings &amp; courses built for athletes at every level.</p>
  </div>
</div>

<!-- ═══ MAIN / @yield('content') ═══ -->
<main>

  <!-- Trainings -->
  <div class="section-header">
    <div class="section-label">
      <div class="section-icon icon-green">🏋️</div>
      <div>
        <div class="section-title">Trainings</div>
        <div class="section-count">6 programs available</div>
      </div>
    </div>
    <span style="font-size:0.8rem;color:var(--text-muted)">Physical &amp; live sessions</span>
  </div>

  <div class="grid">

    <div class="card">
      <div class="card-media" style="background:linear-gradient(135deg,#dcfce7,#bbf7d0)">
        <div class="card-media-inner" style="background:rgba(22,163,74,0.15)">🥊</div>
        <span class="card-media-tag tag-training">Training</span>
      </div>
      <div class="card-body">
        <div class="card-title">Boxing Fundamentals</div>
        <div class="card-desc">Master stance, footwork, jab-cross combos, and defensive slips with a certified coach.</div>
      </div>
      <div class="card-footer">
        <div class="price price-green">₹1,499</div>
        <a href="/cart/add/training/1" class="add-btn add-green">+ Add</a>
      </div>
    </div>

    <div class="card">
      <div class="card-media" style="background:linear-gradient(135deg,#dcfce7,#bbf7d0)">
        <div class="card-media-inner" style="background:rgba(22,163,74,0.15)">🏃</div>
        <span class="card-media-tag tag-training">Training</span>
      </div>
      <div class="card-body">
        <div class="card-title">Sprint &amp; Endurance Camp</div>
        <div class="card-desc">6-week field training program to improve VO₂ max, sprint speed, and overall stamina.</div>
      </div>
      <div class="card-footer">
        <div class="price price-green">₹2,199</div>
        <a href="/cart/add/training/2" class="add-btn add-green">+ Add</a>
      </div>
    </div>

    <div class="card">
      <div class="card-media" style="background:linear-gradient(135deg,#dcfce7,#bbf7d0)">
        <div class="card-media-inner" style="background:rgba(22,163,74,0.15)">🤸</div>
        <span class="card-media-tag tag-training">Training</span>
      </div>
      <div class="card-body">
        <div class="card-title">Flexibility &amp; Mobility</div>
        <div class="card-desc">Daily mobility routines and deep stretching protocols to prevent injury and boost performance.</div>
      </div>
      <div class="card-footer">
        <div class="price price-green">₹999</div>
        <a href="/cart/add/training/3" class="add-btn add-green">+ Add</a>
      </div>
    </div>

  </div>

  <!-- Courses -->
  <div class="section-header section-gap">
    <div class="section-label">
      <div class="section-icon icon-blue">📚</div>
      <div>
        <div class="section-title">Courses</div>
        <div class="section-count">4 courses available</div>
      </div>
    </div>
    <span style="font-size:0.8rem;color:var(--text-muted)">Self-paced &amp; online</span>
  </div>

  <div class="grid">

    <div class="card">
      <div class="card-media" style="background:linear-gradient(135deg,#dbeafe,#bfdbfe)">
        <div class="card-media-inner" style="background:rgba(37,99,235,0.12)">🧠</div>
        <span class="card-media-tag tag-course">Course</span>
      </div>
      <div class="card-body">
        <div class="card-title">Sports Psychology Masterclass</div>
        <div class="card-desc">Build mental toughness, learn visualization techniques, and develop a champion's mindset.</div>
      </div>
      <div class="card-footer">
        <div class="price price-blue">₹3,499</div>
        <a href="/cart/add/course/1" class="add-btn add-blue">+ Add</a>
      </div>
    </div>

    <div class="card">
      <div class="card-media" style="background:linear-gradient(135deg,#dbeafe,#bfdbfe)">
        <div class="card-media-inner" style="background:rgba(37,99,235,0.12)">🍎</div>
        <span class="card-media-tag tag-course">Course</span>
      </div>
      <div class="card-body">
        <div class="card-title">Athlete Nutrition &amp; Diet</div>
        <div class="card-desc">Macro planning, meal timing, and supplement guidance for peak athletic performance.</div>
      </div>
      <div class="card-footer">
        <div class="price price-blue">₹1,799</div>
        <a href="/cart/add/course/2" class="add-btn add-blue">+ Add</a>
      </div>
    </div>

    <div class="card">
      <div class="card-media" style="background:linear-gradient(135deg,#dbeafe,#bfdbfe)">
        <div class="card-media-inner" style="background:rgba(37,99,235,0.12)">📊</div>
        <span class="card-media-tag tag-course">Course</span>
      </div>
      <div class="card-body">
        <div class="card-title">Sports Analytics Basics</div>
        <div class="card-desc">Understand data-driven performance metrics, wearable tech insights, and match analysis tools.</div>
      </div>
      <div class="card-footer">
        <div class="price price-blue">₹2,999</div>
        <a href="/cart/add/course/3" class="add-btn add-blue">+ Add</a>
      </div>
    </div>

  </div>

</main>

<!-- ═══ FOOTER (layouts/footer.blade.php) ═══ -->
<footer>
  <strong>Sports Academy</strong> &nbsp;·&nbsp; © 2025 All rights reserved &nbsp;·&nbsp;Developed By Nexteck
</footer>

</body>
</html>