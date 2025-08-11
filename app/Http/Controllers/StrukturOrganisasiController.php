<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $leaders = \App\Models\PejabatStruktural::query()
            ->where('aktif', true)
            ->orderBy('urutan')
            ->orderBy('id')
            ->get(['nama','jabatan','foto']);

        return view('pages.struktur_organisasi', compact('leaders'));
    }
}