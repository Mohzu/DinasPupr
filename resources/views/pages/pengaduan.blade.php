@extends('layouts.app')

@section('title', 'Pengaduan - Dinas PUPR Kabupaten Garut')
@section('description', 'Sampaikan aspirasi dan pengaduan Anda secara online.')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="relative overflow-hidden mb-8 shadow-2xl h-[70vh] min-h-[500px]">
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
                    <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                    </svg>
                    Aspirasi & Pengaduan
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4 drop-shadow-[4px_4px_8px_rgba(0,0,0,0.9)]">
                    Pengaduan
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-300 drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">Masyarakat</span>
                </h1>

                <div class="inline-block bg-black/30 backdrop-blur-sm rounded-2xl px-6 py-3 mb-2">
                    <p class="text-lg md:text-xl text-white font-semibold max-w-3xl mx-auto drop-shadow-[2px_2px_4px_rgba(0,0,0,0.8)]">
                        Layanan aspirasi dan pengaduan online untuk peningkatan pelayanan infrastruktur Kabupaten Garut.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content (Overlaps Hero) -->
    <section class="container mx-auto px-4 sm:px-6 pb-16 -mt-16 relative z-10 max-w-4xl">
        <div class="bg-white/95 backdrop-blur-xl rounded-[32px] p-6 sm:p-8 shadow-2xl border border-white/20">
            
            <!-- Steps Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="p-4 rounded-2xl bg-amber-50/50 border border-amber-100/50 text-center">
                    <span class="w-8 h-8 rounded-full bg-amber-500 text-white flex items-center justify-center font-bold text-sm mx-auto mb-2 shadow-sm">1</span>
                    <h3 class="font-bold text-gray-800 text-sm">Isi Data Diri</h3>
                    <p class="text-xs text-gray-500 mt-1">Lengkapi nama, email, dan telepon</p>
                </div>
                <div class="p-4 rounded-2xl bg-amber-50/50 border border-amber-100/50 text-center">
                    <span class="w-8 h-8 rounded-full bg-amber-500 text-white flex items-center justify-center font-bold text-sm mx-auto mb-2 shadow-sm">2</span>
                    <h3 class="font-bold text-gray-800 text-sm">Jelaskan Laporan</h3>
                    <p class="text-xs text-gray-500 mt-1">Tuliskan laporan secara mendalam</p>
                </div>
                <div class="p-4 rounded-2xl bg-amber-50/50 border border-amber-100/50 text-center">
                    <span class="w-8 h-8 rounded-full bg-amber-500 text-white flex items-center justify-center font-bold text-sm mx-auto mb-2 shadow-sm">3</span>
                    <h3 class="font-bold text-gray-800 text-sm">Tunggu Respon</h3>
                    <p class="text-xs text-gray-500 mt-1">Kami akan segera menindaklanjuti</p>
                </div>
            </div>

            <!-- Form -->
            <h2 class="text-xl font-extrabold text-gray-900 mb-2 flex items-center gap-2">
                <span class="w-1.5 h-6 bg-amber-500 rounded-full"></span>
                Form Laporan Pengaduan
            </h2>
            <p class="text-gray-500 text-sm mb-6">Harap lengkapi semua isian formulir di bawah ini dengan informasi yang valid.</p>

            <!-- Alerts -->
            <div id="alert-success" class="hidden mb-6 p-4 rounded-xl bg-green-50 border border-green-200">
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-green-800 font-medium text-sm">Pengaduan berhasil dikirim! Kami akan menindaklanjuti laporan Anda.</p>
                </div>
            </div>

            <div id="alert-error" class="hidden mb-6 p-4 rounded-xl bg-red-50 border border-red-200">
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 rounded-full bg-red-500 text-white flex items-center justify-center">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                    <p class="text-red-800 font-medium text-sm">Terjadi kesalahan saat mengirim pengaduan. Silakan coba lagi.</p>
                </div>
            </div>

            <form id="complaint-form" action="{{ route('pengaduan.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Lengkap</label>
                    <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors" placeholder="Nama Anda" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors" placeholder="email@domain.com" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nomor Telepon</label>
                    <input type="tel" name="telepon" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors" placeholder="08xxxxxxxxxx">
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Subjek</label>
                    <input type="text" name="subjek" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors" placeholder="Ringkasan pengaduan" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Isi Pengaduan</label>
                    <textarea name="pesan" rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors" placeholder="Tulis pengaduan Anda secara detail" required></textarea>
                </div>

                <div class="md:col-span-2 flex items-center justify-end pt-2">
                    <button type="submit" id="submit-btn" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-amber-600 text-white font-bold hover:bg-amber-700 active:scale-[.99] transition shadow-lg shadow-amber-500/20">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        <span id="btn-text">Kirim Pengaduan</span>
                    </button>
                </div>
            </form>
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