@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Kunjungan {{ count($kunjungans) }}</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card recent-sales overflow-auto">
                    {{-- Filter --}}
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="/dashboard/kunjungan">All</a></li>
                            <li><a class="dropdown-item"
                                    href="/dashboard/kunjungan?filter={{ date('Y-m-d') }}&waktu=Hari Ini">Hari</a></li>
                            <li><a class="dropdown-item"
                                    href="/dashboard/kunjungan?filter={{ date('Y-m') }}&waktu=Bulan Ini">Bulan Ini</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="/dashboard/kunjungan?filter={{ date('Y') }}&waktu=Tahun Ini">Tahun Ini</a>
                            </li>
                        </ul>
                    </div>
                    {{-- End Filter --}}
                    <div class="card-body">


                        {{-- Title --}}
                        <div class="card-title">
                            Data Kunjungan {{ request('waktu') }}
                            @if (request('dari'))
                                : {{ date('d M Y', strtotime(request('dari'))) }} -
                                {{ date('d M Y', strtotime(request('sampai'))) }}
                            @endif
                        </div>


                        <h6 class="mt-3">Filter</h6>
                        <div class="input-group mb-3">

                            {{-- Filter Menurut Tanggal Yang di Input --}}
                            <form action="">
                                <div class="input-group input-group-sm">
                                    <input style="font-size: 11px" type="date" class="form-control" name="dari"
                                        value="{{ request('dari') }}" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">-</span>
                                    <input style="font-size: 11px" type="date" class="form-control" name="sampai"
                                        value="{{ request('sampai') }}" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <button type="submit" class="btn btn-sm btn-main btn-cari"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-xxl-3 col-xl-12">
                                <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Pengujung <span>| Guru</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ count($guru) }}</h6>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div><!-- End Customers Card -->
                            <div class="col-xxl-3 col-xl-12">
                                <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Pengujung <span>| Karyawan</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ count($karyawan) }}</h6>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div><!-- End Customers Card -->

                        </div>

                        <hr>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <a href="/dashboard/export/excelKaryawan?filter={{ request('filter') }}"
                                class="btn btn-sm btn-success"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($kunjungans as $kunjungan)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ ucwords($kunjungan->nama) }}</td>
                                        <td>{{ $kunjungan->jabatan }}</td>
                                        <td>{{ $kunjungan->tujuan }}</td>
                                        <td>{{ date('d M Y', strtotime($kunjungan->created_at)) }}</td>
                                        <td>{{ date('H:i', strtotime($kunjungan->created_at)) }}</td>

                                        <td>
                                            <form action="/dashboard/karyawan/{{ $kunjungan->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Mau Di Hapus?')"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>

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
