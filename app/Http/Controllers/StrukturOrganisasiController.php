<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $leaders = \App\Models\PejabatStruktural::query()
            ->where('aktif', true)
            ->orderBy('urutan')
            ->orderBy('id')
            ->get(['nama','jabatan','foto'])
            ->map(function ($leader) {
                $leader->foto_url = $leader->foto
                    ? (Str::startsWith($leader->foto, ['http://', 'https://'])
                        ? $leader->foto
                        : Storage::disk('public')->url($leader->foto))
                    : null;
                return $leader;
            });

        $struktur = \App\Models\StrukturOrganisasi::published()->first();

        return view('pages.strukturorganisasi', compact('leaders', 'struktur'));
    }
}
