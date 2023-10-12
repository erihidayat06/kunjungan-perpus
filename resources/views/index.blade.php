@extends('layouts.main')

@section('container')
    <div style="margin-top: 100px" class="row">
        <div class="col-sm-5 mb-3 mb-sm-0 text-center">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <h3 class="card-title mb-2">Selamat Datang Di Perpustakaan</h3>
                        <h3 class="card-title mb-3 fw-bold  d-none d-lg-block">MTs Negeri 1 Tegal</h3>
                        <img src="/assets/img/logo-perpus.png" width="70%" alt="">
                    </div>
                    <div class="carousel-item" data-bs-interval="7000">
                        <h5><span class="fw-bold">TOP 5</span> Kunjungan Pepustakaan Terbanyak</h5>
                        <h5> Tahun ajaran 2023 - 2024</h5>
                        <table class="table table-hover text-start">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jumlah Kunjungan</th>
                            </tr>

                            @php
                                $i = 0;
                            @endphp

                            @foreach ($peringkats->shift(5) as $peringkat)
                                <tr>
                                    <td>
                                        @php
                                            $i = $i + 1;
                                        @endphp
                                        @if ($i == 1)
                                            <img src="/assets/img/peringkat1.png" alt="" width="20px">
                                        @elseif ($i == 2)
                                            <img src="/assets/img/peringkat2.png" alt="" width="20px">
                                        @elseif ($i == 3)
                                            <img src="/assets/img/peringkat3.png" alt="" width="20px">
                                        @else
                                            {{ $i }}
                                        @endif
                                    </td>
                                    <td>{{ $peringkat['nama'] }}</td>
                                    <td>{{ $peringkat['kelas'] }}</td>
                                    <td>{{ $peringkat['jumlah'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            {{-- <h3 class="card-title mb-2">Selamat Datang Di Perpustakaan</h3>
            <h3 class="card-title mb-3 fw-bold  d-none d-lg-block">MTs Negeri 1 Tegal</h3>
            <img src="/assets/img/logo-perpus.png" width="70%" alt=""> --}}
        </div>
        <div class="col-sm-6 mb-5">
            <div class="card">
                <div class="card-body">
                    @include('nav')
                </div>
            </div>
        </div>
    </div>
@endsection
