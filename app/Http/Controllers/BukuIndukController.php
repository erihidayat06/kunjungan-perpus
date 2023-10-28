<?php

namespace App\Http\Controllers;

use App\Models\Buku_induk;
use Illuminate\Http\Request;
use App\Imports\BukuIndukImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Contracts\Session\Session;
use PhpParser\Node\Expr;

class BukuIndukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.bukuInduk.index', [
            'bukus' => Buku_induk::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.bukuInduk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validasiData = $request->validate([
            'tanggal' => 'required',
            'asal' => 'required',
            'pengarang' => 'required',
            'judul_buku' => 'required',
            'impresium' => 'required',
            'jml_jdl' => 'required',
            'jml_exs' => 'required',
            'no_inven' => 'required',
            'no_kelas' => 'required',
            'keterangan' => 'required',
        ]);


        // $string = '';
        // foreach ( as $value) {
        //     $string .=  $value . ',';
        // }



        $validasiData['bahasa'] = collect($request['bahasa'])->implode(',');
        $validasiData['macam'] = collect($request['macam'])->implode(',');


        if (Buku_induk::create($validasiData)) {
            return redirect('/dashboard/buku-induk')->with('success', 'Data Berhasil di Simpan');
        }

        return redirect('/dashboard/buku-induk/create')->with('error', 'Data Masih Kurang');
    }

    /**
     * Display the specified resource.
     */
    public function show(buku_induk $buku_induk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku_induk $buku_induk)
    {
        $bahasa = ['I', 'A', 'D'];
        $dataBahasa = explode(',', $buku_induk->bahasa);
        $notBahasa = array_diff($bahasa, $dataBahasa);

        $macam = ['T', 'F', 'R', 'L'];
        $dataMacam = explode(',', $buku_induk->macam);
        $notMacam = array_diff($macam, $dataMacam);

        $asal = ['Beli', 'Hadiah', 'Proyek'];

        return view('dashboard.bukuInduk.edit', [
            'buku' => $buku_induk,
            'notBahasa' => $notBahasa,
            'dataBahasa' => $dataBahasa,
            'notMacam' => $notMacam,
            'dataMacam' => $dataMacam,
            'asal' => $asal
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buku_induk $buku_induk)
    {
        $validasiData = $request->validate([
            'tanggal' => 'required',
            'asal' => 'required',
            'pengarang' => 'required',
            'judul_buku' => 'required',
            'impresium' => 'required',
            'jml_jdl' => 'required',
            'jml_exs' => 'required',
            'no_inven' => 'required',
            'no_kelas' => 'required',
            'keterangan' => 'required',
        ]);

        $validasiData['bahasa'] = collect($request['bahasa'])->implode(',');
        $validasiData['macam'] = collect($request['macam'])->implode(',');


        Buku_induk::where('id', $buku_induk->id)->update($validasiData);

        return redirect('/dashboard/buku-induk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku_induk $buku_induk)
    {

        Buku_induk::where('id', $buku_induk->id)->delete();

        return redirect()->back()->with('error', 'Data Berhasil di Hapus');
    }

    public function import_excel(Request $request)
    {
        Excel::import(new BukuIndukImport, $request->file('file')->store('file'));
        return redirect()->back()->with('success', 'Data Berhasil di Simpan');
    }
}
