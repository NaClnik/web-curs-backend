<?php


namespace App\Services\Breeds;


use App\Models\Breed;
use App\Services\Breeds\Repositories\BreedsRepository;
use Illuminate\Database\Eloquent\Collection;

class BreedsService
{
    // Репозитории.
    private BreedsRepository $breedsRepository;

    // Конструктор.
    public function __construct(BreedsRepository $breedsRepository) {
        $this->breedsRepository = $breedsRepository;
    } // __construct.

    public function getAllBreeds(): Collection
    {
        return $this->breedsRepository->getAll();
    } // getAllBreeds.

    public function createBreedFromArray(array $data): Breed
    {
        return $this->breedsRepository->createFromArray($data);
    } // createBreedFromArray.

    public function updateBreed(Breed $breed, array $data): bool
    {
        return $this->breedsRepository->update($breed, $data);
    } // updateBreed.

    public function deleteBreed(Breed $breed): bool
    {
        return $this->breedsRepository->delete($breed);
    } // deleteBreed.
} // BreedsService.
