<!-- Sidebar -->
<aside class="fixed left-0 top-0 z-40 h-screen w-72 bg-white shadow-2xl border-r border-gray-100 transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0" 
       x-data="{ open: $store.sidebar.open }"
       x-show="open || window.innerWidth >= 1024"
       :class="{ 'translate-x-0': open || window.innerWidth >= 1024, '-translate-x-full': !open && window.innerWidth < 1024 }"
       @click.away="if (window.innerWidth < 1024) { open = false; $store.sidebar.open = false; }"
       x-effect="open = $store.sidebar.open"
       x-init="
           window.addEventListener('resize', () => {
               if (window.innerWidth >= 1024) {
                   open = true;
                   $store.sidebar.open = true;
               }
           });
       ">
    
    <!-- Logo & Brand -->
    <div class="flex items-center justify-between h-20 px-6 border-b border-gray-100 bg-gradient-to-r from-blue-600 to-blue-700">
        <div class="flex items-center space-x-3">
            <div class="h-12 w-12 rounded-xl shadow-lg bg-white flex items-center justify-center overflow-hidden ring-2 ring-white/20">
                <img src="{{ asset('img/logoPU.png') }}" alt="Logo PUPR" class="h-10 w-10 object-contain">
            </div>
            <div class="flex flex-col">
                <h1 class="text-base font-bold text-white leading-tight">Admin Panel</h1>
                <p class="text-xs text-blue-100">PUPR Garut</p>
            </div>
        </div>
        <button @click="open = false; $store.sidebar.open = false" class="lg:hidden text-white hover:text-blue-100 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="px-3 py-4 space-y-1 overflow-y-auto h-[calc(100vh-5rem)] custom-scrollbar">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" 
           class="group flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:text-blue-700 transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-500/30' : '' }}">
            <div class="flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
            <span class="font-medium">Dashboard</span>
        </a>

        <!-- Konten -->
        <div class="pt-6">
            <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Konten</p>
            
            <a href="{{ route('admin.berita.index') }}" 
               class="group flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:text-blue-700 transition-all duration-200 {{ request()->routeIs('admin.berita.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-500/30' : '' }}">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <span class="font-medium">Berita</span>
            </a>

            <a href="{{ route('admin.pengumuman.index') }}" 
               class="group flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 transition-all duration-200 {{ request()->routeIs('admin.pengumuman.*') ? 'bg-gradient-to-r from-green-600 to-emerald-600 text-white shadow-lg shadow-green-500/30' : '' }}">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                    </svg>
                </div>
                <span class="font-medium">Pengumuman</span>
            </a>

            <a href="{{ route('admin.dokumen.index') }}" 
               class="group flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-violet-50 hover:text-purple-700 transition-all duration-200 {{ request()->routeIs('admin.dokumen.*') ? 'bg-gradient-to-r from-purple-600 to-violet-600 text-white shadow-lg shadow-purple-500/30' : '' }}">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <span class="font-medium">Dokumen</span>
            </a>
        </div>

        <!-- Profil -->
        <div class="pt-6">
            <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Profil</p>
            
            <a href="{{ route('admin.sejarah.index') }}" 
               class="group flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-blue-50 hover:text-indigo-700 transition-all duration-200 {{ request()->routeIs('admin.sejarah.*') ? 'bg-gradient-to-r from-indigo-600 to-blue-600 text-white shadow-lg shadow-indigo-500/30' : '' }}">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="font-medium">Sejarah</span>
            </a>

            <a href="{{ route('admin.visimisi.index') }}" 
               class="group flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-teal-50 hover:to-cyan-50 hover:text-teal-700 transition-all duration-200 {{ request()->routeIs('admin.visimisi.*') ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white shadow-lg shadow-teal-500/30' : '' }}">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="font-medium">Visi & Misi</span>
            </a>

            <a href="{{ route('admin.struktur.index') }}" 
               class="group flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-rose-50 hover:to-pink-50 hover:text-rose-700 transition-all duration-200 {{ request()->routeIs('admin.struktur.*') ? 'bg-gradient-to-r from-rose-600 to-pink-600 text-white shadow-lg shadow-rose-500/30' : '' }}">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <span class="font-medium">Struktur Organisasi</span>
            </a>

            <a href="{{ route('admin.pejabat.index') }}" 
               class="group flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-cyan-50 hover:to-sky-50 hover:text-cyan-700 transition-all duration-200 {{ request()->routeIs('admin.pejabat.*') ? 'bg-gradient-to-r from-cyan-600 to-sky-600 text-white shadow-lg shadow-cyan-500/30' : '' }}">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <span class="font-medium">Pejabat Struktural</span>
            </a>
        </div>

        <!-- Layanan -->
        <div class="pt-6">
            <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Layanan</p>
            
            <a href="{{ route('admin.pengaduan.index') }}" 
               class="group flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-amber-50 hover:to-orange-50 hover:text-amber-700 transition-all duration-200 {{ request()->routeIs('admin.pengaduan.*') ? 'bg-gradient-to-r from-amber-600 to-orange-600 text-white shadow-lg shadow-amber-500/30' : '' }}">
                <div class="flex-shrink-0 relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <span class="font-medium flex-1">Pengaduan</span>
                @php
                    $pengaduanBaru = \App\Models\Pengaduan::where('status', 'baru')->count();
                @endphp
                @if($pengaduanBaru > 0)
                    <span class="px-2.5 py-1 text-xs font-bold bg-amber-500 text-white rounded-full shadow-sm">{{ $pengaduanBaru }}</span>
                @endif
            </a>

            <a href="{{ route('admin.kontak.index') }}" 
               class="group flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:text-blue-700 transition-all duration-200 {{ request()->routeIs('admin.kontak.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-500/30' : '' }}">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="font-medium flex-1">Kontak</span>
                @php
                    $kontakBaru = \App\Models\Kontak::where('status', 'baru')->count();
                @endphp
                @if($kontakBaru > 0)
                    <span class="px-2.5 py-1 text-xs font-bold bg-blue-500 text-white rounded-full shadow-sm">{{ $kontakBaru }}</span>
                @endif
            </a>
        </div>
    </nav>
</aside>

