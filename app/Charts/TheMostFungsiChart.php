<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class TheMostFungsiChart
{
    protected $chart;

    public function __construct(LarapexChart $fungsiChart)
    {
        $this->chart = $fungsiChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $fungsi = DB::table('fungsi_jatimbalinus')->pluck('nama_fungsi')->toArray();
        $barang_keluar = DB::table('barang_keluar')
        ->join('fungsi_jatimbalinus', 'barang_keluar.barang_keluar_id', '=', 'fungsi_jatimbalinus.fungsi_id')
        ->select('fungsi_jatimbalinus.nama_fungsi', DB::raw('SUM(barang_keluar.barang_keluar_id) as total_permintaan')) // Menghitung total permintaan per fungsi
        ->groupBy('fungsi_jatimbalinus.nama_fungsi')
        ->pluck('total_permintaan')
        ->toArray(); 
        return $this->chart->horizontalBarChart()
            ->setTitle('Permintaan terbanyak')
            ->setColors(['#FFC107', '#D32F2F'])
            ->addData('Total Permintaan', $barang_keluar)
            ->setXAxis($fungsi);
    }
}
