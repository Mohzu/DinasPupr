@extends('layouts.app')

@section('title', 'Sejarah - Dinas PUPR Kabupaten Garut')
@section('description', 'Sejarah singkat Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<div class="min-h-screen bg-gray-50">
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

    <section class="container mx-auto px-4 sm:px-6 pb-16 -mt-32 relative z-20 max-w-6xl">
        
        <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden border border-gray-100">
            <!-- Header -->
            <div class="bg-blue-600 px-6 sm:px-8 py-6 text-center">
                <h2 class="text-xl sm:text-2xl font-bold text-white tracking-wide">Sejarah Perkembangan</h2>
            </div>

            <div class="p-6 sm:p-10 space-y-8">
                
                <!-- 1942 -->
                <div class="flex flex-col md:flex-row gap-6 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-[#D97706] rounded-lg flex items-center justify-center shadow-lg transition-transform duration-300">
                            <span class="text-white font-bold text-xl md:text-2xl">1942</span>
                        </div>
                    </div>
                    <div class="flex-1 bg-[#FFFBEB] rounded-2xl p-6 border border-[#FCD34D] hover:shadow-md transition-shadow">
                        <h3 class="flex items-center gap-3 text-lg font-bold text-gray-900 mb-3">
                            <svg class="w-5 h-5 text-[#D97706]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            Pembentukan Dinas Pekerjaan Umum
                        </h3>
                        <p class="text-gray-700 leading-relaxed text-sm md:text-base">
                            Dinas Pekerjaan Umum (DPU) didirikan oleh Belanda pada tahun 1942 oleh Reguen Shad. 
                            Pembentukan ini menjadi fondasi awal pembangunan infrastruktur di wilayah Kabupaten Garut.
                        </p>
                    </div>
                </div>

                <!-- 1998 -->
                <div class="flex flex-col md:flex-row gap-6 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-[#15803d] rounded-lg flex items-center justify-center shadow-lg transition-transform duration-300">
                            <span class="text-white font-bold text-xl md:text-2xl">1998</span>
                        </div>
                    </div>
                    <div class="flex-1 bg-[#F0FDF4] rounded-2xl p-6 border border-[#86EFAC] hover:shadow-md transition-shadow">
                        <h3 class="flex items-center gap-3 text-lg font-bold text-gray-900 mb-3">
                            <svg class="w-5 h-5 text-[#15803d]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            Transformasi Kelembagaan
                        </h3>
                        <div class="space-y-3">
                            <p class="text-gray-700 text-sm md:text-base">
                                Pada tahun 1998, Dinas Pekerjaan Umum (DPU) bertransformasi menjadi <span class="font-bold text-gray-900">Dinas Bina Marga</span>.
                            </p>
                            <p class="text-gray-700 text-sm md:text-base leading-relaxed bg-white/50 p-3 rounded-lg border border-green-100">
                                Transformasi ini menekankan pentingnya manajemen kepegawaian dan pengembangan Sumber Daya Manusia (SDM) 
                                dalam mengelola dan memanfaatkan pegawai agar tetap produktif dalam melaksanakan tugas dan tanggung jawab.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 2016 -->
                <div class="flex flex-col md:flex-row gap-6 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-[#1D4ED8] rounded-lg flex items-center justify-center shadow-lg transition-transform duration-300">
                            <span class="text-white font-bold text-xl md:text-2xl">2016</span>
                        </div>
                    </div>
                    <div class="flex-1 bg-[#EFF6FF] rounded-2xl p-6 border border-[#BFDBFE] hover:shadow-md transition-shadow">
                        <h3 class="flex items-center gap-3 text-lg font-bold text-gray-900 mb-4">
                            <svg class="w-5 h-5 text-[#1D4ED8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            Pembentukan Dinas PUPR
                        </h3>
                        
                        <div class="grid md:grid-cols-1 gap-4">
                            <!-- Card 1 -->
                            <div class="bg-white p-4 rounded-xl border border-blue-100 shadow-sm relative overflow-hidden group">
                                <div class="absolute top-0 left-0 w-1 h-full bg-blue-500 group-hover:w-2 transition-all"></div>
                                <h4 class="font-bold text-gray-900 mb-2 text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    Pembentukan Resmi
                                    <span class="text-[10px] bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full">5 Oktober 2016</span>
                                </h4>
                                <p class="text-gray-600 text-xs sm:text-sm leading-relaxed">
                                    Dinas Pekerjaan Umum dan Penataan Ruang resmi dibentuk berdasarkan <strong class="text-gray-800">Peraturan Bupati No. 27</strong> tentang Struktur Organisasi dan Tata Kerja (SOTK). Instansi ini dipimpin oleh <strong class="text-gray-800">Drs. H. UU Saepudin, ST., M.Si.</strong> sebagai Kepala Dinas pertama.
                                </p>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white p-4 rounded-xl border border-blue-100 shadow-sm relative overflow-hidden group">
                                <div class="absolute top-0 left-0 w-1 h-full bg-gray-700 group-hover:w-2 transition-all"></div>
                                <h4 class="font-bold text-gray-900 mb-2 text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    Landasan Hukum
                                    <span class="text-[10px] bg-gray-800 text-white px-2 py-0.5 rounded-full">Perda No. 52 Tahun 2016</span>
                                </h4>
                                <p class="text-gray-600 text-xs sm:text-sm leading-relaxed">
                                    Organisasi Dinas PUPR ditetapkan melalui <strong class="text-gray-800">Peraturan Daerah Kabupaten Garut Nomor 52 Tahun 2016</strong>, yang mengatur tugas pokok, fungsi, dan tata kerja.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
</div>
@php
    use Illuminate\Support\Str;
@endphp
@endsection