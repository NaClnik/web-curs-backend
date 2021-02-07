<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;

    public function cells(){
        return $this->hasMany(Cell::class);
    } // cells.

    public function shop(){
        return $this->belongsTo(Shop::class);
    } // shop.
}
