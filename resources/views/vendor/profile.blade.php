@extends('vendor.layout')

@section('page_title', 'My Profile')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    :root {
        --gold: #c8a45e;
        --gold-light: #f5edd8;
        --ink: #1a1a2e;
        --ink-soft: #3d3d56;
        --cream: #faf8f5;
        --sage: #4a7c59;
        --sage-light: #e8f2eb;
        --red-soft: #e05252;
        --border: #e8e4dc;
        --blue: #3b6cf8;
        --blue-light: #eef1fe;
    }
    * { box-sizing: border-box; }
    body { font-family: 'DM Sans', sans-serif; }

    /* Cover */
    .profile-cover {
        height: 160px;
        background: linear-gradient(135deg, #1a1a2e 0%, #2d2d4a 60%, #3b3b5e 100%);
        border-radius: 20px 20px 0 0;
        position: relative;
        overflow: hidden;
    }
    .profile-cover::before {
        content: '';
        position: absolute; inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    /* Avatar */
    .avatar-wrap {
        position: absolute;
        bottom: -40px; left: 32px;
        width: 84px; height: 84px;
        border-radius: 50%;
        border: 4px solid #fff;
        background: var(--gold-light);
        display: flex; align-items: center; justify-content: center;
        font-size: 32px; font-weight: 700; color: var(--gold);
        box-shadow: 0 4px 20px rgba(0,0,0,0.12);
        font-family: 'Playfair Display', serif;
    }

    /* Vendor type badge */
    .vendor-badge {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 4px 12px; border-radius: 50px;
        font-size: 11px; font-weight: 700; letter-spacing: .8px;
        text-transform: uppercase;
    }
    .badge-training  { background: var(--blue-light);  color: var(--blue); }
    .badge-product   { background: var(--sage-light);  color: var(--sage); }
    .badge-default   { background: var(--gold-light);  color: var(--gold); }

    /* Status dot */
    .status-dot { width: 9px; height: 9px; border-radius: 50%; background: #22c55e; display: inline-block; margin-right: 5px; box-shadow: 0 0 0 2px #dcfce7; }

    /* Info grid */
    .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0; }
    .info-cell {
        padding: 16px 20px;
        border-bottom: 1px solid var(--border);
        border-right: 1px solid var(--border);
    }
    .info-cell:nth-child(even) { border-right: none; }
    .info-cell:nth-last-child(-n+2) { border-bottom: none; }
    .info-label { font-size: 11px; font-weight: 700; letter-spacing: .8px; text-transform: uppercase; color: #aaa; margin-bottom: 5px; }
    .info-value { font-size: 15px; font-weight: 600; color: var(--ink); }

    /* Stat cards */
    .stat-card {
        background: #fff; border: 1px solid var(--border);
        border-radius: 16px; padding: 20px;
        text-align: center;
        transition: box-shadow 0.2s, transform 0.2s;
    }
    .stat-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.07); transform: translateY(-3px); }
    .stat-num { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: var(--ink); }
    .stat-label { font-size: 12px; color: #888; margin-top: 3px; }

    /* Edit button */
    .btn-edit {
        display: inline-flex; align-items: center; gap: 8px;
        background: var(--ink); color: #fff;
        padding: 10px 20px; border-radius: 12px;
        font-size: 13px; font-weight: 600;
        text-decoration: none; border: none; cursor: pointer;
        transition: background 0.2s, transform 0.15s;
        font-family: 'DM Sans', sans-serif;
    }
    .btn-edit:hover { background: #2d2d4a; transform: translateY(-1px); }

    .btn-outline {
        display: inline-flex; align-items: center; gap: 8px;
        background: #fff; color: var(--ink-soft);
        padding: 10px 20px; border-radius: 12px;
        font-size: 13px; font-weight: 600;
        text-decoration: none; border: 1.5px solid var(--border); cursor: pointer;
        transition: border-color 0.2s, background 0.2s;
        font-family: 'DM Sans', sans-serif;
    }
    .btn-outline:hover { border-color: var(--gold); background: var(--gold-light); }

    /* Section heading */
    .section-heading {
        font-family: 'Playfair Display', serif;
        font-size: 1rem; font-weight: 700; color: var(--ink);
        margin-bottom: 14px;
        display: flex; align-items: center; gap: 8px;
    }

    /* Activity timeline */
    .timeline-item {
        display: flex; gap: 14px; padding: 12px 0;
        border-bottom: 1px solid var(--border);
    }
    .timeline-item:last-child { border-bottom: none; }
    .timeline-dot {
        width: 36px; height: 36px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px; flex-shrink: 0;
    }

    @media (max-width: 640px) {
        .info-grid { grid-template-columns: 1fr; }
        .info-cell { border-right: none; }
        .info-cell:nth-last-child(-n+2) { border-bottom: 1px solid var(--border); }
        .info-cell:last-child { border-bottom: none; }
    }
</style>

<div class="max-w-3xl mx-auto px-4 py-6">

    {{-- ══ MAIN PROFILE CARD ══ --}}
    <div style="background:#fff; border:1px solid var(--border); border-radius:20px; overflow:hidden; margin-bottom:24px; box-shadow:0 4px 24px rgba(0,0,0,0.06);">

        {{-- Cover --}}
        <div class="profile-cover">
            {{-- Avatar --}}
            <div class="avatar-wrap">
                {{ strtoupper(substr($vendor->name, 0, 1)) }}
            </div>
        </div>

        {{-- Name row --}}
        <div style="padding: 52px 32px 24px; border-bottom: 1px solid var(--border);">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:12px;">
                <div>
                    <h1 style="font-family:'Playfair Display',serif; font-size:1.6rem; font-weight:700; color:var(--ink); margin:0 0 5px;">
                        {{ $vendor->name }}
                    </h1>
                    <p style="color:#888; font-size:14px; margin:0 0 10px;">
                        {{ $vendor->email }}
                    </p>
                    <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;">
                        <span class="vendor-badge {{ 'badge-'.strtolower($vendor->type ?? 'default') }}">
                            🏷️ {{ ucfirst($vendor->type ?? 'Vendor') }}
                        </span>
                        <span style="font-size:13px; color:#888;">
                            <span class="status-dot"></span> Active
                        </span>
                        <span style="font-size:13px; color:#aaa;">
                            📅 Joined {{ $vendor->created_at->format('M Y') }}
                        </span>
                    </div>
                </div>
                <div style="display:flex; gap:8px; flex-wrap:wrap;">
                    <a  class="btn-edit">✏️ Edit Profile</a>
                    <a  class="btn-outline">⚙️ Settings</a>
                </div>
            </div>
        </div>

        {{-- Info Grid --}}
        <div class="info-grid">
            <div class="info-cell">
                <div class="info-label">Full Name</div>
                <div class="info-value">{{ $vendor->name }}</div>
            </div>
            <div class="info-cell">
                <div class="info-label">Email Address</div>
                <div class="info-value">{{ $vendor->email }}</div>
            </div>
            <div class="info-cell">
                <div class="info-label">Vendor Type</div>
                <div class="info-value capitalize">{{ ucfirst($vendor->type ?? '—') }}</div>
            </div>
            <div class="info-cell">
                <div class="info-label">Member Since</div>
                <div class="info-value">{{ $vendor->created_at->format('d M Y') }}</div>
            </div>
            <div class="info-cell">
                <div class="info-label">Phone</div>
                <div class="info-value">{{ $vendor->phone ?? '—' }}</div>
            </div>
            <div class="info-cell">
                <div class="info-label">Account Status</div>
                <div class="info-value" style="color:var(--sage);">✔ Active &amp; Verified</div>
            </div>
        </div>

    </div>

    <div style="background:#fff; border:1px solid var(--border); border-radius:20px; padding:22px; margin-top:24px;">

   <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">

    <div class="section-heading">📍 Academy Locations</div>

    <button onclick="openLocationModal()"
        style="background:#1a6fd4; color:#fff; padding:8px 16px; border-radius:10px; font-size:13px; font-weight:600;">
        + Add Location
    </button>

</div>

    <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:16px;">

        <div style="background:#eef1fe; padding:16px; border-radius:12px;">
            <div style="font-weight:600;">Adnan Main Ground</div>
            <div style="font-size:13px; color:#666;">UK</div>
            <div style="font-size:12px; color:#999;">5 Practice Pitches</div>
        </div>

        <div style="background:#dcfce7; padding:16px; border-radius:12px;">
            <div style="font-weight:600;">Cricket Cricket Hub</div>
            <div style="font-size:13px; color:#666;">UK</div>
            <div style="font-size:12px; color:#999;">Bowling Machines</div>
        </div>

        <div style="background:#fef3c7; padding:16px; border-radius:12px;">
            <div style="font-weight:600;">Cricket Center</div>
            <div style="font-size:13px; color:#666;">UK</div>
            <div style="font-size:12px; color:#999;">Gym + Strength</div>
        </div>

    </div>
</div>

<div style="background:#fff; border:1px solid var(--border); border-radius:20px; padding:22px; margin-top:24px;">

    <div class="section-heading">📅 Weekly Coaching Schedule</div>

    <table style="width:100%; font-size:14px; margin-top:10px;">
        <thead style="background:#f3f4f6;">
            <tr>
                <th style="padding:10px;text-align:left;">Day</th>
                <th style="padding:10px;text-align:left;">Location</th>
                <th style="padding:10px;text-align:left;">Timing</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td style="padding:10px;">Monday</td>
                <td>Adnan Ground</td>
                <td>6 AM - 9 AM</td>
            </tr>

            <tr>
                <td style="padding:10px;">Tuesday</td>
                <td>Cricket Hub</td>
                <td>7 AM - 10 AM</td>
            </tr>

            <tr>
                <td style="padding:10px;">Wednesday</td>
                <td>Adnan Ground</td>
                <td>6 AM - 9 AM</td>
            </tr>

            <tr>
                <td style="padding:10px;">Thursday</td>
                <td>Cricket Center</td>
                <td>5 PM - 7 PM</td>
            </tr>

            <tr>
                <td style="padding:10px;">Friday</td>
                <td>Cricket Hub</td>
                <td>6 AM - 9 AM</td>
            </tr>

            <tr>
                <td style="padding:10px;">Saturday</td>
                <td>Adnan Ground</td>
                <td>6 AM - 11 AM</td>
            </tr>

        </tbody>
    </table>
</div>
<div style="background:#fff; border:1px solid var(--border); border-radius:20px; padding:22px; margin-top:24px;">

    <div class="section-heading">🏏 Coaching Distribution</div>

    <div style="margin-top:10px; display:flex; flex-direction:column; gap:10px;">

        <div style="background:#eef1fe; padding:10px; border-radius:10px;">
            Adnan Ground — 60% Time
        </div>

        <div style="background:#dcfce7; padding:10px; border-radius:10px;">
            Cricket Hub — 25% Time
        </div>

        <div style="background:#fef3c7; padding:10px; border-radius:10px;">
            Cricket Center — 15% Time
        </div>

    </div>
</div>

    {{-- ══ STATS ROW ══ --}}
    <div style="display:grid; grid-template-columns: repeat(4,1fr); gap:14px; margin-bottom:24px;">
        <div class="stat-card">
            <div class="stat-num" style="color:var(--blue);">{{ $vendor->products_count ?? 0 }}</div>
            <div class="stat-label">Products</div>
        </div>
        <div class="stat-card">
            <div class="stat-num" style="color:var(--sage);">{{ $vendor->orders_count ?? 0 }}</div>
            <div class="stat-label">Orders</div>
        </div>
        <div class="stat-card">
            <div class="stat-num" style="color:var(--gold);">£{{ number_format($vendor->total_revenue ?? 0, 0) }}</div>
            <div class="stat-label">Revenue</div>
        </div>
        <div class="stat-card">
            <div class="stat-num" style="color:var(--red-soft);">{{ $vendor->reviews_count ?? 0 }}</div>
            <div class="stat-label">Reviews</div>
        </div>
    </div>

    {{-- ══ BOTTOM ROW ══ --}}
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

        {{-- Recent Activity (static) --}}
        <div style="background:#fff; border:1px solid var(--border); border-radius:20px; padding:22px; box-shadow:0 2px 12px rgba(0,0,0,0.04);">
            <div class="section-heading">📋 Recent Activity</div>
            @foreach([
                ['bg:#eef1fe','🛒','New order received','2 hrs ago'],
                ['bg:var(--sage-light)','✅','Product approved','Yesterday'],
                ['bg:var(--gold-light)','⭐','New review posted','2 days ago'],
                ['bg:#fde8e8','📦','Stock updated','3 days ago'],
            ] as [$bg, $icon, $text, $time])
            <div class="timeline-item">
                <div class="timeline-dot" style="{{ $bg }};">{{ $icon }}</div>
                <div style="flex:1;">
                    <div style="font-size:14px; font-weight:600; color:var(--ink);">{{ $text }}</div>
                    <div style="font-size:12px; color:#aaa; margin-top:2px;">{{ $time }}</div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Quick Links --}}
        <div style="background:#fff; border:1px solid var(--border); border-radius:20px; padding:22px; box-shadow:0 2px 12px rgba(0,0,0,0.04);">
            <div class="section-heading">⚡ Quick Links</div>
           
        </div>

    </div>

</div>

@endsection