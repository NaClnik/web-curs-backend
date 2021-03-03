<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Services\Reports\ReportsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    // Сервисы класса.
    private ReportsService $reportsService;

    // Конструктор.
    public function __construct(ReportsService $reportsService) {
        $this->reportsService = $reportsService;
    } // __construct.

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->reportsService->getAllReports());
    } // index.

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->reportsService->createReportFromArray($request->all());

        return response()->json([], 201);
    } // store.

    /**
     * Display the specified resource.
     *
     * @param Report $report
     * @return JsonResponse
     */
    public function show(Report $report)
    {
        return response()->json($report);
    } // show.

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Report $report
     * @return JsonResponse
     */
    public function update(Request $request, Report $report)
    {
        $this->reportsService->updateReport($report, $request->all());

        return response()->json([]);
    } // update.

    /**
     * Remove the specified resource from storage.
     *
     * @param Report $report
     * @return JsonResponse
     */
    public function destroy(Report $report)
    {
        $this->reportsService->deleteReport($report);

        return response()->json([], 204);
    } // destroy.
}
