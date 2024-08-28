@extends('layouts.welcome')

@section('content')
    <p class="ml-5 mr-5 mb-3">"Barang promosi ini dirancang khusus untuk mendukung kegiatan pemasaran dan penjualan
        retail Pertamina di wilayah operasi MOR V. Produk-produk
        ini mencakup berbagai jenis merchandise yang menampilkan logo dan desain ikonik Pertamina, bertujuan untuk
        meningkatkan kesadaran merek dan loyalitas
        pelanggan."</p>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="row p-2">
                <!-- Total Barang -->
                <div class="card flex-fill w-100 col-6 col-lg-4 col-xxl-3 d-flex">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Total Barang Promosi</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-blue rounded-circle" style="background-color: rgb(147, 190, 245)">
                                    <i class="align-middle nav-icon fas fa-cubes fa-2x p-2"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $totalBarang }} <span style="font-size: 1rem;">pcs</span></h1>
                    </div>
                </div>
                <!-- End Total Barang -->

                <!-- Total Barang Masuk -->
                <div class="card flex-fill w-100 col-6 col-lg-4 col-xxl-3 d-flex ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Total Barang Masuk</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-blue rounded-circle" style="background-color: rgb(147, 190, 245)">
                                    <i class="align-middle nav-icon fas fa-truck-moving p-3"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $totalBarangMasuk }} <span style="font-size: 1rem;"></span></h1>
                    </div>
                </div>
                <!-- End Total Barang Masuk -->

                <!-- Total Barang Keluar -->
                <div class="card flex-fill w-100 col-6 col-lg-4 col-xxl-3 d-flex">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Total Barang Keluar</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-blue rounded-circle" style="background-color: rgb(147, 190, 245)">
                                    <i class="align-middle nav-icon fas fa-truck-loading p-3"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $totalBarangKeluar }} <span style="font-size: 1rem;">jenis</span></h1>
                    </div>
                </div>
                <!-- End Total Barang Keluar -->
            </div>

            <div class="row">
                <!-- Top 5 BarChart -->
                <div class="col-8 col-lg-5 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Top 5 Barang</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart chart-sm">
                                {!! $top5chart->container() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Top 5 BarChart -->

                <!-- Monthly Sales -->
                <div class="col-12 col-lg-7 col-xxl-4 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Permintaan Barang Keluar</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart chart-sm">
                                {!! $permintaanBarangChart->container() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Monthly Sales -->
            </div>

            
            <!-- Penambahan stok perbulan -->
            {{-- <div class="col-xl-6 col-xxl-5 d-flex"> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="chart chart-sm">
                            {{-- {!! $top5chart->container() !!} --}}
                        </div>
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Gantungan Kunci Motor Gipffy</td>
                                    <td>15/08/2023</td>
                                    <td>50</td>
                                    <td>Event DBL</td>
                                </tr>
    
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- </div> --}}
                <!-- Penambahan Stok Perbulan -->

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ $top5chart->cdn() }}"></script>

    {{ $top5chart->script() }}

    <script src="{{ $permintaanBarangChart->cdn() }}"></script>

    {{ $permintaanBarangChart->script() }}
@endsection
