@extends('layouts.app')

@section('content')


    <div class="relative overflow-hidden h-[400px] ">

        @foreach($banners as $key => $b)
            <div
                class="slide absolute w-full h-full transition-opacity duration-700 {{ $key == 0 ? 'opacity-100' : 'opacity-0' }}">

                <img src="/banners/{{ $b->image }}" class="w-full h-full object-cover">

                <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">

                    {{-- <h1 class="text-3xl md:text-5xl font-bold">
                        {{ $b->title }}
                    </h1>

                    <p class="text-sm md:text-lg mt-3 max-w-xl">
                        {{ $b->description }}
                    </p> --}}

                </div>

            </div>
        @endforeach

    </div>


    <script>
        let slides = document.querySelectorAll('.slide');
        let index = 0;

        setInterval(() => {
            slides.forEach((s, i) => {
                s.style.opacity = i === index ? '1' : '0';
            });

            index = (index + 1) % slides.length;
        }, 3000);
    </script>




<section id="shop" class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div class="text-center mb-16">
           

            {{-- <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
                Cricket <span class="text-yellow-500">Shop</span>
            </h2> --}}
        </div>

        <!-- ================= COURSES ================= -->
        <div class="mb-20">
           <h3 class="text-2xl font-bold mb-8">🎓 Coaching Courses</h3>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach($courses as $c)
                <div class="bg-white rounded-xl overflow-hidden border shadow-sm hover:shadow-lg transition">

                    <!-- IMAGE -->
                    <img src="{{ $c->image ? asset('courses/'.$c->image) : asset('assets/default.jpg') }}"
                         class="w-full h-48 object-cover" />

                    <div class="p-6">

                        <!-- CATEGORY -->
                        <p class="text-green-600 text-sm mb-1">
                            {{ $c->category->name ?? 'Training' }}
                        </p>

                        <!-- TITLE -->
                        <h3 class="font-semibold text-gray-900">
                            {{ $c->title }}
                        </h3>

                        <!-- DESC -->
                        <p class="text-sm text-gray-500 mt-2">
                            {{ $c->description }}
                        </p>

                        <!-- PRICE + ACTION -->
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-yellow-500 font-semibold text-sm">
                                £{{ $c->price }} <span class="text-[10px]">/ month</span>
                            </span>

                            <div class="flex gap-2">
                                <a href="{{ url('course/'.$c->id) }}"
                                   class="bg-gray-200 px-2 py-1 rounded text-xs">
                                    View
                                </a>

                                <a href="{{ url('/cart/add/course/'.$c->id) }}"
                                   class="bg-green-600 text-white px-2 py-1 rounded text-xs hover:bg-green-700">
                                    +Add
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>

            <div class="text-center mt-10">
                <a href="/all-courses"
                   class="border px-6 py-2 rounded-lg hover:bg-gray-200">
                    View All Courses →
                </a>
            </div>
        </div>

        <!-- ================= PRODUCTS ================= -->
        <div>
            <h3 class="text-2xl font-bold mb-8">📚 Products</h3>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach($products as $p)
                <div class="bg-white rounded-xl overflow-hidden border shadow-sm hover:shadow-lg transition">

                    <!-- IMAGE -->
                    <img src="{{ $p->image ? asset('products/'.$p->image) : asset('assets/default.jpg') }}"
                         class="w-full h-48 object-cover" />

                    <div class="p-6">

                        <!-- CATEGORY -->
                        <p class="text-green-600 text-sm mb-1">
                            {{ $p->category->name ?? 'Product' }}
                        </p>

                        <!-- TITLE -->
                        <h3 class="font-semibold text-gray-900">
                            {{ $p->title }}
                        </h3>

                        <!-- DESC -->
                        <p class="text-sm text-gray-500 mt-2">
                            {{ $p->description}}
                        </p>

                        <!-- PRICE + ACTION -->
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-yellow-500 font-semibold text-lg">
                                £{{ $p->price }}
                            </span>

                            <div class="flex gap-2">
                                <a href="{{ url('product/'.$p->id) }}"
                                   class="bg-gray-200 px-3 py-1 rounded text-sm">
                                    View
                                </a>

                                <a href="{{ url('/cart/add/training/'.$p->id) }}"
                                   class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">
                                    +Add
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>

            <div class="text-center mt-10">
                <a href="/all-products"
                   class="border px-6 py-2 rounded-lg hover:bg-gray-200">
                    View All Products →
                </a>
            </div>
        </div>

    </div>
