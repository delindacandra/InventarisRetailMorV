<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class Top5BarangChart
{
    protected $chart;

    public function __construct(LarapexChart $top5chart)
    {
        $this->chart = $top5chart;
    }


    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        $topBarang = DB::table('data_barang')
            ->join('stok_barang', 'data_barang.barang_id', '=', 'stok_barang.barang_id')
            ->orderBy('stok_barang.stok', 'desc')
            ->take(5)
            ->get();
        $labels = $topBarang->pluck('nama_barang')->toArray();
        $data = $topBarang->pluck('stok')->toArray();
        return $this->chart->barChart()
            ->setTitle('Berdasarkan stok terbanyak')
            ->addData('Stok', $data)
            ->setHeight(275)
            ->setXAxis($labels);
    }
}
