@extends('layouts.welcome')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                {{-- Searchbar --}}
                                <label class="col-2 control-label col-form-label">Cari Barang:</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="searchBar"
                                        placeholder="Masukkan nama barang">
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table-bordered table-striped table-hover table-sm table" id="table_barang">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Vendor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang->sortBy('nama_barang') as $barang)
                                <tr data-kategori="{{ $barang->kategori_id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->stok->stok }}</td>
                                    <td>{{ $barang->vendor }}</td>
                                    <td><button class="btn btn-success btn-sm tambah-barang"
                                            data-id="{{ $barang->barang_id }}" data-nama="{{ $barang->nama_barang }}"
                                            data-stok="{{ $barang->stok->stok }}" data-vendor="{{ $barang->vendor }}">
                                            <i class="fas fa-plus"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
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
                            {{-- <label class="col-3 control-label col-form-label">Kode Barang Masuk</label> --}}
                            <div class="col-9">
                                <input type="hidden" class="form-control" id="kode_barang_masuk" name="kode_barang_masuk"
                                    value="{{ $newKodeBarang }}" readonly>
                                @error('kode_barang_masuk')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

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


                        <table class="table-bordered table-striped table-hover table-sm table" id="table-barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Stok Saat Ini</th>
                                    <th>Vendor</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="barang-list">
                            </tbody>
                        </table>
                        <input type="hidden" name="items" id="items">
                        <div class="form-group row">
                            <div class="col-6">
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

@push('js')
    <script>
        $('#searchBar').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $("#table_barang tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('.tambah-barang').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var stok = $(this).data('stok');
            var jumlah = $(this).data('jumlah');
            var vendor = $(this).data('vendor');

            // Cek barang sudah ada di tabel barang atau belum
            var existingRow = $('#table-barang tbody tr[data-id="' + id + '"]');
            if (existingRow.length > 0) {
                // Jika barang sudah ada
                var inputJumlah = existingRow.find('input.jumlah');
                var newJumlah = parseInt(inputJumlah.val()) + 1;
                inputJumlah.val(newJumlah);
            } else {
                // Jika barang belum ada, tambah
                $('#table-barang tbody').append(
                    '<tr data-id="' + id + '"><td>' + ($('#table-barang tbody tr').length + 1) +
                    '</td><td class="nama">' + nama +
                    '</td><td class="stok">' + stok +
                    '</td><td><input type="text" class="form-control vendor" name="vendor" value="' + $(this)
                    .data('vendor') +
                    '"> </td><td><input type="number" class="form-control jumlah" value="1" min="1"></td></tr>'
                );

            }
            updateHiddenItems();
        });

        $('#table-barang').on('input', 'input.jumlah', function() {
            updateHiddenItems(); // Update data saat jumlah diubah
        });
        $('#table-barang').on('input', 'input.vendor', function() {
            updateHiddenItems(); // Update data saat vendor diubah
        });

        function updateHiddenItems() {
            var items = [];
            $('#table-barang tbody tr').each(function() {
                var id = $(this).data('id');
                var jumlah = $(this).find('input.jumlah').val();
                var vendor = $(this).find('input.vendor').val();
                items.push({
                    barang_id: id,
                    jumlah: jumlah,
                    vendor: vendor,
                });
            });
            $('#items').val(JSON.stringify(items));
        }
    </script>
@endpush
