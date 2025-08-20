@extends('layouts.app')

@section('title', 'Arsip & Dokumen - Portal Jawa Barat')
@section('description', 'Akses dan unduh dokumen resmi yang diterbitkan Pemerintah Jawa Barat.')

@section('content')
<style>
    /* Modal Animation */
    .modal {
        transition: opacity 300ms ease-in-out, transform 300ms ease-in-out;
        transform: scale(0.9);
        opacity: 0;
    }
    
    .modal.show {
        opacity: 1;
        transform: scale(1);
    }
    
    .modal-backdrop {
        transition: opacity 300ms ease-in-out;
        opacity: 0;
    }
    
    .modal-backdrop.show {
        opacity: 1;
    }
</style>

<div class="min-h-screen bg-gray-50">
    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-6 py-4">
            <nav class="flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-700">Beranda</a>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700 font-medium">Arsip dan Dokumen</span>
            </nav>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative overflow-hidden mb-8 shadow-2xl mt-8 h-[70vh] min-h-[500px]">
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
                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z"/>
                        <path d="M7 10h6v2H7v-2z"/>
                    </svg>
                    Dokumen Publik
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4 drop-shadow-[4px_4px_8px_rgba(0,0,0,0.9)]">
                    Arsip &
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">Dokumen</span>
                </h1>

                <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3 mb-2">
                    <p class="text-lg md:text-xl text-white font-semibold max-w-3xl mx-auto drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                        Akses dan unduh dokumen resmi yang diterbitkan Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="container mx-auto px-4 pb-16 -mt-8 relative z-10">
        <div class="bg-white/95 backdrop-blur-xl rounded-[32px] p-6 shadow-2xl border border-white/20">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <div class="bg-white/80 backdrop-blur rounded-2xl shadow-md overflow-hidden border border-white/30">
                        <div class="p-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-sky-50">
                            <h3 class="text-lg font-semibold text-gray-900">Tahun</h3>
                        </div>
                        <nav class="p-0">
                            @forelse($years as $y)
                            <div class="border-b border-gray-100">
                                <a href="{{ route('dokumen', array_filter(['year' => $y, 'q' => $search])) }}" class="w-full flex items-center justify-between p-4 text-left hover:bg-blue-50 transition-colors">
                                    <span class="font-medium {{ (int)($activeYear ?? 0) === (int)$y ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }}">{{ $y }}</span>
                                </a>
                            </div>
                            @empty
                            <div class="p-4 text-gray-500">Belum ada tahun.</div>
                            @endforelse
                        </nav>
                    </div>
                </aside>

                <!-- Content Area -->
                <main class="lg:col-span-3">
                    <!-- Header dengan Search -->
                    <div class="bg-white/80 backdrop-blur rounded-2xl shadow-md p-6 mb-6 border border-white/30">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div>
                                <h2 class="text-2xl font-bold text-blue-700 mb-2">Dokumen</h2>
                            </div>
                            <form method="GET" action="{{ route('dokumen') }}" class="flex items-center gap-3">
                                <div class="relative">
                                    <input name="q" value="{{ $search }}" type="text" placeholder="Cari di sini" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 w-64 bg-white/80 backdrop-blur">
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                @if($activeYear)
                                    <input type="hidden" name="year" value="{{ $activeYear }}">
                                @endif
                                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors shadow-lg">
                                    Cari
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Document List -->
                    <div class="bg-white/80 backdrop-blur rounded-2xl shadow-md overflow-hidden border border-white/30">
                        @forelse($documents as $doc)
                        <div class="p-6 border-b border-gray-100 hover:bg-blue-50/50 transition-colors">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center border border-red-100 relative overflow-hidden">
                                    <svg class="w-8 h-8 text-red-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"/>
                                        <path d="M14 2v6h6"/>
                                        <path d="M12 18v-6"/>
                                        <path d="M9 15l3 3 3-3"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $doc->title }}</h3>
                                    @if($doc->description)
                                    <p class="text-gray-600 text-sm mb-3">{{ $doc->description }}</p>
                                    @endif
                                    <div class="flex items-center gap-4 text-sm text-gray-500">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            Tanggal Publikasi: {{ optional($doc->published_at)->locale('id')->translatedFormat('l, d/m/Y') ?? '-' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 flex items-center gap-3">
                                    <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank" rel="noopener" class="flex items-center gap-2 px-4 py-2 text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Lihat
                                    </a>
                                    <a href="{{ asset('storage/'.$doc->file_path) }}" download class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors shadow-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        Unduh
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="p-6 text-center text-gray-500">Tidak ada dokumen.</div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center mt-8">{{ $documents->links() }}</div>
                </main>
            </div>
        </div>
    </section>
</div>

<!-- Modal Backdrop -->
<div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop z-50 hidden">
    <!-- Modal Container -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <!-- Modal Content -->
        <div id="modalContent" class="bg-white rounded-2xl shadow-2xl modal max-w-2xl w-full mx-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"/>
                            <path d="M14 2v6h6"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Dokumen</h3>
                </div>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <div id="modalBody">
                    <!-- Content will be dynamically inserted here -->
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
                <button onclick="closeModal()" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    Tutup
                </button>
                <button id="downloadBtn" class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Unduh
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Modal data
const modalData = {
    'rkpd-2025': {
        title: 'Rencana Kerja Pemerintah Daerah (RKPD) Jabar Tahun 2025',
        description: 'Dokumen penjabaran dari RPJMD (Rencana Pembangunan Jangka Menengah Daerah) Provinsi Jawa Barat yang memuat rancangan kerangka ekonomi Daerah, prioritas pembangunan Daerah, serta rencana kerja dan pendanaan untuk jangka waktu 1 (satu) tahun yang disusun dengan berpedoman pada Rencana Kerja Pemerintah dan berpedoman pada Rencana Pembangunan Jangka Menengah Daerah.',
        date: 'Jumat, 05 Juli 2024'
    },
    'renstra-2024': {
        title: 'Renstra Dinas PUPR 2024-2025',
        description: 'Rencana Strategis Dinas Pekerjaan Umum dan Penataan Ruang untuk periode 2024-2025 yang memuat visi, misi, tujuan, sasaran, strategi, kebijakan, program dan kegiatan pembangunan daerah sesuai dengan tugas dan fungsinya yang disusun dengan berpedoman kepada RPJMD.',
        date: 'Senin, 15 April 2024'
    },
    'renja-2024': {
        title: 'Renja Dinas PUPR 2024',
        description: 'Rencana Kerja Tahunan Dinas Pekerjaan Umum dan Penataan Ruang untuk tahun 2024 yang memuat kebijakan, program, dan kegiatan pembangunan baik yang dilaksanakan langsung oleh pemerintah daerah maupun yang ditempuh dengan mendorong partisipasi masyarakat.',
        date: 'Rabu, 20 Maret 2024'
    }
};

function openModal(documentId) {
    const modal = document.getElementById('modalBackdrop');
    const modalContent = document.getElementById('modalContent');
    const modalBody = document.getElementById('modalBody');
    
    const data = modalData[documentId];
    
    if (data) {
        modalBody.innerHTML = `
            <h2 class="text-xl font-bold text-blue-600 mb-4">${data.title}</h2>
            
            <div class="mb-4">
                <div class="flex items-start gap-2 mb-2">
                    <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-1">Deskripsi Program</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">${data.description}</p>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="font-medium">Tanggal Publikasi</span>
                <span>${data.date}</span>
            </div>
        `;
        
        // Show modal with animation
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.add('show');
            modalContent.classList.add('show');
        }, 10);
    }
}

function closeModal() {
    const modal = document.getElementById('modalBackdrop');
    const modalContent = document.getElementById('modalContent');
    
    modal.classList.remove('show');
    modalContent.classList.remove('show');
    
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// Close modal when clicking backdrop
document.getElementById('modalBackdrop').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});

function toggleSection(sectionName) {
    const section = document.getElementById('section-' + sectionName);
    const icon = document.getElementById('icon-' + sectionName);
    
    if (section.classList.contains('hidden')) {
        section.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        section.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}
</script>
@endsection