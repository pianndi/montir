<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Gejala;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index', [
            'total_gejala' => Gejala::count(),
            'total_area' => Area::count(),
        ]);
    }
}
