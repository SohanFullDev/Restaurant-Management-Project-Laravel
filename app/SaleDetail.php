<?php

namespace App;

use App\Sale;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    //
    public function sale(){
        return $this->belongsTo(Sale::class);
    }


}
