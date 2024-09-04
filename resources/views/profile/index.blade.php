@extends('layouts.welcome')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img style="width: 100px;" src="{{ asset('images\logo_pertamina.png') }}" alt="User profile">
                    </div>
                    <h3 class="profile-username text-center">Inventaris Barang Promosi MOR V</h3>
                    <p class="text-muted text-center">Admin Gudang Retail Sales</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>No Induk</b>
                            <a class="float-right">TAD02257965</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fungsi</b>
                            <a class="float-right">Retail Sales</a>
                        </li>
                        <li class="list-group-item">
                            <b>No Tlpn</b>
                            <a class="float-right">08112345678</a>
                        </li>
                        <li class="list-group-item">
                            <b>Alamat</b>
                            <a class="float-right" href="https://maps.app.goo.gl/gyMXkYmYcLM3r1TdA">Jagir Wonokromo No.88,
                                Surabaya</a>
                        </li>
                    </ul>
                    <a href="{{ url('/logout') }}" class="btn btn-primary btn-block"><b>Logout</b></a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#kategori" data-toggle="tab"
                                onclick="loadTabContent('kategori')">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#fungsi" data-toggle="tab"
                                onclick="loadTabContent('fungsi')">Fungsi</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <!-- kategori -->
                    <div class="active tab-pane" id="kategori">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Kategori Barang Promosi</h3>
                                    <a href="#" class="btn btn-primary float-right">Tambah</a>
                                </div>
                                <div class="card-body">
                                    <div style="max-height: 300px; overflow-y:auto;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">No</th>
                                                    <th>Nama Kategori</th>
                                                    <th>Kode Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kategori as $kategori)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $kategori->nama_kategori }}</td>
                                                        <td>{{ $kategori->kode_kategori }}</td>
                                                        <td>
                                                            <a href="{{ url('profile/edit') }}"
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                            <form action="#" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.kategori -->

                    <!-- fungsi -->
                    <div class="tab-pane" id="fungsi">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Fungsi Kantor Jatimbalinus</h3>
                                </div>
                                <div class="card-body">
                                    <div style="max-height: 300px; overflow-y:auto;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">No</th>
                                                    <th>Nama Fungsi</th>
                                                    <th>Kode Fungsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($fungsi as $fungsi)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $fungsi->nama_fungsi }}</td>
                                                        <td>{{ $fungsi->kode_fungsi }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.fungsi -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function loadTabContent(tab) {
            $.ajax({
                url: '/path/to/your/api/' + tab, 
                method: 'GET',
                success: function(data) {
                    $('.tab-content .tab-pane#' + tab).html(data);
                }
            });
        }
    </script>
@endpush
