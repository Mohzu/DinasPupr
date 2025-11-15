@extends('layouts.app')

@section('title', 'Pengaduan - Dinas PUPR Kabupaten Garut')
@section('description', 'Sampaikan pengaduan Anda melalui form berikut.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-amber-50 via-white to-yellow-50">
    <!-- Hero -->
    <section class="relative pt-28 pb-16 overflow-hidden">
        <div class="absolute -top-10 -right-10 w-80 h-80 bg-amber-200/50 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -left-12 w-96 h-96 bg-orange-200/40 rounded-full blur-3xl"></div>
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-50 text-amber-700 text-xs font-semibold border border-amber-100">Layanan Aspirasi</span>
                    <h1 class="mt-4 text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900">Form Pengaduan Masyarakat</h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-2xl">Sampaikan keluhan, laporan, atau masukan terkait layanan kami. Laporan Anda akan kami tindaklanjuti.</p>
                    <div class="mt-6 grid sm:grid-cols-3 gap-3">
                        <div class="p-4 rounded-2xl bg-white/70 backdrop-blur border border-amber-100">
                            <p class="text-xs text-gray-500">Langkah 1</p>
                            <p class="font-semibold text-gray-800">Isi Data Diri</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/70 backdrop-blur border border-amber-100">
                            <p class="text-xs text-gray-500">Langkah 2</p>
                            <p class="font-semibold text-gray-800">Jelaskan Pengaduan</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/70 backdrop-blur border border-amber-100">
                            <p class="text-xs text-gray-500">Langkah 3</p>
                            <p class="font-semibold text-gray-800">Kirim & Tunggu Tindak Lanjut</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="rounded-3xl border border-amber-100 bg-gradient-to-br from-white to-amber-50 p-6 shadow-xl">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="p-4 rounded-xl bg-white/70 backdrop-blur border border-amber-100 text-center">
                                <div class="w-10 h-10 rounded-xl bg-amber-500 text-white mx-auto grid place-items-center shadow">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <p class="mt-2 text-sm font-semibold text-gray-800">Mudah</p>
                            </div>
                            <div class="p-4 rounded-xl bg-white/70 backdrop-blur border border-amber-100 text-center">
                                <div class="w-10 h-10 rounded-xl bg-amber-500 text-white mx-auto grid place-items-center shadow">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01"/></svg>
                                </div>
                                <p class="mt-2 text-sm font-semibold text-gray-800">Jelas</p>
                            </div>
                            <div class="p-4 rounded-xl bg-white/70 backdrop-blur border border-amber-100 text-center">
                                <div class="w-10 h-10 rounded-xl bg-amber-500 text-white mx-auto grid place-items-center shadow">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/></svg>
                                </div>
                                <p class="mt-2 text-sm font-semibold text-gray-800">Responsif</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="pb-20">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="rounded-3xl border border-amber-100 bg-white/80 backdrop-blur p-6 md:p-8 shadow-xl">
                <!-- Alert untuk notifikasi -->
                <div id="alert-success" class="hidden mb-6 p-4 rounded-xl bg-green-50 border border-green-200">
                    <div class="flex items-center gap-3">
                        <div class="w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="text-green-800 font-medium">Pengaduan berhasil dikirim! Kami akan menindaklanjuti laporan Anda.</p>
                    </div>
                </div>

                <div id="alert-error" class="hidden mb-6 p-4 rounded-xl bg-red-50 border border-red-200">
                    <div class="flex items-center gap-3">
                        <div class="w-6 h-6 rounded-full bg-red-500 text-white flex items-center justify-center">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                        <p class="text-red-800 font-medium">Terjadi kesalahan saat mengirim pengaduan. Silakan coba lagi.</p>
                    </div>
                </div>

                <h2 class="text-xl font-extrabold text-gray-900">Form Pengaduan</h2>

                <form id="complaint-form" action="{{ route('pengaduan.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" placeholder="Nama Anda" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" placeholder="email@domain.com" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="tel" name="telepon" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" placeholder="08xxxxxxxxxx">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                        <input type="text" name="subjek" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" placeholder="Ringkasan pengaduan" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Isi Pengaduan</label>
                        <textarea name="pesan" rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" placeholder="Tulis pengaduan Anda secara detail" required></textarea>
                    </div>

                    <div class="md:col-span-2 flex items-center justify-end">
                        <button type="submit" id="submit-btn" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-amber-600 text-white font-semibold hover:bg-amber-700 active:scale-[.99] transition">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                            <span id="btn-text">Kirim Pengaduan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('complaint-form');
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
        fetch('{{ route('pengaduan.store') }}', {
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
                errorMessage.textContent = error.message || 'Terjadi kesalahan saat mengirim pengaduan. Silakan coba lagi.';
            }
            alertError.classList.remove('hidden');
            // Scroll ke alert
            alertError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        })
        .finally(() => {
            // Kembalikan tombol ke normal
            submitBtn.disabled = false;
            btnText.textContent = 'Kirim Pengaduan';
            submitBtn.classList.remove('opacity-75');
        });
    });
});
</script>
@endsection