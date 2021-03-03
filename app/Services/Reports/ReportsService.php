<?php


namespace App\Services\Reports;


use App\Models\Report;
use App\Services\Reports\Repositories\ReportsRepository;
use Illuminate\Database\Eloquent\Collection;

class ReportsService
{
    // Репозитории.
    private ReportsRepository $reportsRepository;

    // Конструктор.
    public function __construct(ReportsRepository $reportsRepository) {
        $this->reportsRepository = $reportsRepository;
    } // __construct.

    // Методы класса.
    public function getAllReports(): Collection
    {
        return $this->reportsRepository->getAll();
    } // getAllReports.

    public function getReportById(int $id): Report
    {
        return $this->reportsRepository->getById($id);
    } // getReportById.

    public function createReportFromArray(array $data): Report
    {
        return $this->reportsRepository->createFromArray($data);
    } // createReportFromArray.

    public function updateReport(Report $report, array $data)
    {
        return $this->reportsRepository->update($report, $data);
    } // updateReport.

    public function deleteReport(Report $user): bool
    {
        return $this->reportsRepository->delete($user);
    } // deleteReport.
} // ReportsService.
