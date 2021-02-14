<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Diet
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Breed[] $breeds
 * @property-read int|null $breeds_count
 * @method static \Illuminate\Database\Eloquent\Builder|Diet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Diet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Diet extends Model
{
    use HasFactory;

    public function breeds(){
        return $this->hasMany(Breed::class);
    }
}
