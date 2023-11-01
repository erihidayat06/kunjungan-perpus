@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Halaman Katalog Buku</h1>
    </div>



    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">



                        <div class="card-title">
                            Data Buku
                        </div>
                        <div class="d-flex justify-content-start">
                            <div class="row mb-4">
                                <div class="col">
                                    <a href="/dashboard/buku-induk/create" class="btn btn-sm btn-primary">Tambah</a>
                                </div>
                                <div class="col">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Import
                                    </button>
                                </div>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">

                                <form method="post" action="/dashboard/buku-induk/import" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                        </div>
                                        <div class="modal-body">


                                            <label>Pilih file excel</label>
                                            <div class="form-group">
                                                <input type="file" name="file" required="required">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>



                        <table class="table datatable text-capitalize">
                            <thead>
                                <a href="/dashboard/export/buku-induk" class="btn btn-sm btn-success mb-3"><i
                                        class="bi bi-file-earmark-spreadsheet"></i>
                                    Excel</a>

                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Asal</th>
                                    <th scope="col">Pengarang</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>

                            </thead>
                            <tbody>

                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($bukus as $buku)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ date('M,Y', strtotime($buku->tanggal)) }}</td>
                                        <td>{{ $buku->asal }}</td>
                                        <td>{{ $buku->pengarang }}</td>
                                        <td>{{ $buku->judul_buku }}</td>
                                        <td>{{ $buku->keterangan }}</td>
                                        <td>

                                            <div class="d-flex justify-contain-center">

                                                <div class="col">


                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-warning btn-sm m-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detail{{ $buku->id }}Modal">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    @include('dashboard.bukuInduk.modal')
                                                </div>

                                                <div class="col">
                                                    <a href="/dashboard/buku-induk/{{ $buku->id }}/edit"
                                                        class="btn btn-sm btn-success m-1">
                                                        <i class="bi bi-pencil-square"></i></a>
                                                </div>

                                                <div class="col">
                                                    <form action="/dashboard/buku-induk/{{ $buku->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-danger m-1"
                                                            onclick="return confirm('Apakah Data Ini Mau di Hapus?')"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>

                                            </div>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection

    </div>
</section>
