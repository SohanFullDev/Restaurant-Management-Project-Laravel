<?php

namespace App\Http\Controllers\Cashier;

use App\Table;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CashierController extends Controller
{
    //First page of cashier
    public function index(){
        $catetegories = Category::all();

        return view('cashier.index')->with('categories', $catetegories);
    }

    public function getTables(){
        $tables = Table::all();
        $html = '';
        foreach($tables as $table){
            $html .= '<div class="col-md-2 mb-4">';
            //$html .= $table->name;
            $html .= '<button class="btn btn-primary">
            <img class="img-fluid" src="'.url('/images/table.svg').'"/>
            <br>
            <span class="badge badge-success">'.$table->name.'</span>

            </button>';
            $html .= '</div>';
        }
        return $html;

    }

}
