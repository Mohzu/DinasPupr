@extends('layouts.app')

@section('title', 'Sejarah - Dinas PUPR Kabupaten Garut')
@section('description', 'Sejarah singkat Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<div class="min-h-screen bg-slate-50 relative overflow-hidden">
    <section class="relative overflow-hidden mb-8 shadow-2xl mt-20 h-[70vh] min-h-[500px]">
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

    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/10 to-purple-400/10 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute top-1/3 -left-40 w-60 h-60 bg-gradient-to-br from-green-400/10 to-cyan-400/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-40 right-1/4 w-96 h-96 bg-gradient-to-br from-yellow-400/10 to-orange-400/10 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
    </div>
    
    <section class="container mx-auto px-6 pb-16 -mt-32 relative z-20 max-w-6xl">
        <div class="**bg-gray-900/95** backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 overflow-hidden relative">
            
            <div class="p-8 lg:p-12 space-y-16">
                
                <div class="relative timeline-item flex flex-col lg:flex-row gap-8 items-start">
                    <div class="hidden lg:block absolute left-1/3 top-0 bottom-0 w-px bg-slate-200 transform -translate-x-1/2"></div>
                    
                    <div class="lg:w-1/3 flex-shrink-0 relative">
                        <div class="sticky top-8 lg:text-right">
                            <div class="bg-gradient-to-br from-amber-50 to-orange-100 p-6 rounded-2xl border-l-4 border-amber-500 shadow-xl relative transform transition-transform duration-300 hover:scale-[1.02]">
                                <div class="flex flex-row-reverse lg:flex-row items-center gap-4 mb-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-full flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">1942</span>
                                    </div>
                                    <h3 class="text-xl font-bold **text-gray-800** flex-grow">Pembentukan Dinas Pekerjaan Umum</h3>
                                </div>
                                <div class="absolute -left-1.5 lg:-left-2 top-1/2 -translate-y-1/2 w-3 h-3 bg-amber-500 rounded-full ring-4 ring-amber-200"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="lg:w-2/3">
                        <div class="bg-white p-8 lg:p-10 rounded-2xl border shadow-lg relative transform transition-transform duration-300 hover:scale-[1.01] hover:shadow-2xl">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-6 h-6 bg-amber-500 rounded-full animate-pulse"></div>
                                <span class="text-amber-600 font-semibold text-sm tracking-widest uppercase">Pembentukan Dinas Pekerjaan Umum</span>
                            </div>
                            <p class="**text-gray-700** leading-relaxed text-base lg:text-lg">
                                Kantor dinas PUPR Garut dulunya bernama <strong>Dinas Pekerjaan Umum (DPU)</strong> yang semula berada di lingkungan Kabupaten yang didirikan oleh <strong>Belanda pada tahun 1942</strong> oleh Reguen Shad. Ini menjadi fondasi awal pembangunan infrastruktur di wilayah Kabupaten Garut.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="relative timeline-item flex flex-col lg:flex-row gap-8 items-start">
                    <div class="hidden lg:block absolute left-1/3 top-0 bottom-0 w-px bg-slate-200 transform -translate-x-1/2"></div>
                    
                    <div class="lg:w-1/3 flex-shrink-0 relative">
                        <div class="sticky top-8 lg:text-right">
                            <div class="bg-gradient-to-br from-green-50 to-emerald-100 p-6 rounded-2xl border-l-4 border-green-500 shadow-xl relative transform transition-transform duration-300 hover:scale-[1.02]">
                                <div class="flex flex-row-reverse lg:flex-row items-center gap-4 mb-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">1998</span>
                                    </div>
                                    <h3 class="text-xl font-bold **text-gray-800** flex-grow">Transformasi</h3>
                                </div>
                                <div class="absolute -left-1.5 lg:-left-2 top-1/2 -translate-y-1/2 w-3 h-3 bg-green-500 rounded-full ring-4 ring-green-200"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="lg:w-2/3">
                        <div class="bg-white p-8 lg:p-10 rounded-2xl border shadow-lg relative transform transition-transform duration-300 hover:scale-[1.01] hover:shadow-2xl">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-6 h-6 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-green-600 font-semibold text-sm tracking-widest uppercase">Transformasi</span>
                            </div>
                            <p class="**text-gray-700** leading-relaxed mb-4 text-base lg:text-lg">
                                Pada tahun <strong>1998</strong>, Dinas Pekerjaan Umum (DPU) berganti nama menjadi <strong>Dinas Bina Marga</strong>.
                            </p>
                            <p class="**text-gray-700** leading-relaxed text-base lg:text-lg">
                                Transformasi ini menekankan pentingnya manajemen kepegawaian dan Sumber Daya Manusia (SDM) dalam mengelola dan memanfaatkan pegawai agar tetap produktif dalam melaksanakan tugas dan tanggung jawab.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="relative timeline-item flex flex-col lg:flex-row gap-8 items-start">
                    <div class="hidden lg:block absolute left-1/3 top-0 bottom-0 w-px bg-slate-200 transform -translate-x-1/2"></div>

                    <div class="lg:w-1/3 flex-shrink-0 relative">
                        <div class="sticky top-8 lg:text-right">
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-100 p-6 rounded-2xl border-l-4 border-blue-500 shadow-xl relative transform transition-transform duration-300 hover:scale-[1.02]">
                                <div class="flex flex-row-reverse lg:flex-row items-center gap-4 mb-3">
                                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">2016</span>
                                    </div>
                                    <h3 class="text-xl font-bold **text-gray-800** flex-grow">Dinas PUPR Terbentuk</h3>
                                </div>
                                <div class="absolute -left-1.5 lg:-left-2 top-1/2 -translate-y-1/2 w-3 h-3 bg-blue-500 rounded-full ring-4 ring-blue-200"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="lg:w-2/3 space-y-6">
                        <div class="bg-white p-8 rounded-xl border shadow-lg relative transform transition-transform duration-300 hover:scale-[1.01] hover:shadow-2xl">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A1.195 1.195 0 0121 8.865v4.27a1.195 1.195 0 01-.682 1.082l-5.6 3.111a1.195 1.195 0 01-1.124 0l-5.6-3.111A1.195 1.195 0 013 13.135v-4.27a1.195 1.195 0 01.682-1.082l5.6-3.111a1.195 1.195 0 011.124 0l5.6 3.111z" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold **text-gray-900** mb-2 text-xl">Pembentukan Resmi</h4>
                                    <p class="**text-gray-700** leading-relaxed text-base">
                                        Dinas Pekerjaan Umum dan Penataan ruang resmi berdiri pada tanggal <strong>5 Oktober 2016</strong>, sesuai <strong>Peraturan Bupati No. 27</strong> tentang SOTK (Struktur Organisasi Tata Kerja). Dipimpin oleh <strong>Bapak Drs. H. UU Saepudin, ST., M.Si.</strong>, instansi ini mulai menjalankan tugasnya dengan fokus yang lebih terintegrasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-8 rounded-xl border shadow-lg relative transform transition-transform duration-300 hover:scale-[1.01] hover:shadow-2xl">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold **text-gray-900** mb-2 text-xl">Landasan Hukum</h4>
                                    <p class="**text-gray-700** leading-relaxed text-base">
                                        Organisasi Dinas Pekerjaan Umum dan Penataan Ruang ditetapkan melalui <strong>Peraturan Daerah Kabupaten Garut Nomor: 52 Tahun 2016</strong>. Peraturan ini mengamanatkan tugas pokok, fungsi, dan tata kerja dalam melaksanakan Kewenangan Otonomi Daerah di bidang Sumber Daya Air, Kebinamargaan, Infrastruktur & Permukiman, Bangunan, dan Penataan Ruang.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-slate-100 p-8 lg:p-12 rounded-2xl border-t border-slate-200">
                    <div class="max-w-4xl mx-auto text-center">
                        <h3 class="text-2xl font-bold **text-gray-900** mb-4">Warisan Pembangunan</h3>
                        <p class="**text-gray-600** leading-relaxed text-base mb-6">
                            Dinas PUPR melanjutkan tongkat estafet pembangunan yang telah dimulai oleh tiga dinas sebelumnya.
                        </p>
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-slate-200">
                            <div class="flex flex-col md:flex-row items-center justify-center gap-4 text-center">
                                <span class="text-sm md:text-base font-semibold **text-gray-700**">Dinas SDAP</span>
                                <span class="text-xl text-blue-400 font-bold hidden md:block">&bull;</span>
                                <span class="text-sm md:text-base font-semibold **text-gray-700**">Dinas Bina Marga</span>
                                <span class="text-xl text-blue-400 font-bold hidden md:block">&bull;</span>
                                <span class="text-sm md:text-base font-semibold **text-gray-700**">Dinas Tata Ruang Permukiman</span>
                            </div>
                            <p class="**text-gray-700** leading-relaxed text-sm mt-4">
                                Sinergi ini telah menghasilkan kemajuan yang signifikan, terukur dari perkembangan indikator makro pembangunan hingga tahun 2013.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 lg:p-12 rounded-3xl">
                    <div class="text-center mb-10">
                        <h3 class="text-3xl font-bold **text-gray-900** mb-4">Bidang Kewenangan</h3>
                        <p class="**text-gray-600** max-w-2xl mx-auto text-lg">
                            Lima bidang utama yang menjadi fokus pelayanan Dinas PUPR Kabupaten Garut.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 lg:gap-8">
                        @php $bidang = [
                            ['icon' => 'M5 8a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V8z', 'title' => 'Sumberdaya Air', 'color' => 'from-blue-500 to-cyan-600'],
                            ['icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7', 'title' => 'Kebinamargaan', 'color' => 'from-green-500 to-emerald-600'],
                            ['icon' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z', 'title' => 'Infrastruktur & Permukiman', 'color' => 'from-purple-500 to-indigo-600'],
                            ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'title' => 'Bangunan', 'color' => 'from-orange-500 to-red-600'],
                            ['icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7', 'title' => 'Penataan Ruang', 'color' => 'from-pink-500 to-rose-600'],
                        ]; @endphp
                        @foreach ($bidang as $b)
                        <div class="text-center group p-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:bg-slate-50">
                            <div class="w-16 h-16 bg-gradient-to-br {{ $b['color'] }} rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl transform transition-transform duration-300 group-hover:scale-110 group-hover:shadow-2xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $b['icon'] }}"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 leading-tight group-hover:text-blue-600 transition-colors">{{ $b['title'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
/* Custom animations for the decorative elements */
@keyframes blob {
    0% {
        transform: translate(0px, 0px) scale(1);
    }
    33% {
        transform: translate(30px, -50px) scale(1.1);
    }
    66% {
        transform: translate(-20px, 20px) scale(0.9);
    }
    100% {
        transform: translate(0px, 0px) scale(1);
    }
}

.animate-blob {
    animation: blob 7s infinite cubic-bezier(0.6, -0.28, 0.735, 0.045);
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

/* Timeline specific styles for better mobile view */
@media (max-width: 1023px) {
    .timeline-item {
        position: relative;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 28px;
        width: 2px;
        background-color: #e2e8f0;
    }
}
</style>
@endsection