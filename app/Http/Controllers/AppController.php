<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Gejala;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('pages.index', compact('gejala'));
    }
    public function periksa(Request $request)
    {
        $gejala_list = explode('-', $request->query('g', ''));
        $gejala = Gejala::whereIn('id', $gejala_list)->with('gejalaArea')->get()->toArray();
        return view('pages.periksa', compact('gejala'));
    }
    public function kesimpulan(Request $request)
    {
        $area_list = array_filter(explode('-', $request->query('k', '')), fn ($item) => !empty($item));
        $gejala_list = explode('-', $request->query('g', ''));
        $gejala = Gejala::whereIn('id', $gejala_list)->with('gejalaArea')->get()->toArray();
        $area = Area::whereIn('id', $area_list)->get()->toArray();
        return view('pages.kesimpulan', [
            'gejala' => $gejala,
            'area' => $area,
            'area_list' => $area_list,
        ]);
    }
}
