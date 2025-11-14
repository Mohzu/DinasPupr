<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VisiMisi;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::create([
            'title' => 'Visi & Misi Dinas PUPR',
            'visi' => 'Terwujudnya Infrastruktur Pekerjaan Umum dan Penataan Ruang yang Berkualitas dalam Mendukung Kabupaten Garut Bermartabat, Nyaman dan Sejahtera',
            'misi' => '<ol class="space-y-4 sm:space-y-5">
                <li class="flex gap-3 sm:gap-4 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <span class="text-gray-700 text-xs sm:text-sm font-bold">1</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-800 text-xs sm:text-sm leading-relaxed">Meningkatkan kualitas aparatur sipil negara yang profesional dan beretika.</p>
                    </div>
                </li>
                <li class="flex gap-3 sm:gap-4 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <span class="text-gray-700 text-xs sm:text-sm font-bold">2</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-800 text-xs sm:text-sm leading-relaxed">Meningkatkan tata kelola organisasi dalam perencanaan, pelaksanaan dan pengawasan yang terpadu dan tepat sasaran.</p>
                    </div>
                </li>
                <li class="flex gap-3 sm:gap-4 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <span class="text-gray-700 text-xs sm:text-sm font-bold">3</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-800 text-xs sm:text-sm leading-relaxed">Mewujudkan infrastruktur jalan, permukiman, sumber daya air, bangunan, yang berkualitas dan memadai dengan berbasis penataan ruang.</p>
                    </div>
                </li>
                <li class="flex gap-3 sm:gap-4 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                            <span class="text-gray-700 text-xs sm:text-sm font-bold">4</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-800 text-xs sm:text-sm leading-relaxed">Meningkatkan kualitas dan kuantitas sarana penunjang sumber daya manusia dan infrastruktur.</p>
                    </div>
                </li>
            </ol>',
            'content' => null,
            'status' => 'published',
        ]);
    }
}
