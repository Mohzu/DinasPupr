@extends('layouts.app')

@section('title', 'Kontak - Dinas PUPR Kabupaten Garut')
@section('description', 'Hubungi Dinas PUPR Kabupaten Garut melalui informasi kontak dan form yang tersedia.')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="relative overflow-hidden mb-8 shadow-2xl h-[50vh] min-h-[350px] lg:h-[70vh] lg:min-h-[500px]">
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
                <div class="inline-flex items-center gap-2 bg-white bg-opacity-95 backdrop-blur-md rounded-full px-4 py-2 text-gray-800 text-sm font-semibold mb-4 sm:mb-6 border border-white border-opacity-50 shadow-lg">
                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                    </svg>
                    Hubungi Kami
                </div>

                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4 drop-shadow-[4px_4px_8px_rgba(0,0,0,0.9)]">
                    Kontak
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">Dinas PUPR</span>
                </h1>

                <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3 mb-2">
                    <p class="text-sm sm:text-base md:text-lg lg:text-xl text-white font-semibold max-w-3xl mx-auto drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                        Silakan hubungi kami untuk pertanyaan, kolaborasi, atau permohonan informasi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Wrapper (Overlaps Hero slightly) -->
    <section class="container mx-auto px-3 sm:px-6 pb-16 -mt-12 sm:-mt-16 relative z-10 max-w-6xl">
        <div class="bg-white/95 backdrop-blur-xl rounded-2xl sm:rounded-[32px] p-4 sm:p-8 shadow-2xl border border-white/20">
            
            <!-- Info Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <!-- Alamat -->
                <div class="p-4 sm:p-5 rounded-xl sm:rounded-2xl bg-slate-50 border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Alamat</p>
                            <p class="font-bold text-gray-800 text-sm mt-1 leading-relaxed">Jl. Raya Samarang No.117, Sukagalih, Kec. Tarogong Kidul, Kabupaten Garut, Jawa Barat 44151</p>
                        </div>
                    </div>
                </div>

                <!-- Telepon -->
                <div class="p-4 sm:p-5 rounded-xl sm:rounded-2xl bg-slate-50 border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Telepon</p>
                            <p class="font-bold text-gray-800 text-base mt-1">(0262) 233730</p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="p-4 sm:p-5 rounded-xl sm:rounded-2xl bg-slate-50 border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 00-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Email</p>
                            <p class="font-bold text-gray-800 text-sm mt-1 break-all">pupr@garutkab.go.id</p>
                        </div>
                    </div>
                </div>

                <!-- Jam Layanan -->
                <div class="p-4 sm:p-5 rounded-xl sm:rounded-2xl bg-slate-50 border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Jam Layanan</p>
                            <p class="font-bold text-gray-800 text-sm mt-1">Senin - Jumat<br>08.00 - 16.00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map + Form Grid -->
            <div class="grid lg:grid-cols-12 gap-8 items-start">
                
                <!-- Left Side: Map / Lokasi -->
                <div class="lg:col-span-5 h-full flex flex-col">
                    <h2 class="text-xl font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                        Lokasi Kantor
                    </h2>
                    <div class="rounded-2xl sm:rounded-3xl border border-gray-100 bg-white p-2 sm:p-3 shadow-md flex-1 min-h-[350px] flex flex-col">
                        <div class="rounded-xl sm:rounded-2xl overflow-hidden border border-blue-50 bg-slate-100 flex-1 min-h-[320px]">
                            @include('partials.contact-map')
                        </div>
                    </div>
                </div>

                <!-- Right Side: Contact Form -->
                <div class="lg:col-span-7">
                    <h2 class="text-xl font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                        Form Hubungi Kami
                    </h2>
                    <div class="rounded-2xl sm:rounded-3xl border border-gray-100 bg-slate-50/50 p-4 sm:p-8 shadow-sm">
                        <!-- Alerts -->
                        <div id="alert-success" class="hidden mb-6 p-4 rounded-xl bg-green-50 border border-green-200">
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <p class="text-green-800 font-medium text-sm">Pesan berhasil dikirim! Kami akan membalas melalui email.</p>
                            </div>
                        </div>

                        <div id="alert-error" class="hidden mb-6 p-4 rounded-xl bg-red-50 border border-red-200">
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-red-500 text-white flex items-center justify-center">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>
                                <p class="text-red-800 font-medium text-sm">Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.</p>
                            </div>
                        </div>

                        <form id="contact-form" action="{{ route('kontak.store') }}" method="POST" class="flex flex-col gap-5">
                            @csrf

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama</label>
                                    <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="Nama Anda" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                                    <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="email@domain.com" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nomor Telepon</label>
                                <input type="tel" name="nomor_telepon" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="08xxxxxxxxxx">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Subjek</label>
                                <input type="text" name="subjek" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="Topik pesan" required>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Pesan</label>
                                <textarea name="pesan" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="Tulis pesan Anda" required></textarea>
                            </div>

                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-2">
                                <p class="text-xs text-gray-500">Untuk laporan/aduan resmi, harap gunakan halaman Pengaduan.</p>
                                <button type="submit" id="submit-btn" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 active:scale-[.99] transition w-full sm:w-auto shadow-lg shadow-blue-500/20">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                    <span id="btn-text">Kirim Pesan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');
    const btnText = document.getElementById('btn-text');
    const alertSuccess = document.getElementById('alert-success');
    const alertError = document.getElementById('alert-error');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Ubah tombol menjadi loading
        submitBtn.disabled = true;
        btnText.textContent = 'Mengirim...';
        submitBtn.classList.add('opacity-75');
        
        // Sembunyikan alert sebelumnya
        alertSuccess.classList.add('hidden');
        alertError.classList.add('hidden');

        // Ambil data form
        const formData = new FormData(form);

        // Kirim ke controller Laravel dengan AJAX
        fetch('{{ route('kontak.store') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Tampilkan pesan sukses
                const successMessage = document.querySelector('#alert-success p');
                if (successMessage) {
                    successMessage.textContent = data.message;
                }
                alertSuccess.classList.remove('hidden');
                // Reset form
                form.reset();
                // Scroll ke alert
                alertSuccess.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        })
        .catch(error => {
            // Tampilkan pesan error
            const errorMessage = document.querySelector('#alert-error p');
            if (errorMessage) {
                errorMessage.textContent = error.message || 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.';
            }
            alertError.classList.remove('hidden');
            // Scroll ke alert
            alertError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        })
        .finally(() => {
            // Kembalikan tombol ke normal
            submitBtn.disabled = false;
            btnText.textContent = 'Kirim Pesan';
            submitBtn.classList.remove('opacity-75');
        });
    });
});
</script>
@endsection