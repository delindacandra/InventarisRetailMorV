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
                            <b>Email</b>
                            <a class="float-right">{{ session('user.email') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Username</b>
                            <a class="float-right">{{ session('user.name') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fungsi</b>
                            <a class="float-right">Retail Sales</a>
                        </li>
                        <li class="list-group-item">
                            <b>Alamat</b>
                            <a class="float-right" href="https://maps.app.goo.gl/gyMXkYmYcLM3r1TdA">Jagir Wonokromo No.88,
                                Surabaya</a>
                        </li>
                    </ul>
                    <form action="{{ url('logout') }}" method="POST" class="btn btn-primary btn-block">
                        @csrf
                        <button type="submit" style="background: transparent; border: none; color: white;">Logout</button>
                    </form>
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
                            <a class="nav-link" href="#sa" data-toggle="tab"
                                onclick="loadTabContent('sa')">Sales Area</a>
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
                                    {{-- <a href="#" class="btn btn-primary float-right">Tambah</a> --}}
                                </div>
                                <div class="card-body">
                                    <div style="max-height: 300px; overflow-y:auto;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">No</th>
                                                    <th>Nama Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kategori as $kategori)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $kategori->nama_kategori }}</td>
                                                        <td>
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

                    <!-- salesarea -->
                    <div class="tab-pane" id="sa">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Sales Area Jatimbalinus</h3>
                                </div>
                                <div class="card-body">
                                    <div style="max-height: 300px; overflow-y:auto;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">No</th>
                                                    <th>Sales Area</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sa as $sa)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $sa->nama_sa }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.salesarea -->

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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($fungsi as $fungsi)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $fungsi->nama_fungsi }}</td>
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
