@extends('layouts.welcome')

@section('content')
    <div>
        <p class="mb-4 pl-5 pr-5">"Barang promosi ini akan didistribusikan melalui berbagai saluran penjualan retail
            Pertamina, acara-acara promosi,
            pameran, dan event khusus yang diselenggarakan oleh Pertamina MOR V"</p>

        <div class="card-body">
            <div class="card-tools float-right">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang_keluar/create') }}">Tambah</a>
            </div>
            <table class="table-bordered table-striped table-hover table-sm table" id="table_barang_keluar">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Keluar</th>
                        <th>Barang</th>
                        <th>Fungsi</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var dataBarang = $('#table_barang_keluar').DataTable({
                serverSide: true,
                scrollX: true,
                ajax: {
                    "url": "{{ url('barang_keluar/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.barang_id = $('#barang_id').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }, {
                        data: "tanggal_keluar",
                        className: "",
                        orderable: false,
                        searchable: false
                    }, {
                        data: "barang.nama_barang",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "fungsi.nama_fungsi",
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
                ]
            });
            $('#barang_id').on('change', function() {
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush
