<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all area with name or description with parameter cari
        $cari = "%" . request()->get('cari', '') . "%";
        $area = Area::where('name', 'like', $cari)->orWhere('description', 'like', $cari)->withCount('langkah')->paginate(20);
        return view('pages.dashboard.area.index', compact('area'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.area.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'video_url' => 'required|url',
            'step' => 'required|array'
        ]);
        $video_url = explode('/', $request->input('video_url'));
        $video_embed_url = "https://youtube.com/embed/" . $video_url[count($video_url) - 1];
        $area = Area::create(['name' => $request->input('name'), 'description' => $request->input('description', ''), 'video_url' => $request->input('video_url'), 'video_embed_url' => $video_embed_url]);
        foreach ($request->input('step', []) as $step) {
            if ($step) {
                $area->langkah()->create(['name' => $step]);
            }
        }
        if ($area) {
            return redirect('/dashboard/area')->with('success', 'Area baru berhasil ditambahkan!');
        }
        return view('pages.dashboard.area.create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $area = Area::find($id);
        return view('pages.dashboard.area.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $area = Area::find($id);
        return view('pages.dashboard.area.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'video_url' => 'required|url',
            'step' => 'required|array'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('error', "Data tidak valid");
        }
        $video_url = explode('/', $request->input('video_url'));
        $video_embed_url = "https://youtube.com/embed/" . $video_url[count($video_url) - 1];
        $area = Area::find($id);
        if (!$area) {
            return back()->with('error', "Area tidak ditemukan");
        }
        $area->update(['name' => $request->input('name'), 'description' => $request->input('description', ''), 'video_url' => $request->input('video_url'), 'video_embed_url' => $video_embed_url]);
        foreach ($request->input('step', []) as $step) {
            if (isset($step['name'])) {

                if (isset($step['id'])) {
                    $area->langkah()->find($step['id'])->update(['name' => $step['name']]);
                } else {
                    $area->langkah()->create([
                        'name' => $step['name']
                    ]);
                }
            } elseif (isset($step['id'])) {
                $area->langkah()->find($step['id'])->delete();
            }
        }
        return back()->with('success', 'Area berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $area = Area::find($id);
        if ($area) {
            $area->delete();
            return back()->with('success', 'Area ' . $area->name . ' berhasil dihapus!');
        }
        return back()->with('error', 'Area tidak ditemukan!');
    }
}
