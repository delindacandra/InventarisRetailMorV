@extends('layouts.welcome')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($detail_barang_masuk)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    @foreach ($detail_barang_masuk as $detail)
                        <tr>
                            <th>Barang</th>
                            <td>{{ $detail->barang->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>{{ $detail->jumlah }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $detail_barang_masuk->first()->keterangan }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ url('barang_masuk') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