</section>


   

    <section id="about" class="bg-gray-100 py-24">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

            <!-- Image -->

            <div data-aos="fade-right">
                <img src="{{ asset('assets/coaching.jpg') }}" alt="Cricket Training" class="rounded-2xl shadow-lg w-full" />
            </div>

            <!-- Content -->

            <div data-aos="fade-left">

                <p class="text-green-600 tracking-widest text-sm font-semibold mb-4">
                    ABOUT US
                </p>

                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                    Building Champions
                    <br />

                    <span class="text-yellow-500">
                        Since 2009
                    </span>
                </h2>

                <p class="text-gray-600 mt-6 leading-relaxed">
                        Our Coaching Institute is committed to helping students excel in their academic journey across the UK curriculum.  
                        We specialise in GCSE and A-Level preparation for Mathematics, Science, and English.  
                        With experienced tutors, structured lesson plans, and regular assessments, we ensure every student builds strong foundations, improves confidence, and achieves top grades.
                </p>

                <!-- Features -->

                <div class="grid grid-cols-2 gap-6 mt-8">

                    <div class="flex items-center gap-3">
                        <span class="w-3 h-3 bg-green-600 rounded-full"></span>

                        <span class="text-gray-800">
                           Expert Teachers  
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="w-3 h-3 bg-green-600 rounded-full"></span>

                        <span class="text-gray-800">
                            Small Batch Learning  
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="w-3 h-3 bg-green-600 rounded-full"></span>

                        <span class="text-gray-800">
                           Regular Assessments 
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="w-3 h-3 bg-green-600 rounded-full"></span>

                        <span class="text-gray-800">
                            Personalised Support  
                        </span>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <section id="programs" class="py-24 text-white"
        style=" background: linear-gradient(135deg,hsl(220 50% 12%) 0%,hsl(220 45% 18%) 50%,hsl(145 40% 20%) 100%);">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Heading -->

            <div class="text-center mb-16" data-aos="fade-up">
                <p class="text-green-400 tracking-[0.25em] text-sm mb-4">
                    OUR PROGRAMS
                </p>

                <h2 class="text-4xl md:text-5xl font-bold">
                    Coaching
                    <span class="text-yellow-400">
                        Programs
                    </span>
                </h2>
            </div>

            <!-- Cards -->

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Card 1 -->

                <div class="bg-[#132842] rounded-xl p-8 hover:-translate-y-2 transition duration-300" data-aos="fade-up">
                    <div class="w-14 h-14 flex items-center justify-center bg-green-500/20 rounded-lg mb-6">
                        🎯
                    </div>

                    <h3 class="text-xl font-semibold mb-3">
                        Mathematics (GCSE & A-Level)
                    </h3>

                    <p class="text-gray-300 text-sm leading-relaxed">
                       Master algebra, geometry, and problem-solving techniques aligned with UK curriculum.
                    </p>

                    <div class="flex justify-between text-sm text-gray-400 mt-6">
                        <span>⏱ 3 Months</span>
                        <span>📊 All Levels</span>
                    </div>
                </div>

                <!-- Card 2 -->

                <div class="bg-[#132842] rounded-xl p-8 hover:-translate-y-2 transition duration-300" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="w-14 h-14 flex items-center justify-center bg-green-500/20 rounded-lg mb-6">
                        ⚡
                    </div>

                    <h3 class="text-xl font-semibold mb-3">
                       Science (GCSE)
                    </h3>

                    <p class="text-gray-300 text-sm leading-relaxed">
                        Comprehensive Physics, Chemistry, and Biology with practical understanding.
                    </p>

                    <div class="flex justify-between text-sm text-gray-400 mt-6">
                        <span>⏱ 4 Months</span>
                        <span>📊 Intermediate</span>
                    </div>
                </div>

                <!-- Card 3 -->

                <div class="bg-[#132842] rounded-xl p-8 hover:-translate-y-2 transition duration-300" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="w-14 h-14 flex items-center justify-center bg-green-500/20 rounded-lg mb-6">
                        🛡
                    </div>

                    <h3 class="text-xl font-semibold mb-3">
                        A-Level Preparation
                    </h3>

                    <p class="text-gray-300 text-sm leading-relaxed">
                        Advanced subject-focused coaching to achieve top grades and university readiness.
                    </p>

                    <div class="flex justify-between text-sm text-gray-400 mt-6">
                        <span>⏱ 3 Months</span>
                        <span>📊 All Levels</span>
                    </div>
                </div>

                <!-- Card 4 -->

                <div class="bg-[#132842] rounded-xl p-8 hover:-translate-y-2 transition duration-300" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="w-14 h-14 flex items-center justify-center bg-green-500/20 rounded-lg mb-6">
                        🏆
                    </div>

                    <h3 class="text-xl font-semibold mb-3">
                       Computer & Digital Skills

                    </h3>

                    <p class="text-gray-300 text-sm leading-relaxed">
                       Build essential IT skills and basic programming knowledge for modern education.
                    </p>

                    <div class="flex justify-between text-sm text-gray-400 mt-6">
                        <span>⏱ 2 Months</span>
                        <span>📊 Advanced</span>
                    </div>
                </div>

            </div>

        </div>
    </section>


 <section id="achievements" class="bg-gray-100 py-24">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->
        <div class="text-center mb-16" data-aos="fade-up">
            <p class="text-green-600 tracking-[0.25em] text-sm mb-4">
                OUR RESULTS
            </p>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
                Student
                <span class="text-yellow-500">
                    Achievements
                </span>
            </h2>
        </div>

        <!-- Content -->
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Achievement List -->
            <div class="space-y-6" data-aos="fade-right">

                <!-- GCSE -->
                <div class="flex items-center bg-white rounded-xl p-6 shadow-sm border">
                    <div class="text-yellow-500 font-bold text-lg w-28">
                        GCSE Results
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">
                            Over 90% of students achieved Grade 7+
                        </h4>
                        <p class="text-gray-500 text-sm">
                            Excellent academic performance
                        </p>
                    </div>
                </div>

                <!-- A-Level -->
                <div class="flex items-center bg-white rounded-xl p-6 shadow-sm border">
                    <div class="text-yellow-500 font-bold text-lg w-28">
                        A-Level
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">
                            Students secured A & A* grades
                        </h4>
                        <p class="text-gray-500 text-sm">
                            Strong subject mastery
                        </p>
                    </div>
                </div>

                <!-- Institute -->
                <div class="flex items-center bg-white rounded-xl p-6 shadow-sm border">
                    <div class="text-yellow-500 font-bold text-lg w-28">
                        Excellence
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">
                            Recognised as a top-performing coaching institute
                        </h4>
                        <p class="text-gray-500 text-sm">
                            Consistent high results
                        </p>
                    </div>
                </div>

                <!-- University -->
                <div class="flex items-center bg-white rounded-xl p-6 shadow-sm border">
                    <div class="text-yellow-500 font-bold text-lg w-28">
                        University
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">
                            Students placed in leading UK universities
                        </h4>
                        <p class="text-gray-500 text-sm">
                            Successful academic pathways
                        </p>
                    </div>
                </div>

                <!-- Progress -->
                <div class="flex items-center bg-white rounded-xl p-6 shadow-sm border">
                    <div class="text-yellow-500 font-bold text-lg w-28">
                        Progress
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">
                            Average improvement of 2+ grade levels
                        </h4>
                        <p class="text-gray-500 text-sm">
                            Measurable student growth
                        </p>
                    </div>
                </div>

            </div>

            <!-- Image -->
            <div data-aos="fade-left">
                <img src="{{ asset('assets/students.jpg') }}" 
                     alt="Student Achievements"
                     class="rounded-2xl shadow-lg w-full" />
            </div>

        </div>

    </div>
