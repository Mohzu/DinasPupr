<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sejarah;

class SejarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sejarah::create([
            'title' => 'Sejarah Perkembangan',
            'content' => '<div class="p-6 sm:p-8 space-y-6 sm:space-y-8">
                
                <div class="flex gap-6">
                    <div class="flex-shrink-0">
                        <div class="w-24 h-24 bg-amber-600 text-white rounded flex flex-col items-center justify-center">
                            <span class="text-2xl font-bold">1942</span>
                        </div>
                    </div>
                    
                    <div class="flex-1 pt-2">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-amber-600">
                                <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"/>
                                <path d="m3 9 2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9"/>
                                <path d="M12 3v6"/>
                            </svg>
                            Pembentukan Dinas Pekerjaan Umum
                        </h3>
                        <div class="bg-amber-50 border-l-4 border-amber-600 p-4 rounded">
                            <p class="text-gray-700 leading-relaxed">
                                Dinas Pekerjaan Umum (DPU) didirikan oleh Belanda pada tahun 1942 oleh Reguen Shad. 
                                Pembentukan ini menjadi fondasi awal pembangunan infrastruktur di wilayah Kabupaten Garut.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200"></div>

                <div class="flex gap-6">
                    <div class="flex-shrink-0">
                        <div class="w-24 h-24 bg-green-700 text-white rounded flex flex-col items-center justify-center">
                            <span class="text-2xl font-bold">1998</span>
                        </div>
                    </div>
                    
                    <div class="flex-1 pt-2">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-700">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                                <polyline points="7.5 4.21 12 6.81 16.5 4.21"/>
                                <polyline points="7.5 19.79 7.5 14.6 3 12"/>
                                <polyline points="21 12 16.5 14.6 16.5 19.79"/>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                                <line x1="12" x2="12" y1="22.08" y2="12"/>
                            </svg>
                            Transformasi Kelembagaan
                        </h3>
                        <div class="bg-green-50 border-l-4 border-green-700 p-4 rounded">
                            <p class="text-gray-700 leading-relaxed mb-3">
                                Pada tahun 1998, Dinas Pekerjaan Umum (DPU) bertransformasi menjadi <strong>Dinas Bina Marga</strong>.
                            </p>
                            <p class="text-gray-700 leading-relaxed">
                                Transformasi ini menekankan pentingnya manajemen kepegawaian dan pengembangan Sumber Daya Manusia (SDM) 
                                dalam mengelola dan memanfaatkan pegawai agar tetap produktif dalam melaksanakan tugas dan tanggung jawab.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200"></div>

                <div class="flex gap-6">
                    <div class="flex-shrink-0">
                        <div class="w-24 h-24 bg-blue-700 text-white rounded flex flex-col items-center justify-center">
                            <span class="text-2xl font-bold">2016</span>
                        </div>
                    </div>
                    
                    <div class="flex-1 pt-2">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-700">
                                <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"/>
                                <path d="m3 9 2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9"/>
                                <path d="M12 3v6"/>
                            </svg>
                            Pembentukan Dinas PUPR
                        </h3>
                        
                        <div class="space-y-4">
                            <div class="bg-blue-50 border-l-4 border-blue-700 p-4 rounded">
                                <div class="flex items-start gap-3 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-700 flex-shrink-0 mt-1">
                                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2"/>
                                        <line x1="16" x2="16" y1="2" y2="6"/>
                                        <line x1="8" x2="8" y1="2" y2="6"/>
                                        <line x1="3" x2="21" y1="10" y2="10"/>
                                    </svg>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-1">Pembentukan Resmi</h4>
                                        <span class="inline-block bg-blue-700 text-white text-xs px-2 py-1 rounded mb-2">5 Oktober 2016</span>
                                    </div>
                                </div>
                                <p class="text-gray-700 leading-relaxed">
                                    Dinas Pekerjaan Umum dan Penataan Ruang resmi dibentuk berdasarkan <strong>Peraturan Bupati No. 27</strong> 
                                    tentang Struktur Organisasi dan Tata Kerja (SOTK). Instansi ini dipimpin oleh 
                                    <strong>Drs. H. UU Saepudin, ST., M.Si.</strong> sebagai Kepala Dinas pertama.
                                </p>
                            </div>

                            <div class="bg-gray-50 border-l-4 border-gray-600 p-4 rounded">
                                <div class="flex items-start gap-3 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-700 flex-shrink-0 mt-1">
                                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                                        <polyline points="14 2 14 8 20 8"/>
                                    </svg>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-1">Landasan Hukum</h4>
                                        <span class="inline-block bg-gray-700 text-white text-xs px-2 py-1 rounded mb-2">Perda No. 52 Tahun 2016</span>
                                    </div>
                                </div>
                                <p class="text-gray-700 leading-relaxed">
                                    Organisasi Dinas PUPR ditetapkan melalui <strong>Peraturan Daerah Kabupaten Garut Nomor 52 Tahun 2016</strong>, 
                                    yang mengatur tugas pokok, fungsi, dan tata kerja dalam melaksanakan kewenangan otonomi daerah 
                                    di bidang Sumber Daya Air, Kebinamargaan, Infrastruktur & Permukiman, Bangunan Gedung, dan Penataan Ruang.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>',
            'status' => 'published',
        ]);
    }
}
