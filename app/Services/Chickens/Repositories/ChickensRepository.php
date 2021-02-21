<?php


namespace App\Services\Chickens\Repositories;


use App\Models\Chicken;
use Illuminate\Database\Eloquent\Collection;

class ChickensRepository
{
    public function getAll(): Collection
    {
        return Chicken::all();
    } // getAll.

    public function createFromArray(array $data): Chicken
    {
        return Chicken::query()->create($data);
    } // createFromArray.

    public function update(Chicken $chicken, array $data): bool
    {
        return $chicken->update($data);
    } // update.

    public function delete(Chicken $chicken): bool
    {
        return $chicken->delete();
    } // delete.
}
