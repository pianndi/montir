<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\GejalaArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cari = "%" . request()->get('cari', '') . "%";
        $gejala = Gejala::where('name', 'like', $cari)->paginate(20);
        return view('pages.dashboard.gejala.index', compact('gejala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('error', "Data tidak valid");
        }
        $gejala = Gejala::create(['name' => $request->input('name')]);
        if ($gejala) {
            return back()->with('success', 'Gejala baru berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gejala = Gejala::find($id);
        return view('pages.dashboard.gejala.show', compact('gejala'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gejala = Gejala::find($id);
        return view('pages.dashboard.gejala.edit', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {

            return back()->withErrors($validator->errors())->withInput()->with('error', "Data tidak valid");
        }

        $gejala = Gejala::find($id);
        if (!$gejala) return back()->with('error', "Gejala tidak ditemukan");
        $gejala->update($request->only('name'));
        return back()->with('success', "Gejala berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gejala = Gejala::find($id);
        if ($gejala) {
            $gejala->delete();
            return back()->with('success', 'Gejala ' . $gejala->name . ' berhasil dihapus!');
        }
        return back()->with('error', 'Gejala tidak ditemukan!');
    }
    
}
