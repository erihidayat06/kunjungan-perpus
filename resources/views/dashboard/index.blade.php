@extends('dashboard.layouts.main')

@section('container')
    <section class="section dashboard">
        <div class="row">
            <div class="pagetitle">
                <h1>Jumlah Kunjungan Siswa</h1>
            </div><!-- End Page Title -->
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengujung <span>| Total</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $kunjungans->sum('jumlah') }}</h6>

                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->

        </div>
        <hr>
        <div class="pagetitle">
            <h1>Total Kujungan perkelas</h1>
        </div>
        <div class="row row-cols-1 row-cols-lg-3">
            <!-- Customers Card -->
            <div class="col">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengujung <span>| Kelas 7</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $kls7 }}</h6>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Customers Card -->
            <div class="col">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengujung <span>| Kelas 8</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $kls8 }}</h6>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Customers Card -->
            <div class="col">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengujung <span>| Kelas 9</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $kls9 }}</h6>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="pagetitle">
                <h1>Kunjungan Kategori</h1>
            </div><!-- End Page Title -->
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengujung <span>| Baca</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $baca }}</h6>

                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengujung <span>| Pinjam</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $pinjam }}</h6>

                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengujung <span>| Kembali</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $kembali }}</h6>

                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengujung <span>| Tugas</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $tugas->sum('jumlah') }}</h6>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="pagetitle">
                <h1>Jumlah Kunjungan Karyawan</h1>
            </div><!-- End Page Title -->
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengujung <span>| Guru</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ count($guru) }}</h6>

                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengujung <span>| Karyawan</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
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

    </section>
@endsection
