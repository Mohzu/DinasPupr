<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::published()->first();

        return view('pages.sejarah', compact('sejarah'));
    }
}
