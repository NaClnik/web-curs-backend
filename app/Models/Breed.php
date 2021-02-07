<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    public function diet(){
        $this->belongsTo(Diet::class);
    } // diet.

    public function chickens(){
        $this->hasMany(Chicken::class);
    } // chickens.
}
