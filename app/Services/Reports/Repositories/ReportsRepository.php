<?php


namespace App\Services\Reports\Repositories;


use App\Models\Report;
use Illuminate\Database\Eloquent\Collection;

class ReportsRepository
{
    public function getAll(): Collection
    {
        return Report::all();
    } // getAll.

    public function getById(int $id): Report
    {
        return Report::query()->findOrFail($id);
    } // getById.

    public function createFromArray(array $data): Report
    {
        return Report::query()->create($data);
    } // createFromArray.

    public function update(Report $report, array $data): bool
    {
        return $report->update($data);
    } // update.

    public function delete(Report $report): bool
    {
        return $report->delete();
    } // delete.
} // ReportsRepository.
