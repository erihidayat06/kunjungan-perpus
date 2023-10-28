@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Tambah Data Buku
                </div>

                <form action="/dashboard/buku-induk" method="POST">
                    @csrf

                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">

                    <label for="asal" class="mt-3">Asal</label>
                    <select class="form-select" aria-label="Default select asal" id="asal" name="asal">
                        <option value="Beli">Beli</option>
                        <option value="Hadiah">Hadiah</option>
                        <option value="Proyek">Proyek</option>
                    </select>

                    <label for="pengarang" class="mt-3">Pengarang</label>
                    <input type="text" id="pengarang" class="form-control" name="pengarang"
                        value="{{ old('pengarang') }}">

                    <label for="judul_buku" class="mt-3">Judul Buku</label>
                    <input type="text" id="judul_buku" class="form-control" name="judul_buku"
                        value="{{ old('judul_buku') }}">

                    <label for="impresium" class="mt-3">Impresium</label>
                    <input type="text" id="impresium" class="form-control" name="impresium"
                        value="{{ old('impresium') }}">

                    <table>
                        <tr>
                            <td>
                                <label for="jml_jdl" class="mt-3">Jml JDL</label>
                                <input type="number" id="jml_jdl" class="form-control" name="jml_jdl"
                                    value="{{ old('jml_jdl') }}">
                            </td>
                            <td>
                                <label for="jml_exs" class="mt-3">Jml EXSL</label>
                                <input type="number" id="jml_exs" class="form-control" name="jml_exs"
                                    value="{{ old('jml_exs') }}">
                            </td>
                        </tr>
                    </table>

                    <label for="no_inven" class="mt-3">No Inven</label>
                    <input type="text" id="no_inven" class="form-control" name="no_inven" value="{{ old('no_inven') }}">

                    <label for="no_kelas" class="mt-3">No_Kelas</label>
                    <input type="text" id="no_kelas" class="form-control" name="no_kelas" value="{{ old('no_kelas') }}">

                    {{-- Input Bahasa --}}
                    <label for="bahasa" class="mt-3">Bahasa</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="I" name="bahasa[]">
                        <label class="form-check-label" for="inlineCheckbox1">I</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="A" name="bahasa[]">
                        <label class="form-check-label" for="inlineCheckbox2">A</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="D" name="bahasa[]">
                        <label class="form-check-label" for="inlineCheckbox3">D</label>
                    </div>
                    <br>


                    {{-- Input Macam --}}
                    <label for="bahasa" class="mt-3">Macam</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="T"
                            name="macam[]">
                        <label class="form-check-label" for="inlineCheckbox1">T</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="F"
                            name="macam[]">
                        <label class="form-check-label" for="inlineCheckbox2">F</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="R"
                            name="macam[]">
                        <label class="form-check-label" for="inlineCheckbox3">R</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="L"
                            name="macam[]">
                        <label class="form-check-label" for="inlineCheckbox3">L</label>
                    </div>
                    <br>

                    <label for="keterangan" class="mt-3">Keterangan</label>
                    <input type="text" id="keterangan" class="form-control" name="keterangan"
                        value="{{ old('keterangan') }}">


                    <div class="mt-3">
                        <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
