<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Chicken
 *
 * @property int $id
 * @property float $weight
 * @property int $age
 * @property int $number_of_eggs
 * @property int $breed_id
 * @property int $cell_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Breed $breed
 * @property-read \App\Models\Cell $cell
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereBreedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereCellId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereNumberOfEggs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chicken whereWeight($value)
 * @mixin \Eloquent
 */
class Chicken extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'age',
        'number_of_eggs',
        'breed_id',
        'cell_id'
    ]; // fillable.

    public function breed(){
        return $this->belongsTo(Breed::class);
    } // breed.

    public function cell(){
        return $this->belongsTo(Cell::class);
    } // cell.
}
