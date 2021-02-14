<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Row
 *
 * @property int $id
 * @property int $shop_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cell[] $cells
 * @property-read int|null $cells_count
 * @property-read \App\Models\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|Row newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Row newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Row query()
 * @method static \Illuminate\Database\Eloquent\Builder|Row whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Row whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Row whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Row whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Row extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'shop_id'
    ]; // fillable.

    public function cells(){
        return $this->hasMany(Cell::class);
    } // cells.

    public function shop(){
        return $this->belongsTo(Shop::class);
    } // shop.
}
