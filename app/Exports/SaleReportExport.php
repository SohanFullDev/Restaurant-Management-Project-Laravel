<?php

namespace App\Exports;
use App\Sale;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\FromCollection;

class SaleReportExport implements FromView
{
    private $datepicker;
    private $datepicker2;
    private $sales;
    private $totalSale;


    public function __construct($datepicker, $datepicker2){

        $datepicker = date("Y-m-d H:i:s", strtotime($datepicker));
        $datepicker2 = date("Y-m-d H:i:s", strtotime($datepicker2));
        $sales = Sale::whereBetween('updated_at', [$datepicker, $datepicker2])->where('sale_status','paid')->get();
        $totalSale = $sales->sum('total_price');
        $this->datepicker = $datepicker;
        $this->datepicker2 = $datepicker2;
        $this->sales = $sales;
        $this->totalSale = $totalSale;

    }

    public function view(): View
    {
        return view('exports.salereport',[
            'sales' => $this->sales,
            'totalSale' => $this->totalSale,
            'datepicker' => $this->datepicker,
            'datepicker2' => $this->datepicker2

        ]);
    }
}
