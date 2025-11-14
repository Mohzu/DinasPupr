<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #3B82F6, #1E40AF, #1E3A8A);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .social-hover:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
        
        .link-hover:hover {
            color: #3B82F6;
            padding-left: 8px;
        }
        
        .bg-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(59, 130, 246, 0.1) 2px, transparent 2px),
                radial-gradient(circle at 75% 75%, rgba(30, 64, 175, 0.1) 2px, transparent 2px);
            background-size: 60px 60px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Footer Section -->
    <footer class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-pattern opacity-30"></div>
        
        <!-- Decorative Wave -->
        <div class="absolute top-0 left-0 right-0">
            <svg class="w-full h-20 text-white fill-current transform rotate-180" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,60 C200,20 400,0 600,30 C800,60 1000,20 1200,40 L1200,120 L0,120 Z"></path>
            </svg>
        </div>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

        <!-- Main Footer Content -->
        <div class="relative z-10 pt-16 sm:pt-24 pb-8 sm:pb-12">
            <div class="container mx-auto px-4 sm:px-6">
                <!-- Top Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 sm:gap-12 mb-12 sm:mb-16">
                    <!-- Organization Info -->
                    <div class="lg:col-span-5 space-y-4 sm:space-y-6 fade-in-up">
                        <div class="flex items-start space-x-3 sm:space-x-4">
                            <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-2xl overflow-hidden flex items-center justify-center float-animation flex-shrink-0">
                                <img src="{{ asset('img/logoPU.png') }}" alt="Logo Dinas PUPR" class="object-contain w-full h-full">
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-bold gradient-text mb-2">
                                    Dinas PUPR Kabupaten Garut
                                </h3>
                                <p class="text-sm sm:text-base text-blue-100 font-medium">
                                    Dinas Pekerjaan Umum dan Penataan Ruang
                                </p>
                            </div>
                        </div>
                        
                        <p class="text-sm sm:text-base text-gray-300 leading-relaxed max-w-md">
                            Terwujudnya Infrastruktur Pekerjaan Umum dan Penataan Ruang yang Berkualitas dalam MendukungKabupaten Garut Bermartabat, Nyaman dan Sejahtera
                        </p>

                        <!-- Contact Info -->
                        <div class="space-y-2 sm:space-y-3">
                            <div class="flex items-start space-x-2 sm:space-x-3 text-gray-300">
                                <div class="w-4 h-4 sm:w-5 sm:h-5 text-blue-400 flex-shrink-0 mt-1">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm">Jl. Raya Samarang No.117, Sukagalih, Kec. Tarogong Kidul, Kabupaten Garut, Jawa Barat 44151</span>
                            </div>
                            
                            <div class="flex items-center space-x-2 sm:space-x-3 text-gray-300">
                                <div class="w-4 h-4 sm:w-5 sm:h-5 text-blue-400 flex-shrink-0">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm">(0262) 233730</span>
                            </div>
                            
                            <div class="flex items-center space-x-2 sm:space-x-3 text-gray-300">
                                <div class="w-4 h-4 sm:w-5 sm:h-5 text-blue-400 flex-shrink-0">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm break-all">pupr@garutkab.go.id</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="md:col-span-1 lg:col-span-2 fade-in-up" style="animation-delay: 0.2s;">
                        <h4 class="text-lg sm:text-xl font-bold text-white mb-4 sm:mb-6">Layanan</h4>
                        <ul class="space-y-2 sm:space-y-3">
                            <li><a href="{{ route('pengaduan') }}" class="text-gray-300 link-hover transition-all duration-300">Pengaduan</a></li>
                            <li><a href="{{ route('kontak') }}" class="text-gray-300 link-hover transition-all duration-300">Kontak</a></li>
                        </ul>
                    </div>

                    <!-- Information Links -->
                    <div class="md:col-span-1 lg:col-span-2 fade-in-up" style="animation-delay: 0.4s;">
                        <h4 class="text-lg sm:text-xl font-bold text-white mb-4 sm:mb-6">Informasi</h4>
                        <ul class="space-y-2 sm:space-y-3">
                            <li><a href="{{ route('sejarah') }}" class="text-gray-300 link-hover transition-all duration-300">Sejarah</a></li>
                            <li><a href="{{ route('strukturorganisasi') }}" class="text-gray-300 link-hover transition-all duration-300">Struktur Organisasi</a></li>
                            <li><a href="{{ route('visimisi') }}" class="text-gray-300 link-hover transition-all duration-300">Visi Misi</a></li>
                            <li><a href="{{ route('berita') }}" class="text-gray-300 link-hover transition-all duration-300">Berita Terkini</a></li>
                            <li><a href="{{ route('pengumuman') }}" class="text-gray-300 link-hover transition-all duration-300">Pengumuman</a></li>
                        </ul>
                    </div>

                    <!-- Social Media & Apps -->
                    <div class="md:col-span-2 lg:col-span-3 fade-in-up" style="animation-delay: 0.6s;">
                        <h4 class="text-lg sm:text-xl font-bold text-white mb-4 sm:mb-6">Hubungi Kami</h4>
                        
                        <!-- Social Media Icons -->
                    <div class="flex space-x-3 sm:space-x-4 mb-6 sm:mb-8">
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/puprgarutkab.official/" class="w-12 h-12 bg-gradient-to-br from-pink-500 to-purple-600 rounded-xl flex items-center justify-center social-hover transition-all duration-300" aria-label="Instagram">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7.75 2C5.4 2 3.5 3.9 3.5 6.25v11.5C3.5 20.1 5.4 22 7.75 22h8.5c2.35 0 4.25-1.9 4.25-4.25V6.25C20.5 3.9 18.6 2 16.25 2h-8.5zM12 8.25a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5zm5.25-.75a.75.75 0 1 1 0 1.5.75.75 0 0 1 0-1.5zM12 9.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5z"/>
                            </svg>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/company/dinas-pekerjaan-umum-dan-penataan-ruang-kabupaten-garut/?originalSubdomain=id" class="w-12 h-12 bg-gradient-to-br from-blue-700 to-blue-800 rounded-xl flex items-center justify-center social-hover transition-all duration-300" aria-label="LinkedIn">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.94 6.5a1.44 1.44 0 1 1 0-2.88 1.44 1.44 0 0 1 0 2.88zM4.9 8.34h4.1V20H4.9V8.34zM13.05 8.34h-3.85V20h4.1v-5.56c0-2.05 2.64-2.23 2.64 0V20h4.05v-6.61c0-4.13-4.63-3.97-6.94-1.94v-3.1z"/>
                            </svg>
                        </a>
                    </div>

                        <!-- Newsletter Signup -->
                        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-4 sm:p-6 border border-white/20">
                            <h5 class="text-base sm:text-lg font-semibold text-white mb-2 sm:mb-3">Newsletter</h5>
                            <p class="text-xs sm:text-sm text-gray-300 mb-3 sm:mb-4">Dapatkan update terbaru dari kami</p>
                            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                                <input type="email" placeholder="Email Anda" class="flex-1 px-3 sm:px-4 py-2 text-sm sm:text-base rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 text-sm sm:text-base">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-white/20 my-8"></div>

                <!-- Bottom Section -->
                <div class="flex flex-col lg:flex-row justify-between items-center space-y-3 sm:space-y-4 lg:space-y-0">
                    <div class="flex flex-col lg:flex-row items-center space-y-2 lg:space-y-0 lg:space-x-6 text-center lg:text-left">
                        <p class="text-gray-300 text-xs sm:text-sm">
                            © 2025 Dinas PUPR Kabupaten Garut. Hak Cipta Dilindungi.
                        </p>
                        <div class="flex flex-wrap justify-center lg:justify-start space-x-3 sm:space-x-4 text-xs sm:text-sm text-gray-400">
                            <a href="#" class="hover:text-white transition-colors duration-300">Kebijakan Privasi</a>
                            <span>•</span>
                            <a href="#" class="hover:text-white transition-colors duration-300">Syarat & Ketentuan</a>
                            <span>•</span>
                            <a href="#" class="hover:text-white transition-colors duration-300">Sitemap</a>
                        </div>
                    </div>
                    
                    <!-- Government Badge -->
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center">
                            <div class="w-3 h-3 bg-white rounded-full"></div>
                        </div>
                        <span class="text-sm text-gray-300">Website Resmi Pemerintah</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-20 right-10 w-20 h-20 bg-gradient-to-br from-blue-500/20 to-indigo-600/20 rounded-full blur-xl float-animation" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-40 left-20 w-16 h-16 bg-gradient-to-br from-yellow-400/20 to-orange-500/20 rounded-full blur-xl float-animation" style="animation-delay: 4s;"></div>
    </footer>
</body>
</html>