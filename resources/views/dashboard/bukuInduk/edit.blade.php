@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Edit Data Buku
                </div>

                <form action="/dashboard/buku-induk/{{ $buku->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                        value="{{ old('tanggal', $buku) }}">

                    <label for="asal" class="mt-3">Asal</label>
                    <select class="form-select" aria-label="Default select asal" id="asal" name="asal">
                        @foreach ($asal as $asal)
                            @if ($asal == $buku->asal)
                                <option selected value="{{ $buku->asal }}">{{ $buku->asal }}</option>
                            @else
                                <option value="{{ $asal }}">{{ $asal }}</option>
                            @endif
                        @endforeach

                    </select>

                    <label for="pengarang" class="mt-3">Pengarang</label>
                    <input type="text" id="pengarang" class="form-control" name="pengarang"
                        value="{{ old('pengarang', $buku) }}">

                    <label for="judul_buku" class="mt-3">Judul Buku</label>
                    <input type="text" id="judul_buku" class="form-control" name="judul_buku"
                        value="{{ old('judul_buku', $buku) }}">

                    <label for="impresium" class="mt-3">Impresium</label>
                    <input type="text" id="impresium" class="form-control" name="impresium"
                        value="{{ old('impresium', $buku) }}">

                    <table>
                        <tr>
                            <td>
                                <label for="jml_jdl" class="mt-3">Jml JDL</label>
                                <input type="number" id="jml_jdl" class="form-control" name="jml_jdl"
                                    value="{{ old('jml_jdl', $buku) }}">
                            </td>
                            <td>
                                <label for="jml_exs" class="mt-3">Jml EXSL</label>
                                <input type="number" id="jml_exs" class="form-control" name="jml_exs"
                                    value="{{ old('jml_exs', $buku) }}">
                            </td>
                        </tr>
                    </table>

                    <label for="no_inven" class="mt-3">No Inven</label>
                    <input type="text" id="no_inven" class="form-control" name="no_inven"
                        value="{{ old('no_inven', $buku) }}">

                    <label for="no_kelas" class="mt-3">No_Kelas</label>
                    <input type="text" id="no_kelas" class="form-control" name="no_kelas"
                        value="{{ old('no_kelas', $buku) }}">

                    {{-- Input Bahasa --}}
                    <label for="bahasa" class="mt-3">Bahasa</label><br>
                    @foreach ($dataBahasa as $bahasa)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                value="{{ $bahasa }}" name="bahasa[]" checked>
                            <label class="form-check-label" for="inlineCheckbox1">{{ $bahasa }}</label>
                        </div>
                    @endforeach

                    @foreach ($notBahasa as $bahasa)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                value="{{ $bahasa }}" name="bahasa[]">
                            <label class="form-check-label" for="inlineCheckbox1">{{ $bahasa }}</label>
                        </div>
                    @endforeach

                    <br>


                    {{-- Input Macam --}}
                    <label for="macam" class="mt-3">Macam</label><br>
                    @foreach ($dataMacam as $macam)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                value="{{ $macam }}" name="macam[]" checked>
                            <label class="form-check-label" for="inlineCheckbox1">{{ $macam }}</label>
                        </div>
                    @endforeach

                    @foreach ($notMacam as $macam)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                value="{{ $macam }}" name="macam[]">
                            <label class="form-check-label" for="inlineCheckbox1">{{ $macam }}</label>
                        </div>
                    @endforeach


                    <br>

                    <label for="keterangan" class="mt-3">Keterangan</label>
                    <input type="text" id="keterangan" class="form-control" name="keterangan"
                        value="{{ old('keterangan', $buku) }}">


                    <div class="mt-3">
                        <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
