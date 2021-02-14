<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cell
 *
 * @property int $id
 * @property int $row_id
 * @property int $employee_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chicken[] $chickens
 * @property-read int|null $chickens_count
 * @property-read \App\Models\Employee $employee
 * @property-read \App\Models\Row $row
 * @method static \Illuminate\Database\Eloquent\Builder|Cell newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cell newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cell query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereRowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cell extends Model
{
    use HasFactory;

    public function chickens(){
        return $this->hasMany(Chicken::class);
    } // chickens.

    public function employee(){
        return $this->belongsTo(Employee::class);
    } // employee.

    public function row(){
        return $this->belongsTo(Row::class);
    } // row.
}
