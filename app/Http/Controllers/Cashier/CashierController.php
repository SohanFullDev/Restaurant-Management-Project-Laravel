<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    //First page of cashier
    public function index(){
        return view('cashier.index');
    }

}
