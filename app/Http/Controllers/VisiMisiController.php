<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visimisi = VisiMisi::published()->first();

        return view('pages.visimisi', compact('visimisi'));
    }
}
