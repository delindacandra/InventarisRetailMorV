<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SlowMovingChart
{
    protected $chart;

    public function __construct(LarapexChart $slowMovingChart)
    {
        $this->chart = $slowMovingChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $sixMonthsAgo = Carbon::now()->subMonth(6);
        $slowMoving = DB::table('data_barang')
            ->join('stok_barang', 'data_barang.barang_id', '=', 'stok_barang.barang_id')
            ->leftJoin('detail_barang_keluar', 'data_barang.barang_id', '=', 'detail_barang_keluar.barang_id')
            ->select(
                'data_barang.nama_barang',
                'stok_barang.stok',
                DB::raw('COALESCE(MAX(detail_barang_keluar.created_at), "2024-01-01") as slow_mov') 
            )
            ->groupBy('data_barang.nama_barang', 'stok_barang.stok')
            ->havingRaw('slow_mov <= ?', [$sixMonthsAgo])
            ->orderBy('stok_barang.stok', 'asc')
            ->take(5)
            ->get();
        $labels = $slowMoving->pluck('nama_barang')->toArray();
        $data = $slowMoving->pluck('stok')->toArray();
        return $this->chart->barChart()
            ->setTitle('Barang tidak keluar selama 6 bulan terakhir')
            ->addData('Stok', $data)
            ->setXAxis($labels);
    }
}
