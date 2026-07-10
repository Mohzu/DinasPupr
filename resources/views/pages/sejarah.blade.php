@extends('layouts.app')

@section('title', 'Sejarah - Dinas PUPR Kabupaten Garut')
@section('description', 'Sejarah singkat Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
@php
    $milestones = [];
    
    if (isset($sejarah) && !empty($sejarah->content)) {
        // Parse database content by double-newlines (paragraphs)
        $blocks = preg_split('/\r\n\r\n|\n\n/', trim($sejarah->content));
        
        $currentYear = null;
        $currentTitle = null;
        $currentDesc = [];
        
        foreach ($blocks as $block) {
            $lines = array_map('trim', explode("\n", trim($block)));
            if (empty($lines)) continue;
            
            // Check if the first line is a 4-digit year (e.g. 1942)
            if (preg_match('/^\d{4}$/', $lines[0])) {
                if ($currentYear) {
                    $milestones[] = [
                        'year' => $currentYear,
                        'title' => $currentTitle,
                        'description' => implode("\n\n", $currentDesc)
                    ];
                }
                $currentYear = $lines[0];
                $currentTitle = isset($lines[1]) ? $lines[1] : '';
                $currentDesc = array_slice($lines, 2);
            } else {
                if ($currentYear) {
                    $currentDesc[] = implode("\n", $lines);
                }
            }
        }
        if ($currentYear) {
            $milestones[] = [
                'year' => $currentYear,
                'title' => $currentTitle,
                'description' => implode("\n\n", $currentDesc)
            ];
        }
    }

    // Fallback if no milestones parsed
    if (empty($milestones)) {
        $milestones = [
            [
                'year' => '1942',
                'title' => 'Pembentukan Dinas Pekerjaan Umum',
                'description' => 'Dinas Pekerjaan Umum (DPU) didirikan oleh Belanda pada tahun 1942 oleh Reguen Shad. Pembentukan ini menjadi fondasi awal pembangunan infrastruktur di wilayah Kabupaten Garut.'
            ],
            [
                'year' => '1998',
                'title' => 'Transformasi Kelembagaan',
                'description' => "Pada tahun 1998, Dinas Pekerjaan Umum (DPU) bertransformasi menjadi Dinas Bina Marga.\n\nTransformasi ini menekankan pentingnya manajemen kepegawaian dan pengembangan Sumber Daya Manusia (SDM) dalam mengelola dan memanfaatkan pegawai agar tetap produktif dalam melaksanakan tugas dan tanggung jawab."
            ],
            [
                'year' => '2016',
                'title' => 'Pembentukan Dinas PUPR',
                'description' => "Pembentukan Resmi\n5 Oktober 2016\nDinas Pekerjaan Umum dan Penataan Ruang resmi dibentuk berdasarkan Peraturan Bupati No. 27 tentang Struktur Organisasi dan Tata Kerja (SOTK). Instansi ini dipimpin oleh Drs. H. UU Saepudin, ST., M.Si. sebagai Kepala Dinas pertama.\n\nLandasan Hukum\nPerda No. 52 Tahun 2016\nOrganisasi Dinas PUPR ditetapkan melalui Peraturan Daerah Kabupaten Garut Nomor 52 Tahun 2016, yang mengatur tugas pokok, fungsi, dan tata kerja."
            ]
        ];
    }
@endphp

<div class="min-h-screen bg-gray-50">
    {{-- Original Hero Section --}}
    <section class="relative overflow-hidden mb-8 shadow-2xl h-[70vh] min-h-[500px]">
        <div class="absolute inset-0">
            <img src="{{ asset('img/DinasPUPR.jpg') }}" alt="Background PUPR Garut" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/50 to-black/70"></div>
            <div class="absolute inset-0 bg-black/20"></div>
        </div>

        <div class="absolute inset-0 z-5">
            <div class="absolute top-8 left-8 w-16 h-16 bg-white bg-opacity-10 rounded-full animate-pulse"></div>
            <div class="absolute top-24 right-12 w-12 h-12 bg-yellow-300 bg-opacity-30 rounded-full animate-bounce"></div>
            <div class="absolute bottom-16 left-1/4 w-10 h-10 bg-green-400 bg-opacity-20 rounded-full animate-ping"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
            <div class="max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 bg-white bg-opacity-95 backdrop-blur-md rounded-full px-4 py-2 text-gray-800 text-sm font-semibold mb-6 border border-white border-opacity-50 shadow-lg">
                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16z"/></svg>
                    Profil Instansi
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4 drop-shadow-[4px_4px_8px_rgba(0,0,0,0.9)]">
                    Sejarah
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">Instansi</span>
                </h1>

                <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3 mb-2">
                    <p class="text-lg md:text-xl text-white font-semibold max-w-3xl mx-auto drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                        Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Perjalanan Membangun Negeri Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Left Side: Image from User --}}
                <div class="relative group">
                    <div class="absolute -inset-1.5 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl blur opacity-25 group-hover:opacity-40 transition duration-1000"></div>
                    <div class="relative rounded-3xl aspect-[1.6] shadow-xl overflow-hidden bg-slate-100">
                        <img src="{{ asset('img/sejarah_kantor.jpg') }}" alt="Kantor Dinas PUPR Garut" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>

                {{-- Right Side: Content --}}
                <div class="space-y-6">
                    <h2 class="text-3xl font-bold text-slate-900 tracking-tight">
                        Perjalanan Membangun Negeri
                    </h2>
                    
                    {{-- Small decorative yellow bar --}}
                    <div class="w-16 h-1 bg-amber-500 rounded-full"></div>

                    <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                        Sejak berdirinya, Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten Garut telah menjadi tulang punggung pembangunan infrastruktur di wilayah "Swiss van Java". Dedikasi kami berawal dari visi sederhana: menghubungkan setiap sudut kabupaten demi meningkatkan kesejahteraan rakyat.
                    </p>

                    <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                        Melalui berbagai dekade, institusi ini telah bertransformasi dari sekadar departemen pemeliharaan jalan menjadi badan yang komprehensif, mencakup pengelolaan sumber daya air, bina marga, cipta karya, hingga penataan ruang strategis yang berkelanjutan.
                    </p>

                    <div class="flex items-center gap-3 text-sm font-bold text-blue-900 pt-2">
                        <span class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </span>
                        Berkomitmen untuk Inovasi Berkelanjutan
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Milestone Pembangunan Section --}}
    <section class="py-20 bg-slate-50/50 border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-5xl">
            {{-- Header --}}
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    {{ $sejarah->title ?? 'Milestone Pembangunan' }}
                </h2>
                <p class="text-slate-500 mt-4 text-sm md:text-base max-w-xl mx-auto leading-relaxed">
                    Jejak langkah nyata dalam pembangunan infrastruktur strategis di Kabupaten Garut dari tahun ke tahun.
                </p>
            </div>

            {{-- Custom Alternating Timeline --}}
            <div class="relative mt-12">
                {{-- Central Vertical Line --}}
                <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-slate-200 transform -translate-x-1/2"></div>

                @foreach($milestones as $index => $milestone)
                    @php
                        $isEven = $index % 2 == 1;
                        $badgeBg = $isEven ? 'bg-blue-900' : 'bg-amber-500';
                    @endphp
                    <div class="relative flex flex-col md:flex-row md:items-center justify-between mb-16">
                        {{-- Year Circle Badge --}}
                        <div class="absolute left-4 md:left-1/2 w-10 h-10 rounded-full border-4 border-white {{ $badgeBg }} flex items-center justify-center text-white font-bold text-xs shadow-md transform -translate-x-1/2 z-10">
                            {{ $milestone['year'] }}
                        </div>
                        
                        @if(!$isEven)
                            {{-- Left Side Content --}}
                            <div class="w-full md:w-[calc(50%-2.5rem)] ml-12 md:ml-0 md:text-right">
                                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition duration-300">
                                    <h3 class="text-lg font-bold text-slate-800 mb-2">{{ $milestone['title'] }}</h3>
                                    <div class="text-sm text-slate-500 leading-relaxed space-y-3 md:text-right text-left">
                                        @foreach(explode("\n\n", $milestone['description']) as $para)
                                            <p>{!! nl2br(e($para)) !!}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- Empty Spacer on the Right --}}
                            <div class="hidden md:block w-[calc(50%-2.5rem)]"></div>
                        @else
                            {{-- Empty Spacer on the Left --}}
                            <div class="hidden md:block w-[calc(50%-2.5rem)]"></div>
                            
                            {{-- Right Side Content --}}
                            <div class="w-full md:w-[calc(50%-2.5rem)] ml-12 md:ml-0">
                                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition duration-300">
                                    <h3 class="text-lg font-bold text-slate-800 mb-2">{{ $milestone['title'] }}</h3>
                                    <div class="text-sm text-slate-500 leading-relaxed space-y-3">
                                        @foreach(explode("\n\n", $milestone['description']) as $para)
                                            <p>{!! nl2br(e($para)) !!}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection