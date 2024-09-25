<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PermintaanBarangChart
{
    protected $chart;

    public function __construct(LarapexChart $permintaanBarangChart)
    {
        $this->chart = $permintaanBarangChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $bulan = date('m');
        for($i=1; $i<=$bulan; $i++){
            $totalBarangKeluar = DB::table('barang_keluar')->whereMonth('tanggal_keluar',$i)->count('barang_keluar_id');
            $dataBulan[]= Carbon::create()->month($i)->format('F');
            $dataTotal[]=$totalBarangKeluar;
        }
        return $this->chart->lineChart()
            ->setTitle('Total permintaan barang perbulan ')
            ->addData('Total permintaan', $dataTotal)
            ->setHeight(275)
            ->setColors(['#28a745'])
            ->setXAxis($dataBulan);
    }
}
