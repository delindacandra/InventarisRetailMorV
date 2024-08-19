@extends('layouts.welcome')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
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
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $barang)
                                <tr data-kategori="{{ $barang->kategori_id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->kategori->nama_kategori }}</td>
                                    <td>{{ $barang->stok->stok }}</td>
                                    <td><button class="btn btn-success btn-sm tambah-barang"
                                            data-id="{{ $barang->barang_id }}"
                                            data-nama="{{ $barang->nama_barang }}"
                                            data-kategori="{{ $barang->kategori->nama_kategori }}"
                                            data-stok="{{ $barang->stok->stok }}">
                                            Tambah</button></td>
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
                            <label class="col-3 control-label col-form-label">Kode Barang Masuk</label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="kode_barang_masuk" name="kode_barang_masuk"
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
                                    <th>Kategori</th>
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

@push('css')
@endpush


@push('js')
    <script>
        $('#kategori_id').change(function() {
            var selectedKategori = $(this).val();
            $('#table_barang tbody tr').each(function() {
                var rowKategori = $(this).data('kategori');
                if (selectedKategori === "" || rowKategori == selectedKategori) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        $('.tambah-barang').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var kategori = $(this).data('kategori');
            var stok = $(this).data('stok');
            var jumlah = $(this).data('jumlah');

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
                    '</td><td class="kategori">' + kategori +
                    '</td><td class="stok">' + stok +
                    '</td><td><input type="number" class="form-control jumlah" value="1" min="1"></td></tr>'
                );

            }
            // Update input tersembunyi dengan data barang
            updateHiddenItems();
        });

        function updateHiddenItems() {
            var items = [];
            $('#table-barang tbody tr').each(function() {
                var id = $(this).data('id');
                var jumlah = $(this).find('input.jumlah').val();
                items.push({
                    barang_id: id,
                    jumlah: jumlah
                });
            });
            $('#items').val(JSON.stringify(items));
        }
    </script>
@endpush
