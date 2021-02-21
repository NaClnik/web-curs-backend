<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Row;
use App\Services\Rows\RowsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RowsController extends Controller
{
    // Сервисы.
    private RowsService $rowsService;

    // Конструктор.
    public function __construct(RowsService $rowsService) {
        $this->rowsService = $rowsService;
    } // __construct.

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->rowsService->getAllRows());
    } // index.

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->rowsService->createRowFromArray($request->all());

        return response()->json([], 201);
    } // store.

    /**
     * Display the specified resource.
     *
     * @param Row $row
     * @return JsonResponse
     */
    public function show(Row $row)
    {
        return response()->json($row);
    } // show.

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Row $row
     * @return JsonResponse
     */
    public function update(Request $request, Row $row)
    {
        $this->rowsService->updateRow($row, $request->all());

        return response()->json([]);
    } // update.

    /**
     * Remove the specified resource from storage.
     *
     * @param Row $row
     * @return JsonResponse
     */
    public function destroy(Row $row)
    {
        $this->rowsService->deleteRow($row);

        return response()->json([], 204);
    } // destroy.
}
