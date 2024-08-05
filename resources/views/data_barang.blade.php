@extends('layouts.welcome')

@section('content')
    <div>
        <p class="mb-4 pl-5 pr-5">"Barang promosi ini akan didistribusikan melalui berbagai saluran penjualan retail
            Pertamina, acara-acara promosi,
            pameran, dan event khusus yang diselenggarakan oleh Pertamina MOR V"</p>

        <div class="card-body">
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
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var dataBarang = $('#table_barang').DataTable({
                serverSide: true,
                responsive: true,
                ajax: {
                    "url": "{{ url('barang/list') }}",
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
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush
