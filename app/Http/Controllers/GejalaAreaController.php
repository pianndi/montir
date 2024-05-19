<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Gejala;
use App\Models\GejalaArea;
use Illuminate\Http\Request;

class GejalaAreaController extends Controller
{
    public function index($id)
    {
        $cari = "%" . request()->get('cari', '') . "%";
        $gejala = Gejala::find($id);
        // get all area where gejala id not $gejala->id
        $area = Area::whereDoesntHave('gejala', function ($query) use ($gejala, $cari) {
            $query->where('gejalas.id', $gejala->id);
        })->where(function ($query) use ($cari) {
            $query->where('name', 'like', $cari)
                ->orWhere('description', 'like', $cari);
        })->withCount(['langkah'])
            ->paginate(20);
        return view('pages.dashboard.gejala.area.index', compact('gejala', 'area'));
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'area_id' => 'required'
        ]);
        Gejala::find($id)->kerusakan()->create($request->only('area_id'));
        return back()->with('success', "Area kerusakan berhasil ditambahkan");
    }
    public function destroy($id)
    {
        $ga = GejalaArea::find($id);
        if (!$ga) {
            return back()->with('error', "Area Kerusakan tidak ditemukan");
        }
        $ga->delete();
        return back()->with('success', "Area kerusakan berhasil dihapus");
    }
}
