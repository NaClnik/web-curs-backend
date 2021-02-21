<?php


namespace App\Services\Chickens;


use App\Models\Chicken;
use App\Services\Chickens\Repositories\ChickensRepository;
use Illuminate\Database\Eloquent\Collection;

class ChickensService
{
    // Репозитории.
    private ChickensRepository $chickensRepository;

    // Конструктор.
    public function __construct(ChickensRepository $chickensRepository) {
        $this->chickensRepository = $chickensRepository;
    } // __construct.

    public function getAllChickens(): Collection
    {
        return $this->chickensRepository->getAll();
    } // getAllChickens.

    public function createChickenFromArray(array $data): Chicken
    {
        return $this->chickensRepository->createFromArray($data);
    } // createChickenFromArray.

    public function updateChicken(Chicken $chicken, array $data): bool
    {
        return $this->chickensRepository->update($chicken, $data);
    } // updateChicken.

    public function deleteChicken(Chicken $chicken): bool
    {
        return $this->chickensRepository->delete($chicken);
    } // deleteChicken.
} // ChickensService.
