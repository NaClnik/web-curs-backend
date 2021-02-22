<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * App\Models\Cell
 *
 * @property int $id
 * @property int $row_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chicken[] $chickens
 * @property-read int|null $chickens_count
 * @property-read \App\Models\Row $row
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Cell newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cell newQuery()
 * @method static \Illuminate\Database\Query\Builder|Cell onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Cell query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereRowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Cell withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Cell withoutTrashed()
 * @mixin \Eloquent
 */
class Cell extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'row_id',
        'user_id'
    ]; // fillable.

    public function chickens(){
        return $this->hasMany(Chicken::class);
    } // chickens.

    public function user(){
        return $this->belongsTo(User::class);
    } // employee.

    public function row(){
        return $this->belongsTo(Row::class);
    } // row.
}
