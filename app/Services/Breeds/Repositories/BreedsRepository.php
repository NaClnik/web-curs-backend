<?php


namespace App\Services\Breeds\Repositories;


use App\Models\Breed;
use Illuminate\Database\Eloquent\Collection;

class BreedsRepository
{
    public function getAll(): Collection
    {
        return Breed::all();
    } // getAll.

    public function createFromArray(array $data): Breed
    {
        return Breed::query()->create($data);
    } // createFromArray.

    public function update(Breed $breed, array $data): bool
    {
        return $breed->update($data);
    } // update.

    public function delete(Breed $breed): bool
    {
        return $breed->delete();
    } // delete.
} // BreedsRepository.
