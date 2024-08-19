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
                            <a class="float-right" href="https://maps.app.goo.gl/gyMXkYmYcLM3r1TdA">Jagir Wonokromo No.88, Surabaya</a>
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
                        <li class="nav-item"><a class="nav-link active" href="#fungsi" data-toggle="tab">Fungsi</a></li>
                        <li class="nav-item"><a class="nav-link " href="#kategori" data-toggle="tab">Kategori</a></li>
                    </ul>
                </div>
                <!-- /.card-header -->
                <div class="tab-content">
                    <div class="active tab-pane" id="fungsi">
                        <!-- Main content -->
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Fungsi Kantor Jatimbalinus</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Nama Fungsi</th>
                                                <th>Kode Fungsi</th>
                                                <th>Label</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Retail Sales</td>
                                                <td>F001</td>
                                                <td><span class="badge bg-danger">55%</span></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>RPD</td>
                                                <td>F002</td>
                                                <td><span class="badge bg-warning">70%</span></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>HC</td>
                                                <td>F003</td>
                                                <td><span class="badge bg-primary">80%</span></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>IT</td>
                                                <td>F004</td>
                                                <td><span class="badge bg-success">90%</span></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>HSSE</td>
                                                <td>F005</td>
                                                <td><span class="badge bg-success">90%</span></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Finnace</td>
                                                <td>F006</td>
                                                <td><span class="badge bg-success">90%</span></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Commrel</td>
                                                <td>F007</td>
                                                <td><span class="badge bg-success">90%</span></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Legal</td>
                                                <td>F008</td>
                                                <td><span class="badge bg-success">90%</span></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Koperasi</td>
                                                <td>F009</td>
                                                <td><span class="badge bg-success">90%</span></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Internal Audit</td>
                                                <td>F010</td>
                                                <td><span class="badge bg-success">90%</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.fungsi -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
