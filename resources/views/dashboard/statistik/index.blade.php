@extends('dashboard.layouts.main')

@section('container')
    <div class="dropdown mb-4">
        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

            @if (request('dari'))
                {{ date('Y', strtotime(request('dari'))) }} - {{ date('Y', strtotime(request('sampai'))) }}
            @else
                Tahun Ajaran
            @endif
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard/statistik">Semua Tahun Ajaran</a></li>
            @foreach ($ajarans as $tahun)
                <li><a class="dropdown-item"
                        href="/dashboard/statistik?dari={{ $tahun['dari'] }}&sampai={{ $tahun['sampai'] }}">{{ $tahun['d'] }}
                        - {{ $tahun['s'] }}</a></li>
            @endforeach

        </ul>
    </div>

    <div class="row text-center">
        <h3>
            @if (request('dari'))
                Tahun Ajaran {{ date('Y', strtotime(request('dari'))) }} - {{ date('Y', strtotime(request('sampai'))) }}
            @else
                Seluruh Data
            @endif
        </h3>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Grafik Kunjungan Siswa</h5>

                <!-- Column Chart -->
                <div id="columnChart"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#columnChart"), {
                            series: [{
                                name: 'Baca',
                                data: {{ $b }}
                            }, {
                                name: 'Pinjam',
                                data: {{ $p }}
                            }, {
                                name: 'Kembali',
                                data: {{ $k }}
                            }, {
                                name: 'Tugas',
                                data: {{ $t }}
                            }, ],
                            chart: {
                                type: 'bar',
                                height: 350
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '55%',
                                    endingShape: 'rounded'
                                },
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent']
                            },
                            xaxis: {
                                categories: ['jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                                    'Nov', 'Des'
                                ],
                            },
                            yaxis: {
                                title: {
                                    text: 'Data Kunjungan Siswa'
                                }
                            },
                            fill: {
                                opacity: 1
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return "jml " + val + " Siswa"
                                    }
                                }
                            }
                        }).render();
                    });
                </script>
                <!-- End Column Chart -->

            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Grafik Kunjungan Karyawan</h5>

                <!-- Column Chart -->
                <div id="grafik-kelas"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#grafik-kelas"), {
                            series: [{
                                name: 'Guru',
                                data: {{ $g }}
                            }, {
                                name: 'Karyawan',
                                data: {{ $kar }}
                            }, ],
                            chart: {
                                type: 'bar',
                                height: 350
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '55%',
                                    endingShape: 'rounded'
                                },
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent']
                            },
                            xaxis: {
                                categories: ['jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                                    'Nov', 'Des'
                                ],
                            },
                            yaxis: {
                                title: {
                                    text: 'Data Kunjungan Karyawan'
                                }
                            },
                            fill: {
                                opacity: 1
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return "jml " + val + " Siswa"
                                    }
                                }
                            }
                        }).render();
                    });
                </script>
                <!-- End Column Chart -->

            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Grafik Jam Kunjungan Siswa</h5>

                <!-- Column Chart -->
                <div id="grafik-jam"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#grafik-jam"), {
                            series: [{
                                name: 'jam',
                                data: {{ $jam }}
                            }, ],
                            chart: {
                                type: 'bar',
                                height: 350
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '55%',
                                    endingShape: 'rounded'
                                },
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent']
                            },
                            xaxis: {
                                categories: ['07', '08', '09', '10', '11', '12', '13'],
                            },
                            yaxis: {
                                title: {
                                    text: 'Aktivitas'
                                }
                            },
                            fill: {
                                opacity: 1
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return "jml " + val + " Siswa"
                                    }
                                }
                            }
                        }).render();
                    });
                </script>
                <!-- End Column Chart -->

            </div>
        </div>
    </div>
@endsection
