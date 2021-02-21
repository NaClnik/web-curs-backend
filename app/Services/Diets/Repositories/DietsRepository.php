<?php


namespace App\Services\Diets\Repositories;


use App\Models\Diet;
use Illuminate\Database\Eloquent\Collection;

class DietsRepository
{
    public function getAll(): Collection
    {
        return Diet::all();
    } // getAll.

    public function createFromArray(array $data): Diet
    {
        return Diet::query()->create($data);
    } // createFromArray.

    public function update(Diet $diet, array $data): bool
    {
        return $diet->update($data);
    } // update.

    public function delete(Diet $diet): bool
    {
        return $diet->delete();
    } // delete.
} // DietsRepository.
