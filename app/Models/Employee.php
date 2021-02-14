<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $passport
 * @property string $salary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cell[] $cells
 * @property-read int|null $cells_count
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    use HasFactory;

    public function cells(){
        return $this->hasMany(Cell::class);
    } // cells.

    public function user()
    {
        return $this->hasOne(User::class);
    } // user.
} // Employee.
