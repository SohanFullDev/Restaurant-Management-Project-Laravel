<?php

namespace App\Http\Controllers\Cashier;

use App\Menu;
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
            $html .= '<button class="btn btn-primary btn-table" data-id="'.$table->id.'" data-name="'.$table->name.'">
            <img class="img-fluid" src="'.url('/images/table.svg').'"/>
            <br>
            <span class="badge badge-success">'.$table->name.'</span>

            </button>';
            $html .= '</div>';
        }
        return $html;

    }

    public function getMenuByCategory($catetegory_id){
        $menus = Menu::where('category_id', $catetegory_id)->get();
        $html = '';
        foreach($menus as $menu){
            $html .= '
            <div class="col-md-3 text-center">
                <a class="btn btn-outline-secondary btn-menu" data-id="'.$menu->id.'">
                <img class="img-fluid" src="'.url('/menu_images/'.$menu->image).'">
                <br>
                '.$menu->name.'
                <br>
                $'.number_format($menu->price).'

                </a>

            </div>

            ';

        }
        return $html;


    }

    public function orderFood(Request $request){
        return $request->menu_id;
    }

}
