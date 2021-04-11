<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'stock'
    ];

    public function productsimages(){
        return $this->hasMany(productsimages::class);
    }

    public function productsvariants(){
        return $this->hasOne(productsvariants::class);
    }
}