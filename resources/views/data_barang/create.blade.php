@extends('layouts.welcome')

@section('content')
    <div>

        <div class="card card-outline card-primary">

            <div class="card-body">
                <form method="POST" action="{{ url('barang') }}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-2 pl-5 control-label col-form-label">Kode Barang</label>
                        <div class="col-5">
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                value="{{ $newKodeBarang }}" readonly>
                            @error('kode_barang')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 pl-5 control-label col-form-label">Nama Barang</label>
                        <div class="col-5">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                value="{{ old('nama_barang') }}" required>
                            @error('nama_barang')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-2 pl-5 control-label col-form-label">Kategori</label>
                        <div class="col-5"> <select class="form-control" id="kategori_id" name="kategori_id" required>
                                <option value="">- Pilih Kategori Barang -</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->kategori_id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select> @error('kategori_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 pl-5 control-label col-form-label">Foto Barang</label>
                        <div class="col-5">
                            <input type="file" class="form-control-file mt-2" id="image" name="image">
                            @error('image')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 pl-5 control-label col-form-label">Jumlah Barang</label>
                        <div class="col-5">
                            <input type="number" class="form-control" id="stok" name="stok"
                                value="{{ old('stok') }}" required>
                            @error('stok')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 pl-5 control-label col-form-label">Harga Satuan</label>
                        <div class="col-5">
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ old('harga') }}" required>
                            @error('harga')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 pl-5 control-label col-form-label">Tanggal</label>
                        <div class="col-5">
                            <input type="date" class="form-control" id="tanggal_stok" name="tanggal_stok"
                                value="{{ old('tanggal_stok') }}" required>
                            @error('tanggal_stok')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{-- <label class="col-2 pl-5 control-label col-form-label">Kode Stok</label> --}}
                        <div class="col-5">
                            <input type="hidden" class="form-control" id="kode_stok" name="kode_stok"
                                value="{{ $newKodeStok }}" readonly>
                            @error('kode_stok')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 pl-5 control-label col-form-label"></label>
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('barang') }}">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
