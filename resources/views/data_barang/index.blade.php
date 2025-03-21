@extends('layouts.welcome')

@section('content')
    <div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif
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
            <div class="card-tools float-right">
                <a class="btn btn-sm btn-success mt-1" href="{{ url('export/barang') }}">Export data</a>

                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
            </div>
            <table class="table-bordered table-striped table-hover table-sm table" id="table_barang">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Informasi Vendor</th>
                        <th>Stok</th>
                        <th>Harga Satuan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var dataBarang = $('#table_barang').DataTable({
                serverSide: true,
                responsive: true,
                stateSave: true,
                ajax: {
                    "url": "{{ url('barang/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.kategori_id = $('#kategori_id').val();
                        d._token = "{{ csrf_token() }}";
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }, {
                        data: "nama_barang",
                        className: "",
                        orderable: true,
                        searchable: true,
                        width: "300px"
                    }, {
                        data: "kategori.nama_kategori",
                        className: "",
                        orderable: true,
                        searchable: false,
                        width: "200px"
                    },
                    {
                        data: "vendor",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "stok",
                        className: "",
                        orderable: false,
                        searchable: false,
                        width: "80px"
                    },
                    {
                        data: "harga",
                        className: "",
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(data);
                        },
                        width: "150px"
                    },
                    {
                        data: "image",
                        render: function(data, type, row) {
                            return '<img src="{{ asset('storage/barang/') }}/' + row.image +
                                '"alt="Foto Barang" style="max-width: 300px; max-height: 300px">';
                        },
                        className: "",
                        orderable: false,
                        searchable: false,
                        widthh: "200px"
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false,
                        width: "150px"
                    }
                ]
            });
            $('#kategori_id').on('change', function() {
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush
