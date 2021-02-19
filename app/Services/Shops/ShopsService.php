<?php


namespace App\Services\Shops;


use App\Models\Shop;
use App\Services\Shops\Repositories\ShopsRepository;
use Illuminate\Database\Eloquent\Collection;

class ShopsService
{
    // Репозитории.
    private ShopsRepository $shopsRepository;

    // Конструктор.
    public function __construct(ShopsRepository $shopsRepository) {
        $this->shopsRepository = $shopsRepository;
    } // __construct.

    // Методы класса.
    public function getAllShops(): Collection
    {
        return $this->shopsRepository->getAll();
    } // getAllShops

    public function getShopById(int $id): Shop
    {
        return $this->shopsRepository->getById($id);
    } // getShopById.

    public function createShopFromArray(array $data): Shop
    {
        return $this->shopsRepository->createFromArray($data);
    } // createShopFromArray.

    public function deleteShop(Shop $user): bool
    {
        return $this->shopsRepository->delete($user);
    } // deleteShop.
} // ShopsService.
