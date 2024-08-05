@extends('layouts.welcome')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="mt-3 pl-5 pr-5">Inventory Retail Sales | PT. PERTAMINA (PERSERO) MOR V</h3><br>
            <p class="mb-3 pl-5 pr-5"> "Barang promosi ini dirancang khusus untuk mendukung kegiatan pemasaran dan penjualan
                retail Pertamina di wilayah operasi MOR V. Produk-produk
                ini mencakup berbagai jenis merchandise yang menampilkan logo dan desain ikonik Pertamina, bertujuan untuk
                meningkatkan kesadaran merek dan loyalitas
                pelanggan."</p>
        </div>

        <div class="card-body">
            {{-- @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif --}}
        </div>
    </div>
@endsection
