<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('kelas')) {
            return view('dashboard.kelas.index', [
                'kelass' => Ruangan::where('kelas', request('kelas'))->get()
            ]);
        }

        return redirect()->back();
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
        $validasiData = $request->validate([
            'kelas' => 'required',
            'nama_kelas' => 'required'
        ]);

        if ($request->kelas == 7) {
            $validasiData['nama_kelas'] = 'VII' . ' ' . $request->nama_kelas;
        } elseif ($request->kelas == 8) {
            $validasiData['nama_kelas'] = 'VIII' . ' ' . $request->nama_kelas;
        } elseif ($request->kelas == 9) {
            $validasiData['nama_kelas'] = 'IX' . ' ' . $request->nama_kelas;
        }

        Ruangan::create($validasiData);

        return redirect()->back()->with('success', "Berhasil Di Tambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruangan $ruangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $validasiData = $request->validate([
            'nama_kelas' => 'required'
        ]);

        Ruangan::where('id', $ruangan->id)->update($validasiData);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruangan $ruangan)
    {
        Ruangan::where('id', $ruangan->id)->delete();

        return redirect()->back()->with('error', 'Data Berhasil di Hapus');
    }
}
