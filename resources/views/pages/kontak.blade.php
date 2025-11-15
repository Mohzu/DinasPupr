@extends('layouts.app')

@section('title', 'Kontak - Dinas PUPR Kabupaten Garut')
@section('description', 'Hubungi Dinas PUPR Kabupaten Garut melalui informasi kontak dan form yang tersedia.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50">
    <!-- Hero -->
    <section class="relative pt-28 pb-16 overflow-hidden">
        <div class="absolute -top-12 -right-12 w-72 h-72 bg-blue-200/40 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -left-12 w-96 h-96 bg-indigo-200/40 rounded-full blur-3xl"></div>
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold border border-blue-100">Hubungi Kami</span>
                    <h1 class="mt-4 text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900">Kontak Dinas PUPR Kabupaten Garut</h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-2xl">Silakan gunakan informasi atau form di bawah untuk pertanyaan, kolaborasi, atau permohonan informasi layanan kami.</p>
                </div>
                <div class="relative">
                    <div class="rounded-3xl border border-blue-100 bg-gradient-to-br from-white to-blue-50 p-6 shadow-xl">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="p-5 rounded-2xl bg-white/60 backdrop-blur border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12m0 0L8.343 6.929M13.414 12l4.243-4.243M13.414 12l-4.243 4.243"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Alamat</p>
                                        <p class="font-semibold text-gray-800">Jl. Raya Samarang No.117, Sukagalih, Kec. Tarogong Kidul, Kabupaten Garut, Jawa Barat 44151</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 rounded-2xl bg-white/60 backdrop-blur border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59a2 2 0 001.8 1.16H17a2 2 0 002-2V7a2 2 0 00-2-2H3z"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Telepon</p>
                                        <p class="font-semibold text-gray-800">(0262) 233730</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 rounded-2xl bg-white/60 backdrop-blur border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0H5m3 0h8m0 0h3M4 6h16M4 18h16"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Email</p>
                                        <p class="font-semibold text-gray-800">pupr@garutkab.go.id</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 rounded-2xl bg-white/60 backdrop-blur border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Jam Layanan</p>
                                        <p class="font-semibold text-gray-800">Senin - Jumat, 08.00 - 16.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Form + Peta -->
    <section class="pb-20">
        <div class="container mx-auto px-6 grid lg:grid-cols-3 gap-8">
            <!-- Peta / Lokasi -->
            <div id="lokasi" class="lg:col-span-1">
                <div class="h-full rounded-3xl border border-gray-100 bg-white p-4 shadow-sm">
                    <div class="h-72 rounded-2xl overflow-hidden border border-blue-100 bg-white">
                        @include('partials.contact-map')
                    </div>
                </div>
            </div>

            <!-- Form Kontak -->
            <div class="lg:col-span-2">
                <div class="rounded-3xl border border-gray-100 bg-white/80 backdrop-blur p-6 md:p-8 shadow-xl">
                    <!-- Alert untuk notifikasi -->
                    <div id="alert-success" class="hidden mb-6 p-4 rounded-xl bg-green-50 border border-green-200">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <p class="text-green-800 font-medium">Pesan berhasil dikirim! Kami akan membalas melalui email.</p>
                        </div>
                    </div>

                    <div id="alert-error" class="hidden mb-6 p-4 rounded-xl bg-red-50 border border-red-200">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-red-500 text-white flex items-center justify-center">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>
                            <p class="text-red-800 font-medium">Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.</p>
                        </div>
                    </div>

                    <h2 class="text-xl font-extrabold text-gray-900">Form Kontak</h2>
                    <p class="text-gray-500 mb-6">Kirim pertanyaan atau pesan umum Anda. Kami akan membalas melalui email.</p>
                    
                    <form id="contact-form" action="{{ route('kontak.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Nama Anda" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="email@domain.com" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <input type="tel" name="nomor_telepon" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="08xxxxxxxxxx">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                            <input type="text" name="subjek" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Topik pesan" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea name="pesan" rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis pesan Anda" required></textarea>
                        </div>
                        <div class="md:col-span-2 flex items-center justify-between">
                            <p class="text-xs text-gray-500">Untuk laporan/aduan menggunakan halaman Pengaduan.</p>
                            <button type="submit" id="submit-btn" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 active:scale-[.99] transition">
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