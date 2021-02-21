<?php


namespace App\Services\Rows\Repositories;


use App\Models\Row;
use Illuminate\Database\Eloquent\Collection;

class RowsRepository
{

    public function getAll(): Collection
    {
        return Row::all();
    } // getAll.

    public function createFromArray(array $data): Row
    {
        return Row::query()->create($data);
    } // createFromArray.

    public function update(Row $row, array $data): bool
    {
        return $row->update($data);
    } // update.

    public function delete(Row $row): bool
    {
        return $row->delete();
    } // delete.
}
