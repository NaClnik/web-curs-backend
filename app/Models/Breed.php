<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Breed
 *
 * @property int $id
 * @property string $name
 * @property float $performance
 * @property float $avg_weight
 * @property int $diet_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chicken[] $chickens
 * @property-read int|null $chickens_count
 * @property-read \App\Models\Diet $diet
 * @method static \Illuminate\Database\Eloquent\Builder|Breed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Breed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Breed query()
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereAvgWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereDietId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed wherePerformance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breed whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Breed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'performance',
        'avg_weight',
        'diet_id'
    ]; // fillable.

    public function diet(){
        return $this->belongsTo(Diet::class);
    } // diet.

    public function chickens(){
        return $this->hasMany(Chicken::class);
    } // chickens.
}
