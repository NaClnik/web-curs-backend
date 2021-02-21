<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cell;
use App\Services\Cells\CellsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CellsController extends Controller
{
    // Сервисы.
    private CellsService $cellsService;

    // Конструктор.
    public function __construct(CellsService $cellsService) {
        $this->cellsService = $cellsService;
    } // __construct.

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->cellsService->getAllCells());
    } // index.

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->cellsService->createCellFromArray($request->all());

        return response()->json([], 201);
    } // store.

    /**
     * Display the specified resource.
     *
     * @param Cell $cell
     * @return JsonResponse
     */
    public function show(Cell $cell)
    {
        return response()->json($cell);
    } // show.

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Cell $cell
     * @return JsonResponse
     */
    public function update(Request $request, Cell $cell)
    {
        $this->cellsService->updateCell($cell, $request->all());

        return response()->json([]);
    } // update.

    /**
     * Remove the specified resource from storage.
     *
     * @param Cell $cell
     * @return JsonResponse
     */
    public function destroy(Cell $cell)
    {
        $this->cellsService->deleteCell($cell);

        return response()->json([], 204);
    } // destroy.
}
