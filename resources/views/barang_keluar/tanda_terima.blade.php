<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda Terima Barang Promosi</title>
    <style>
        h2 {
            text-align: center;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table:not(.items-table) {
            border: none;
        }

        .items-table {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .signature {
            margin-top: 40px;
            width: 100%;
        }

        .signature tr td {
            text-align: center;
            padding-top: 20px;
        }

        .signature .line {
            border-top: 1px solid black;
            width: 200px;
            margin: 0 auto;
        }

        @page {
            size: A4;
            margin: 2cm;
        }

        @media print {
            body {
                margin: 0;
                -webkit-print-color-adjust: exact;
            }

            .signature {
                page-break-inside: avoid;
            }
        }
    </style>

</head>

<body>

    <h2>TANDA TERIMA BARANG PROMOSI</h2>

    <table>
        @php
            use Carbon\Carbon;
        @endphp
        <tr>
            <td>Tanggal</td>
            <td>: {{ Carbon::parse($barangKeluar->tanggal_keluar)->format('d F Y') }}</td>
        </tr>
        <tr>
            <td>Dari</td>
            <td>: Retail Sales Regional Jatimbalinus</td>
        </tr>
        <tr>
            <td>Kepada</td>
            <td>: {{ $barangKeluar->sa->nama_sa }} || {{ $barangKeluar->fungsi->nama_fungsi }}</td>
        </tr>
        <tr>
            <td>Keperluan</td>
            <td>: {{ $barangKeluar->detailBarangKeluar->first()->keterangan ?? 'N/A' }} </td>
        </tr>
    </table>

    <table class="items-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangKeluar->detailBarangKeluar as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->barang->nama_barang }}</td>
                    <td>{{ $detail->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="signature">
        <tr>
            <td>Menyerahkan</td>
            <td>Penerima</td>
        </tr>
        <tr>
            <td></br></br></br>_______________________</td>
            <td></br></br></br>_______________________</td>
        </tr>
    </table>
    <table class="signature">
        <tr>
            <td>Mengetahui</td>
        </tr>
        <tr>
            <td></br></br></br>_______________________</td>
        </tr>
    </table>

</body>

</html>
