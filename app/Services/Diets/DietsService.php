<?php


namespace App\Services\Diets;


use App\Models\Diet;
use App\Services\Diets\Repositories\DietsRepository;
use Illuminate\Database\Eloquent\Collection;

class DietsService
{
    // Репозитории.
    private DietsRepository $dietsRepository;

    // Конструктор.
    public function __construct(DietsRepository $dietsRepository) {
        $this->dietsRepository = $dietsRepository;
    } // __construct.

    public function getAllDiets(): Collection
    {
        return $this->dietsRepository->getAll();
    } // getAllDiets.

    public function createDietFromArray(array $data): Diet
    {
        return $this->dietsRepository->createFromArray($data);
    } // createDietFromArray.

    public function updateDiet(Diet $diet, array $data): bool
    {
        return $this->dietsRepository->update($diet, $data);
    } // updateDiet.

    public function deleteDiet(Diet $diet): bool
    {
        return $this->dietsRepository->delete($diet);
    } // deleteDiet.
} // DietsService.
