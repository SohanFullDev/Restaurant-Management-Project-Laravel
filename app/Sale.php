<?php

namespace App;

use App\SaleDetail;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    public function saleDetails(){
        return $this->hasMany(SaleDetail::class);

    }
}
