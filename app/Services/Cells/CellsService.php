<?php


namespace App\Services\Cells;


use App\Models\Cell;
use App\Services\Cells\Repositories\CellsRepository;
use Illuminate\Database\Eloquent\Collection;

class CellsService
{
    // Репозитории.
    private CellsRepository $cellsRepository;

    // Конструктор.
    public function __construct(CellsRepository $cellsRepository) {
        $this->cellsRepository = $cellsRepository;
    } // __construct.

    // Методы.
    public function getAllCells(): Collection
    {
        return $this->cellsRepository->getAll();
    } // getAllCells.

    public function createCellFromArray(array $data): Cell
    {
        return $this->cellsRepository->createFromArray($data);
    } // createCellFromArray.

    public function updateCell(Cell $cell, array $data): bool
    {
        $this->cellsRepository->update($cell, $data);
    } // updateCell.

    public function deleteCell(Cell $cell): bool
    {
        return $this->cellsRepository->delete($cell);
    } // deleteCell.
} // CellsService.
