@extends('layouts.app')

@section('title', 'Visi & Misi - Dinas PUPR Kabupaten Garut')
@section('description', 'Visi dan Misi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50">
  <!-- Hero Section (consistent with berita/pengumuman) -->
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
          Visi &
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">Misi</span>
        </h1>

        <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3 mb-2">
          <p class="text-lg md:text-xl text-white font-semibold max-w-3xl mx-auto drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
            Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut
          </p>
        </div>
      </div>
    </div>


  </section>

  <!-- Enhanced Main Content with 3D Effects -->
  <section class="container mx-auto px-6 pb-20 -mt-16 relative z-10">
    <!-- Main Card with Glass Effect -->
    <div class="bg-white/80 backdrop-blur-2xl rounded-[40px] p-8 md:p-12 shadow-2xl border border-white/40 hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-1">
      
      <!-- Section Header -->
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 mb-4">
          Komitmen Kami
        </h2>
        <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
        
        <!-- Enhanced Visi Card -->
        <div class="group relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-indigo-500/10 to-cyan-500/10 rounded-3xl transform rotate-1 group-hover:rotate-2 transition-transform duration-300"></div>
          <div class="relative p-8 rounded-3xl bg-white/90 backdrop-blur-xl shadow-xl border border-blue-100/50 h-full flex flex-col group-hover:shadow-2xl transition-all duration-300">
            <!-- Icon Header -->
            <div class="flex items-center gap-3 mb-6">
              <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
              </div>
              <h3 class="text-2xl md:text-3xl font-black text-blue-800">Visi</h3>
            </div>
            
            <!-- Content -->
            <div class="flex-1">
              <p class="text-gray-700 leading-relaxed text-lg font-medium">
                Terwujudnya Infrastruktur Pekerjaan Umum dan Penataan Ruang yang 
                <span class="font-bold text-blue-600">Berkualitas</span> 
                dalam Mendukung Kabupaten Garut 
                <span class="font-bold text-green-600">Bermartabat</span>, 
                <span class="font-bold text-purple-600">Nyaman</span> dan 
                <span class="font-bold text-orange-600">Sejahtera</span>
              </p>
            </div>
            
            <!-- Decorative Element -->
            <div class="absolute top-4 right-4 w-16 h-16 bg-gradient-to-r from-blue-200/40 to-indigo-200/40 rounded-full blur-xl group-hover:blur-2xl transition-all duration-300"></div>
          </div>
        </div>

        <!-- Enhanced Logo Section -->
        <div class="flex items-center justify-center h-full">
          <div class="relative group">
            <!-- Glow Effects -->
            <div class="absolute -inset-8 rounded-full bg-gradient-to-r from-blue-400/30 via-indigo-400/30 to-purple-400/30 blur-2xl group-hover:blur-3xl transition-all duration-500"></div>
            <div class="absolute -inset-4 rounded-full bg-gradient-to-r from-cyan-300/20 to-blue-300/20 blur-xl animate-pulse"></div>
            
            <!-- Main Logo Container -->
            <div class="relative h-48 w-48 rounded-3xl bg-white/95 backdrop-blur-xl border-2 border-white/50 shadow-2xl grid place-content-center overflow-hidden group-hover:scale-105 transition-all duration-500">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-indigo-50/50"></div>
              <img src="{{ asset('img/logoPU.png') }}" alt="Logo Dinas PUPR Garut" class="relative z-10 h-32 w-32 object-contain drop-shadow-lg" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
              <div class="relative z-10 text-center" style="display:none;">
                <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">PUPR</div>
                <div class="text-sm text-gray-600 font-semibold">GARUT</div>
              </div>
            </div>
            
            <!-- Rotating Ring -->
            <div class="absolute inset-4 rounded-full border-2 border-gradient-to-r from-blue-300/40 to-purple-300/40 animate-spin-slow opacity-30"></div>
          </div>
        </div>

        <!-- Enhanced Misi Card -->
        <div class="group relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 via-indigo-500/10 to-blue-500/10 rounded-3xl transform -rotate-1 group-hover:-rotate-2 transition-transform duration-300"></div>
          <div class="relative p-8 rounded-3xl bg-white/90 backdrop-blur-xl shadow-xl border border-purple-100/50 h-full flex flex-col group-hover:shadow-2xl transition-all duration-300">
            <!-- Icon Header -->
            <div class="flex items-center gap-3 mb-6">
              <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
              </div>
              <h3 class="text-2xl md:text-3xl font-black text-purple-800">Misi</h3>
            </div>
            
            <!-- Content -->
            <div class="flex-1">
              <ol class="space-y-4">
                @php $missions = [
                  [
                    'text' => 'Meningkatkan kualitas aparatur sipil negara yang profesional dan beretika.',
                    'color' => 'from-blue-500 to-cyan-500'
                  ],
                  [
                    'text' => 'Meningkatkan tata kelola organisasi dalam perencanaan, pelaksanaan dan pengawasan yang terpadu dan tepat sasaran.',
                    'color' => 'from-green-500 to-emerald-500'
                  ],
                  [
                    'text' => 'Mewujudkan infrastruktur jalan, permukiman, sumber daya air, bangunan, yang berkualitas dan memadai dengan berbasis penataan ruang.',
                    'color' => 'from-purple-500 to-indigo-500'
                  ],
                  [
                    'text' => 'Meningkatkan kualitas dan kuantitas sarana penunjang sumber daya manusia dan infrastruktur.',
                    'color' => 'from-orange-500 to-red-500'
                  ]
                ]; @endphp
                
                @foreach ($missions as $index => $mission)
                  <li class="flex items-start gap-4 group/item hover:transform hover:translate-x-1 transition-all duration-300">
                    <div class="relative mt-1">
                      <div class="w-8 h-8 bg-gradient-to-r {{ $mission['color'] }} rounded-xl flex items-center justify-center text-white font-bold shadow-lg group-hover/item:shadow-xl transition-all duration-300">
                        {{ $index + 1 }}
                      </div>
                      <div class="absolute inset-0 bg-gradient-to-r {{ $mission['color'] }} rounded-xl blur-md opacity-30 group-hover/item:opacity-50 transition-opacity duration-300"></div>
                    </div>
                    <p class="text-gray-700 font-medium flex-1 leading-relaxed group-hover/item:text-gray-800 transition-colors duration-300">
                      {{ $mission['text'] }}
                    </p>
                  </li>
                @endforeach
              </ol>
            </div>
            
            <!-- Decorative Element -->
            <div class="absolute top-4 right-4 w-16 h-16 bg-gradient-to-r from-purple-200/40 to-indigo-200/40 rounded-full blur-xl group-hover:blur-2xl transition-all duration-300"></div>
          </div>
        </div>
      </div>

      <!-- Bottom Decorative Element -->
      <div class="mt-12 flex justify-center">
        <div class="w-32 h-1 bg-gradient-to-r from-transparent via-blue-400 to-transparent rounded-full"></div>
      </div>
    </div>
  </section>
</div>

<style>
@keyframes fade-in-up {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes spin-slow {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

.animate-fade-in-up {
  animation: fade-in-up 0.8s ease-out forwards;
}

.animation-delay-300 {
  animation-delay: 0.3s;
}

.animation-delay-600 {
  animation-delay: 0.6s;
}

.animate-spin-slow {
  animation: spin-slow 20s linear infinite;
}

.shadow-3xl {
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.1);
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .grid-cols-1.lg\\:grid-cols-3 {
    gap: 1.5rem;
  }
  
  .h-48.w-48 {
    height: 10rem;
    width: 10rem;
  }
  
  .h-32.w-32 {
    height: 6rem;
    width: 6rem;
  }
}
</style>
@endsection