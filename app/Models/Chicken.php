<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chicken extends Model
{
    use HasFactory;

    public function breed(){
        return $this->belongsTo(Breed::class);
    } // breed.

    public function cell(){
        return $this->belongsTo(Cell::class);
    } // cell.
}
