<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function sejarah()
    {
        return view('pages.sejarah');
    }

    public function strukturOrganisasi()
    {
        return view('pages.struktur_organisasi');
    }

    public function visiMisi()
    {
        return view('pages.visi_misi');
    }
}