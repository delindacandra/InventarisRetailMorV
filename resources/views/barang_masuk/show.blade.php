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
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                    @foreach ($detail_barang_masuk as $index => $detail)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $detail->barang->nama_barang }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            @if ($index === 0)
                                <td rowspan="{{ count($detail_barang_masuk) }}"
                                    style="text-align: center; vertical-align: middle;">
                                    {{ $detail_barang_masuk->first()->keterangan }}</td>
                            @endif

                        </tr>
                    @endforeach
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
