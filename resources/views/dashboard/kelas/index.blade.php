@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Data Kelas {{ request('kelas') }}</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Data Kelas</div>

                        <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#tambah">
                            Tambah Kelas {{ request('kelas') }}
                        </button>

                        @include('dashboard.kelas.modal')

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($kelass as $kelas)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $kelas->nama_kelas }}</td>

                                        <td>

                                            <div class="d-flex justify-contain-start">

                                                <button type="button" class="btn btn-sm btn-success m-1"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $kelas->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                @include('dashboard.kelas.modaledit')

                                                <form action="/dashboard/kelas/{{ $kelas->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger m-1"
                                                        onclick="return confirm('Apakah Data Ini Mau di Hapus?')"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
