<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('dashboard.kunjunganKaryawan.index',[
        'kunjungans' => Karyawan::tanggal(request('filter'))->filtertanggal(request(['dari','sampai']))->latest()->get(),
        'guru' => Karyawan::tanggal(request('filter'))->filtertanggal(request(['dari','sampai']))->latest()->guru()->get(),
        'karyawan' => Karyawan::tanggal(request('filter'))->filtertanggal(request(['dari','sampai']))->latest()->karyawan()->get(),
         ]);
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
        $hari_ini = Karyawan::where('created_at', 'like', '%' . date('Y-m-d') . '%')->get();

        foreach ($hari_ini as $karyawan) {
         if ($karyawan->nama == strtolower($request->nama) && $karyawan->ruangan_id == $request->ruangan_id) {
            return redirect()->back()->with('error',"Maaf, Kamu Sudah Berkunjung Hari Ini !!!");
         }
       }

        $validasiData = $request->validate([
            'nama' => 'required',
            'tujuan' => 'required',
            'jabatan' => 'required'
        ]);

        $validasiData['nama'] = strtolower($request->nama);

        if($validasiData['jabatan'] == 'Jabatan'){
        return redirect()->back()->with('error', "Mohon isi Jabatan");
        }

        Karyawan::create($validasiData);

        return redirect()->back()->with('success', "Selamat Datang Bapak/Ibu $request->nama");
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        Karyawan::where('id', $karyawan->id)->delete();

        return redirect()->back()->with('error', 'Data Telah Terhapus');
    }
}
