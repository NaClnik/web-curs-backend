<?php


namespace App\Services\Cells\Repositories;


use App\Models\Cell;
use Illuminate\Database\Eloquent\Collection;

class CellsRepository
{
    public function getAll(): Collection
    {
        return Cell::all();
    } // getAll.

    public function createFromArray(array $data): Cell
    {
        return Cell::query()->create($data);
    } // createFromArray.

    public function update(Cell $cell, array $data): bool
    {
        return $cell->update($data);
    } // update.

    public function delete(Cell $cell): bool
    {
        return $cell->delete();
    } // delete.
} // CellsRepository.
