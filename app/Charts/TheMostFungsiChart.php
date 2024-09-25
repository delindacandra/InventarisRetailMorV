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
    $data = DB::table('barang_keluar')
        ->join('fungsi_jatimbalinus', 'barang_keluar.fungsi_id', '=', 'fungsi_jatimbalinus.fungsi_id')
        ->select('fungsi_jatimbalinus.nama_fungsi', DB::raw('COUNT(barang_keluar.barang_keluar_id) as total_permintaan'))
        ->groupBy('fungsi_jatimbalinus.nama_fungsi')
        ->orderBy('fungsi_jatimbalinus.nama_fungsi', 'asc')
        ->get();

    $fungsi = $data->pluck('nama_fungsi')->toArray();
    $barang_keluar = $data->pluck('total_permintaan')->toArray();

    return $this->chart->horizontalBarChart()
        ->setTitle('Permintaan Terbanyak per Fungsi')
        ->setColors(['#FFC107', '#D32F2F'])
        ->addData('Total Permintaan', $barang_keluar)
        ->setXAxis($fungsi);
}

}
