<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Kunjungan;
use Illuminate\Http\Request;
use App\Exports\KunjunganExport;
use Maatwebsite\Excel\Facades\Excel;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $kls7 = Kunjungan::tanggal(request('filter'))->filtertanggal(request(['dari', 'sampai']))->kelas(['kelas' => '7'])->get()->sum('jumlah');
        $kls8 = Kunjungan::tanggal(request('filter'))->filtertanggal(request(['dari', 'sampai']))->kelas(['kelas' => '8'])->get()->sum('jumlah');
        $kls9 = Kunjungan::tanggal(request('filter'))->filtertanggal(request(['dari', 'sampai']))->kelas(['kelas' => '9'])->get()->sum('jumlah');

        return view('dashboard.kunjungan.index', [
            'kls7' => $kls7,
            'kls8' => $kls8,
            'kls9' => $kls9,
            'kunjungans' => Kunjungan::tanggal(request('filter'))->filtertanggal(request(['dari', 'sampai']))->latest()->get(),
            'baca' => Kunjungan::tanggal(request('filter'))->filtertanggal(request(['dari', 'sampai']))->baca()->get()->sum('jumlah'),
            'pinjam' => Kunjungan::tanggal(request('filter'))->filtertanggal(request(['dari', 'sampai']))->pinjam()->get()->sum('jumlah'),
            'kembali' => Kunjungan::tanggal(request('filter'))->filtertanggal(request(['dari', 'sampai']))->kembali()->get()->sum('jumlah'),
            'tugas' => Kunjungan::tanggal(request('filter'))->filtertanggal(request(['dari', 'sampai']))->tugas()->get()->sum('jumlah')

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
        $hari_ini = Kunjungan::where('created_at', 'like', '%' . date('Y-m-d') . '%')->get();

        foreach ($hari_ini as $siswa) {
            if ($siswa->nama == strtolower($request->nama) && $siswa->ruangan_id == $request->ruangan_id) {
                return redirect()->back()->with('error', "Maaf, Kamu Sudah Berkunjung Hari Ini !!!");
            }
        }

        $validasiData = $request->validate([
            'nama' => 'required',
            'ruangan_id' => 'required',
            'tujuan' => 'required',
            'jumlah' => 'required'
        ]);

        $validasiData['nama'] = strtolower($request->nama);

        if ($validasiData['tujuan'] == 'Tujuan') {
            return redirect()->back()->with('error', "Mohon isi Tujuan");
        } elseif ($validasiData['ruangan_id'] == 'Kelas') {
            return redirect()->back()->with('error', "Mohon isi Kelas");
        }

        Kunjungan::create($validasiData);

        return redirect()->back()->with('success', "Terimakasih Sudah Berkunjung $request->nama");
    }

    /**
     * Display the specified resource.
     */
    public function show(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kunjungan $kunjungan)
    {
        Kunjungan::where('id', $kunjungan->id)->delete();

        return redirect()->back();
    }
}
