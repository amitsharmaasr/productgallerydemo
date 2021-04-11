<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productsvariants extends Model
{
    //
    protected $fillable = [
       'size', 'color', 'quantity'
    ];

    public function products(){
        return $this->belongsTo(products::class);
    }
}
