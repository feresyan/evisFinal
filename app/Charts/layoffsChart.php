<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class layoffsChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->labels(['SP1'])
        ->options([
            'legend' => [
                'display' =>false,
                'labels' => [
                    'fontColor' =>'#ffffff',
                ]
            ],
            'title' => [
                'display' => true,
                'text' => 'Pegawai Yang diPHK',
            ],
        ]);
    }
}
