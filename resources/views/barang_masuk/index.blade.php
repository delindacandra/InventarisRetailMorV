@extends('layouts.welcome')

@section('content')
    <div>
        <div class="card-body">
            <div class="card-tools float-right">
                <a class="btn btn-sm btn-success mt-1"
                    href="{{ url('export/barang_masuk?start_date=' . request('start_date') . '&end_date=' . request('end_date')) }}">Export
                    data</a>
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang_masuk/create') }}">Tambah</a>
            </div>
            <!-- Date range filter -->
            <div class="form-inline mb-3">
                <label for="start_date" class="mr-2">Start Date:</label>
                <input type="date" id="start_date" class="form-control mr-2">
                <label for="end_date" class="mr-2">End Date:</label>
                <input type="date" id="end_date" class="form-control">
                <button id="filter_date" class="btn btn-primary ml-2">Filter</button>
            </div>

            <table class="table table-bordered table-striped table-hover table-sm" id="table_barang_masuk">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var dataBarang = $('#table_barang_masuk').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('barang_masuk/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang_masuk.tanggal_diterima",
                        className: "",
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return data.split(' ')[0];
                        }
                    },
                    {
                        data: "barang.nama_barang",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "jumlah",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "keterangan",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ],
                drawCallback: function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var lastBarangMasukId = null;

                    api.column(1, {
                        page: 'current'
                    }).data().each(function(tanggal, i) {
                        var barangMasukId = api.row(i).data().barang_masuk_id;

                        if (barangMasukId === lastBarangMasukId) {
                            // Merge tanggal, keterangan, and aksi sel dan sembunyikan duplikasi
                            $(rows).eq(i).find('td:eq(1)').css('display', 'none'); // Tanggal
                            $(rows).eq(i).find('td:eq(4)').css('display', 'none'); // Keterangan
                            $(rows).eq(i).find('td:eq(5)').css('display', 'none'); // Aksi
                        } else {
                            var rowspanCount = api.rows(function(idx, data, node) {
                                return data.barang_masuk_id === barangMasukId;
                            }).count();

                            $(rows).eq(i).find('td:eq(1)').attr('rowspan',
                            rowspanCount); // Tanggal
                            $(rows).eq(i).find('td:eq(4)').attr('rowspan',
                            rowspanCount); // Keterangan
                            $(rows).eq(i).find('td:eq(5)').attr('rowspan',
                            rowspanCount); // Aksi
                        }
                        lastBarangMasukId = barangMasukId;
                    });
                }
            });

            $('#filter_date').on('click', function() {
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush
