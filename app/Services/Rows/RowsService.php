<?php


namespace App\Services\Rows;


use App\Models\Row;
use App\Services\Rows\Repositories\RowsRepository;
use Illuminate\Database\Eloquent\Collection;

class RowsService
{
    // Репозитории.
    private RowsRepository $rowsRepository;

    // Конструктор.
    public function __construct(RowsRepository $rowsRepository) {
        $this->rowsRepository = $rowsRepository;
    } // __construct.

    public function getAllRows(): Collection
    {
        return $this->rowsRepository->getAll();
    } // getAllRows.

    public function createRowFromArray(array $data): Row
    {
        return $this->rowsRepository->createFromArray($data);
    } // createRowFromArray.

    public function updateRow(Row $row, array $data): bool
    {
        return $this->rowsRepository->update($row, $data);
    } // updateRow.

    public function deleteRow(Row $row): bool
    {
        return $this->rowsRepository->delete($row);
    } // deleteRow.
}
