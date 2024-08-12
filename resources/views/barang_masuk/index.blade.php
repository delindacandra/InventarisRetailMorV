@extends('layouts.welcome')

@section('content')
    <div>
        <p class="mb-4 pl-5 pr-5">"Barang promosi ini akan didistribusikan melalui berbagai saluran penjualan retail
            Pertamina, acara-acara promosi,
            pameran, dan event khusus yang diselenggarakan oleh Pertamina MOR V"</p>

        <div class="card-body">
            <div class="card-tools float-right">
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

            <table class="table-bordered table-striped table-hover table-sm table" id="table_barang_baru">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang Masuk</th>
                        <th>Tanggal Barang Masuk</th>
                        <th>Aksi</th>
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
            var dataBarang = $('#table_barang_baru').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('barang_masuk/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.barang_id = $('#barang_id').val();
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "kode_barang_masuk",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "tanggal_diterima",
                    className: "",
                    orderable: true,
                    searchable: true
                }, 
                {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }, 
            ]});

            $('#filter_date').on('change', function() {
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush
