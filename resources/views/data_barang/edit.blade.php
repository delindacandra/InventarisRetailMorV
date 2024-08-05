@extends('layouts.welcome')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body"> @empty($barang)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div> <a href="{{ url('barang') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/barang/' . $barang->barang_id) }}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf {!! method_field('PUT') !!} <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Kode Barang</label>
                        <div class="col-9"> <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                value="{{ old('kode_barang', $barang->kode_barang) }}" required> @error('kode_barang')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Nama Barang</label>
                        <div class="col-9"> <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                value="{{ old('nama_barang', $barang->nama_barang) }}" required> @error('nama_barang')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Kategori</label>
                        <div class="col-9"> <select class="form-control" id="kategori_id" name="kategori_id" required>
                                <option value="">- Pilih Kategori -</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->kategori_id }}" @if ($item->kategori_id == $barang->kategori_id) selected @endif>
                                        {{ $item->nama_kategori }}</option>
                                @endforeach
                            </select> @error('kategori_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Stok</label>
                        <div class="col-9"> <input type="number" class="form-control" id="jumlah" name="jumlah"
                                value="{{ old('jumlah', $barang->jumlah) }}" required> @error('jumlah')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Harga Barang</label>
                        <div class="col-9"> <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ old('harga', $barang->harga) }}" required> @error('harga')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label col-form-label">Foto</label>
                        <div class="col-9">
                            @if ($barang->image)
                                <img src="{{ asset('storage/barang/' . $barang->image) }}" alt="Foto Barang"
                                    style="max-width: 500px;">
                                <br>
                            @endif
                            <input type="file" class="form-control-file" id="image" name="image"
                                accept="image/png, image/jpeg, image/jpg">
                            @error('image')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row"> <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11"> <button type="submit" class="btn btn-primary btn-sm">Simpan</button> <a
                                class="btn btn-sm btn-default ml-1" href="{{ url('barang') }}">Kembali</a> </div>
                    </div>
                </form>
            @endempty
        </div>
    </div>
    @endsection @push('css')
@endpush
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var levelNameInput = document.getElementById('nama_barang');

            levelNameInput.addEventListener('input', function() {
                this.value = this.value.replace(/\d+/g, '');
            });
        });
    </script>
@endpush
