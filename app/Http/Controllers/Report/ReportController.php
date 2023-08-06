<?php

namespace App\Http\Controllers\Report;

use App\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index(){
        return view('report.index');
    }

    public function show(Request $request){
        $request->validate([
            'datepicker' => 'required',
            'datepicker2' => 'required'
        ]);
        $datepicker = date("Y-m-d H:i:s", strtotime($request->datepicker.' 00:00:00'));
        $datepicker2 = date("Y-m-d H:i:s", strtotime($request->datepicker2.' 23:59:59'));
        $sales = Sale::whereBetween('updated_at', [$datepicker, $datepicker2])->where('sale_status','paid');

        return view('report.showReport')->with('datepicker', date("m/d/Y H:i:s", strtotime($request->datepicker.' 00:00:00')))->with('datepicker2', date("m/d/Y H:i:s", strtotime($request->datepicker2.' 23:59:59')))->with('totalSale', $sales->sum('total_price'))->with('sales', $sales->paginate(5));

    }
}
