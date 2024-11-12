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
            <div class="card-tools float-right">
                <a class="btn btn-sm btn-success mt-1" href="{{ url('export/barang_keluar') }}">Export data</a>
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang_keluar/create') }}">Tambah</a>
            </div>
            <!-- Searchable -->
            <div class="form-inline mb-3">
                <label for="start_date" class="mr-2">Start Date:</label>
                <input type="date" id="start_date" class="form-control mr-2">
                <label for="end_date" class="mr-2">End Date:</label>
                <input type="date" id="end_date" class="form-control">
                <button id="filter_date" class="btn btn-primary ml-2">Filter</button>
            </div>
        </div>
        
        <table class="table-bordered table-striped table-hover table-sm table" id="table_barang_keluar">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Sales Area</th>
                    <th>Fungsi</th>
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
            var dataBarang = $('#table_barang_keluar').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('barang_keluar/list') }}",
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
                        data: "barang_keluar.tanggal_keluar",
                        className: "",
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return data.split(' ')[0];
                        }
                    },
                    {
                        data: "barang_keluar.sa.nama_sa",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang_keluar.fungsi.nama_fungsi",
                        className: "",
                        orderable: false,
                        searchable: false
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
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "keterangan",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                ],
                drawCallback: function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var lastBarangKeluarId = null;

                    api.column(1, {
                        page: 'current'
                    }).data().each(function(tanggal, i) {
                        var barangKeluarId = api.row(i).data().barang_keluar_id;

                        if (barangKeluarId === lastBarangKeluarId) {
                            // Merge tanggal, keterangan, and aksi sel dan sembunyikan duplikasi
                            $(rows).eq(i).find('td:eq(1)').css('display', 'none'); // Tanggal
                            $(rows).eq(i).find('td:eq(2)').css('display', 'none'); // SA
                            $(rows).eq(i).find('td:eq(3)').css('display', 'none'); // Fungsi
                            $(rows).eq(i).find('td:eq(6)').css('display', 'none'); // Keterangan
                            $(rows).eq(i).find('td:eq(7)').css('display', 'none'); // Aksi
                        } else {
                            var rowspanCount = api.rows(function(idx, data, node) {
                                return data.barang_keluar_id === barangKeluarId;
                            }).count();

                            $(rows).eq(i).find('td:eq(1)').attr('rowspan',
                                rowspanCount); // Tanggal
                            $(rows).eq(i).find('td:eq(2)').attr('rowspan',
                                rowspanCount); // SA
                            $(rows).eq(i).find('td:eq(3)').attr('rowspan',
                                rowspanCount); // Fungsi
                            $(rows).eq(i).find('td:eq(6)').attr('rowspan',
                                rowspanCount); // Keterangan
                            $(rows).eq(i).find('td:eq(7)').attr('rowspan',
                                rowspanCount); // Aksi 
                        }
                        lastBarangKeluarId = barangKeluarId;
                    });
                }
            });
            $('#filter_date').on('click', function() {
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush
