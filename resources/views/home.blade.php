@extends('layouts.app')

@section('content')

<!-- Trainings -->
<!-- <h2 class="text-2xl font-bold mb-6 text-gray-800">
    🏋️ Trainings
</h2>

<div class="grid md:grid-cols-3 gap-6">

@foreach($products as $p)
<div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4">

    <div class="h-40 bg-gray-200 rounded mb-4 flex items-center justify-center">
        <span class="text-gray-400">Image</span>
    </div>

    <h3 class="text-lg font-semibold text-gray-800">
        {{ $p->title }}
    </h3>

    <p class="text-gray-500 text-sm mt-1">
        {{ $p->description }}
    </p>

    <div class="flex justify-between items-center mt-4">

        <span class="text-xl font-bold text-green-600">
            ₹{{ $p->price }}
        </span>

        <a href="/cart/add/training/{{ $p->id }}"
           class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
            Add
        </a>

    </div>
</div>
@endforeach

</div> -->


<!-- Courses -->
<!-- <h2 class="text-2xl font-bold mt-10 mb-6 text-gray-800">
    📚 Courses
</h2>

<div class="grid md:grid-cols-3 gap-6"> -->

<!-- @foreach($courses as $c)
<div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4">

    <div class="h-40 bg-gray-200 rounded mb-4 flex items-center justify-center">
        <span class="text-gray-400">Image</span>
    </div>

    <h3 class="text-lg font-semibold text-gray-800">
        {{ $c->title }}
    </h3>

    <p class="text-gray-500 text-sm mt-1">
        {{ $c->description }}
    </p>

    <div class="flex justify-between items-center mt-4">

        <span class="text-xl font-bold text-blue-600">
            ₹{{ $c->price }}
        </span>

        <a href="/cart/add/course/{{ $c->id }}"
           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
            Add
        </a>

    </div>
</div>
@endforeach

</div> -->
<!-- ═══ HERO ═══ -->
<div class="hero-strip">
  <div class="hero-inner">
    <div class="hero-tag">🏆 Level Up Your Game</div>
    <h1 class="hero-title">Train Hard.<br><em>Win Big.</em></h1>
    <p class="hero-sub">Expert-led trainings &amp; courses built for athletes at every level.</p>
  </div>
</div>
<main>

  <!-- ── Trainings ── -->
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
        @foreach($products as $p)
            <div class="card">
            <div class="card-media" style="background:linear-gradient(135deg,#0f1f0f,#1a2e1a)">
                
                <div class="card-media-inner" style="background:rgba(34,197,94,0.12)">
                    🏋️
                </div>

                <span class="card-media-tag tag-training">Training</span>
            </div>

            <div class="card-body">
                <div class="card-title">{{ $p->title }}</div>

                <div class="card-desc">
                    {{ Str::limit($p->description, 100) }}
                </div>
            </div>

            <div class="card-footer">
                <div class="price price-green">₹{{ $p->price }}</div>

                <a href="{{ url('/cart/add/training/'.$p->id) }}"
                class="add-btn add-green">
                + Add
                </a>
            </div>
            </div>
        @endforeach
    </div>


  <!-- ── Courses ── -->
  <div class="section-header section-gap">
    <div class="section-label">
      <div class="section-icon icon-blue">📚</div>
      <div>
        <div class="section-title">Courses</div>
        <div class="section-count">4 courses available</div>
      </div>
    </div>
    <span style="font-size:0.8rem;color:rgba(255,255,255,0.3)">Self-paced &amp; online</span>
  </div>

  <div class="grid">
        @foreach($courses as $c)
            <div class="card">
            <div class="card-media" style="background:linear-gradient(135deg,#0a0f1f,#101828)">
                
                <div class="card-media-inner" style="background:rgba(59,130,246,0.12)">
                    📚
                </div>

                <span class="card-media-tag tag-course">Course</span>
            </div>

            <div class="card-body">
                <div class="card-title">{{ $c->title }}</div>

                <div class="card-desc">
                    {{ Str::limit($c->description, 100) }}
                </div>
            </div>

            <div class="card-footer">
                <div class="price price-blue">₹{{ $c->price }}</div>

                <a href="{{ url('/cart/add/course/'.$c->id) }}"
                class="add-btn add-blue">
                + Add
                </a>
            </div>
            </div>
        @endforeach
    </div>
</main>

@endsection