</section>


    <section id="gallery" class="py-24 hero-gradient">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Heading -->

            <div class="text-center mb-16" data-aos="fade-up">
                <p class="text-green-400 font-semibold tracking-[0.2em] uppercase text-sm mb-2">
                    Gallery
                </p>

                <h2 class="text-4xl md:text-5xl font-bold text-white">
                    Our
                    <span class="text-yellow-400">
                        Moments
                    </span>
                </h2>
            </div>

            <!-- Gallery Grid -->

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 auto-rows-[200px]">

                <!-- Image 1 -->

                <div class="rounded-lg overflow-hidden col-span-2 row-span-2" data-aos="zoom-in">
                    <img src="{{ asset('assets/player-batting.jpg') }}"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                </div>

                <!-- Image 2 -->

                <div class="rounded-lg overflow-hidden" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('assets/player-bowling.jpg') }}"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                </div>

                <!-- Image 3 -->

                <div class="rounded-lg overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('assets/coaching.jpg') }}"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                </div>

                <!-- Image 4 -->

                <div class="rounded-lg overflow-hidden col-span-2" data-aos="zoom-in" data-aos-delay="300">
                    <img src="{{ asset('assets/trophy.jpg') }}"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                </div>

                <!-- Image 5 -->

                <div class="rounded-lg overflow-hidden" data-aos="zoom-in" data-aos-delay="400">
                    <img src="{{ asset('assets/hero-cricket.jpg') }}"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                </div>

                <!-- Image 6 -->

                <div class="rounded-lg overflow-hidden" data-aos="zoom-in" data-aos-delay="500">
                    <img src="{{ asset('assets/equipment.jpg') }}"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                </div>

            </div>

        </div>
    </section>


    <section id="testimonials" class="bg-gray-100 py-24">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Heading -->

            <div class="text-center mb-16" data-aos="fade-up">
                <p class="text-green-600 tracking-[0.25em] text-sm mb-4">
                    TESTIMONIALS
                </p>

                <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
                    What People
                    <span class="text-yellow-500">
                        Say
                    </span>
                </h2>
            </div>

            <!-- Testimonials Grid -->

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Card -->

                <div class="bg-white p-8 rounded-xl border shadow-sm hover:shadow-lg transition" data-aos="fade-up">
                    <div class="text-yellow-400 mb-4 text-lg">
                        ★★★★★
                    </div>

                    <p class="text-gray-600 text-sm leading-relaxed italic">
                      "The teaching approach here really helped me improve my Maths grades from a 5 to an 8 in GCSE. Highly recommended!"

                    </p>

                    <div class="mt-6">
                        <h4 class="font-semibold text-gray-900">
                           — James Walker, GCSE Student
                        </h4>

                        <p class="text-sm text-gray-500">
                          GCSE Student
                        </p>
                    </div>
                </div>

                <!-- Card -->

                <div class="bg-white p-8 rounded-xl border shadow-sm hover:shadow-lg transition" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="text-yellow-400 mb-4 text-lg">
                        ★★★★★
                    </div>

                    <p class="text-gray-600 text-sm leading-relaxed italic">
                        "My daughter gained confidence in Science and achieved excellent GCSE results. The tutors are very supportive."

                    </p>

                    <div class="mt-6">
                        <h4 class="font-semibold text-gray-900">
                           — Sarah Thompson, Parent
                        </h4>

                        <p class="text-sm text-gray-500">
                            Parent
                        </p>
                    </div>
                </div>

                <!-- Card -->

                <div class="bg-white p-8 rounded-xl border shadow-sm hover:shadow-lg transition" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="text-yellow-400 mb-4 text-lg">
                        ★★★★★
                    </div>

                    <p class="text-gray-600 text-sm leading-relaxed italic">
                       "The A-Level preparation was outstanding. I secured an A in Physics thanks to their structured teaching."
                    </p>

                    <div class="mt-6">
                        <h4 class="font-semibold text-gray-900">
                           — Daniel Evans, A-Level Student
                        </h4>

                        <p class="text-sm text-gray-500">
                             A-Level Student
                        </p>
                    </div>
                </div>

                <!-- Card -->

                <div class="bg-white p-8 rounded-xl border shadow-sm hover:shadow-lg transition" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="text-yellow-400 mb-4 text-lg">
                        ★★★★★
                    </div>

                    <p class="text-gray-600 text-sm leading-relaxed italic">
                       "Professional and well-organised coaching. Regular feedback helped us track our child’s progress."

                    </p>

                    <div class="mt-6">
                        <h4 class="font-semibold text-gray-900">
                          — Emma Clarke, Parent
                        </h4>

                        <p class="text-sm text-gray-500">
                            Parent
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    


@endsection