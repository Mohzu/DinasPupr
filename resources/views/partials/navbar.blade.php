<header class="fixed w-full top-0 z-50 bg-white/95 backdrop-blur-sm shadow-lg border-b border-gray-100">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 lg:py-5">
            <div class="flex justify-between items-center">
                <!-- Logo dan Nama Instansi -->
                <div class="flex items-center space-x-3 lg:space-x-5">
                    <div class="relative flex-shrink-0">
                        <!-- Ganti dengan logo Anda -->
                        <div class="h-10 w-10 lg:h-12 lg:w-12 rounded-lg shadow-md bg-white border border-gray-200 flex items-center justify-center overflow-hidden">
                            <img 
                                src="{{ asset('img/logoPU.png') }}" 
                                alt="Logo Dinas PU" 
                                class="h-8 w-8 lg:h-10 lg:w-10 object-contain"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                            <!-- Fallback jika logo tidak ditemukan -->
                            <span class="text-blue-600 font-bold text-sm lg:text-base hidden">PU</span>
                        </div>
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg blur opacity-20"></div>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <h1 class="text-sm sm:text-base lg:text-xl font-bold text-gray-800 leading-tight tracking-tight truncate">
                            Dinas Pekerjaan Umum dan Penataan Ruang
                        </h1>
                        <p class="text-xs lg:text-sm text-gray-700 font-medium mt-0.5 lg:mt-1">Kabupaten Garut</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <ul class="hidden lg:flex items-center space-x-10 text-sm font-semibold text-gray-700">
                    <li>
                        <a href="#" 
                           class="relative py-2 px-1 hover:text-blue-600 transition-all duration-300 group">
                            Beranda
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-700 group-hover:w-full group-hover:left-0 transition-all duration-300 rounded-full"></span>
                        </a>
                    </li>

                    <!-- Dropdown Profil -->
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" 
                                class="relative py-2 px-1 hover:text-blue-600 focus:outline-none flex items-center space-x-1 transition-all duration-300 group"
                                :class="{ 'text-blue-600': open }">
                            <span>Profil</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-700 group-hover:w-full group-hover:left-0 transition-all duration-300 rounded-full" :class="{ 'w-full left-0': open }"></span>
                        </button>
                        
                        <ul x-show="open" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            @click.away="open = false" 
                            class="absolute top-full left-1/2 transform -translate-x-1/2 mt-3 bg-white shadow-xl rounded-xl w-56 py-3 border border-gray-100 backdrop-blur-sm">
                            <li>
                                <a href="#" class="block px-5 py-3 text-gray-700 hover:text-blue-600 font-medium transition-all duration-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:translate-x-1">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        <span>Sejarah</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-5 py-3 text-gray-700 hover:text-blue-600 font-medium transition-all duration-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:translate-x-1">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        <span>Struktur Organisasi</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-5 py-3 text-gray-700 hover:text-blue-600 font-medium transition-all duration-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:translate-x-1">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        <span>Visi & Misi</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Dropdown Berita -->
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" 
                                class="relative py-2 px-1 hover:text-blue-600 focus:outline-none flex items-center space-x-1 transition-all duration-300 group"
                                :class="{ 'text-blue-600': open }">
                            <span>Berita</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-700 group-hover:w-full group-hover:left-0 transition-all duration-300 rounded-full" :class="{ 'w-full left-0': open }"></span>
                        </button>
                        
                        <ul x-show="open" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            @click.away="open = false" 
                            class="absolute top-full left-1/2 transform -translate-x-1/2 mt-3 bg-white shadow-xl rounded-xl w-56 py-3 border border-gray-100 backdrop-blur-sm">
                            <li>
                                <a href="{{ route('berita') }}" class="block px-5 py-3 text-gray-700 hover:text-blue-600 font-medium transition-all duration-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:translate-x-1">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        <span>Berita Terkini</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-5 py-3 text-gray-700 hover:text-blue-600 font-medium transition-all duration-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:translate-x-1">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        <span>Pengumuman</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Dropdown Layanan -->
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" 
                                class="relative py-2 px-1 hover:text-blue-600 focus:outline-none flex items-center space-x-1 transition-all duration-300 group"
                                :class="{ 'text-blue-600': open }">
                            <span>Layanan</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                            <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-700 group-hover:w-full group-hover:left-0 transition-all duration-300 rounded-full" :class="{ 'w-full left-0': open }"></span>
                        </button>
                        
                        <ul x-show="open" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            @click.away="open = false" 
                            class="absolute top-full left-1/2 transform -translate-x-1/2 mt-3 bg-white shadow-xl rounded-xl w-56 py-3 border border-gray-100 backdrop-blur-sm">
                            <li>
                                <a href="#" class="block px-5 py-3 text-gray-700 hover:text-blue-600 font-medium transition-all duration-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:translate-x-1">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        <span>Pengaduan</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-5 py-3 text-gray-700 hover:text-blue-600 font-medium transition-all duration-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:translate-x-1">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        <span>Kontak</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden" x-data="{ mobileMenuOpen: false }">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition-all duration-200">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" :class="{ 'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-6 w-6" :class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Mobile Menu -->
                    <div x-show="mobileMenuOpen" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         @click.away="mobileMenuOpen = false"
                         class="absolute top-full right-0 mt-2 w-80 bg-white rounded-xl shadow-2xl py-4 border border-gray-100 backdrop-blur-sm">
                        
                        <!-- Mobile Beranda -->
                        <a href="#" class="block px-6 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                            Beranda
                        </a>

                        <!-- Mobile Profil -->
                        <div x-data="{ profilOpen: false }">
                            <button @click="profilOpen = !profilOpen" 
                                    class="w-full flex justify-between items-center px-6 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                                <span>Profil</span>
                                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': profilOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="profilOpen" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 max-h-0"
                                 x-transition:enter-end="opacity-100 max-h-40"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 max-h-40"
                                 x-transition:leave-end="opacity-0 max-h-0"
                                 class="bg-gray-50 overflow-hidden">
                                <a href="#" class="block px-10 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Sejarah</a>
                                <a href="#" class="block px-10 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Struktur Organisasi</a>
                                <a href="#" class="block px-10 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Visi & Misi</a>
                            </div>
                        </div>

                        <!-- Mobile Berita -->
                        <div x-data="{ beritaOpen: false }">
                            <button @click="beritaOpen = !beritaOpen" 
                                    class="w-full flex justify-between items-center px-6 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                                <span>Berita</span>
                                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': beritaOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="beritaOpen" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 max-h-0"
                                 x-transition:enter-end="opacity-100 max-h-40"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 max-h-40"
                                 x-transition:leave-end="opacity-0 max-h-0"
                                 class="bg-gray-50 overflow-hidden">
                                <a href="#" class="block px-10 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Berita Terkini</a>
                                <a href="#" class="block px-10 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Pengumuman</a>
                            </div>
                        </div>

                        <!-- Mobile Layanan -->
                        <div x-data="{ layananOpen: false }">
                            <button @click="layananOpen = !layananOpen" 
                                    class="w-full flex justify-between items-center px-6 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-medium transition-all duration-200">
                                <span>Layanan</span>
                                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': layananOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="layananOpen" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 max-h-0"
                                 x-transition:enter-end="opacity-100 max-h-40"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 max-h-40"
                                 x-transition:leave-end="opacity-0 max-h-0"
                                 class="bg-gray-50 overflow-hidden">
                                <a href="#" class="block px-10 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Pengaduan</a>
                                <a href="#" class="block px-10 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Kontak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>