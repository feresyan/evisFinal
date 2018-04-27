<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class myChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();


        $this->labels(['Ringan', 'Sedang', 'Berat'])
        ->options([
            'legend' => [
                'display' =>false,
                'labels' => [
                    'fontColor' =>'#ffffff',
                ]
            ],
            'title' => [
                'display' => true,
                'text' => 'Pelanggaran Pegawai Berdasarkan Kategori',
            ],
        ]);
    }
}
