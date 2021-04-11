<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productsimages extends Model
{
    protected $fillable = [
        'source'
    ];
    //
    public function products(){
        return $this->belongsTo(products::class);
    }
}
