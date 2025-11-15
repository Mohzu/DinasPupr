<!-- Top Navigation Bar -->
<nav class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-30 backdrop-blur-md bg-white/95">
    <div class="px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center justify-between">
            <!-- Mobile Menu Button -->
            <button @click="$store.sidebar.open = !$store.sidebar.open" class="lg:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Page Title -->
            <div class="flex-1 lg:flex-none ml-4 lg:ml-0">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                <p class="text-xs sm:text-sm text-gray-500 mt-0.5">@yield('page-description', 'Selamat datang di Admin Panel')</p>
            </div>

            <!-- Right Side -->
            <div class="flex items-center gap-3">
                <!-- User Info -->
                <div class="flex items-center gap-3">
                    <div class="text-right hidden lg:block">
                        <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-600 via-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold shadow-lg ring-2 ring-blue-100">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 font-medium transition-all duration-200 flex items-center gap-2 shadow-sm hover:shadow">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span class="hidden sm:inline text-sm">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

