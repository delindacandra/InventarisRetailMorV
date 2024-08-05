@extends('layouts.welcome')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    {{-- @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-error">{{ session('error') }}</div>
                    @endif --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-1 control-label col-form-label">Filter: </label>
                                <div class="col-3">
                                    <select class="form-control" name="kategori_id" id="kategori_id" required>
                                        <option value="">-- Semua --</option>
                                        @foreach ($kategori as $i)
                                            <option value="{{ $i->kategori_id }}">{{ $i->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Kategori Barang</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table-bordered table-striped table-hover table-sm table" id="table_barang">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang </th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th> Harga Satuan</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <form method="POST" action="{{ url('barang_masuk') }}" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-3 control-label col-form-label">Keterangan</label>
                            <div class="col-9">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 control-label col-form-label">Tanggal Barang Masuk</label>
                            <div class="col-9">
                                <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima"
                                    value="{{ old('tanggal_diterima') }}" required>
                                @error('tanggal_diterima')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <table class="table-bordered table-striped table-hover table-sm" id="table-barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang </th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th> Harga Satuan</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class="form-group row">
                            <label class="col-3 control-label col-form-label"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                <a class="btn btn-sm btn-default ml-1" href="{{ url('barang_masuk') }}">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var dataBarangMasuk = $('#table_barang').DataTable({
                serverSide: true,
                responsive: true,
                ajax: {
                    "url": "{{ url('barang_masuk/list_form') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.kategori_id = $('#kategori_id').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }, {
                        data: "kode_barang",
                        className: "",
                        orderable: false,
                        searchable: false
                    }, {
                        data: "nama_barang",
                        className: "",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "kategori.nama_kategori",
                        className: "",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "jumlah",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "harga",
                        className: "",
                        orderable: false,
                        searchable: false
                    }, {
                        data: "image",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $('#kategori_id').on('change', function() {
                dataBarangMasuk.ajax.reload();
            });
        });
    </script>
@endpush
