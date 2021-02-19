<?php


namespace App\Services\Shops\Repositories;


use App\Models\Shop;
use Illuminate\Database\Eloquent\Collection;

class ShopsRepository
{
    public function getAll(): Collection
    {
        return Shop::all();
    } // getAll.

    public function getById(int $id): Shop
    {
        return Shop::query()->findOrFail($id);
    } // getById.

    public function createFromArray(array $data): Shop
    {
        return Shop::query()->create($data);
    } // createFromArray.

    public function delete(Shop $shop): bool
    {
        return $shop->delete();
    } // delete.
} // ShopsRepository.
