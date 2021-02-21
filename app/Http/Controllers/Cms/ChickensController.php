<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Chicken;
use App\Services\Chickens\ChickensService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChickensController extends Controller
{
    // Сервисы.
    private ChickensService $chickensService;

    // Конструктор.
    public function __construct(ChickensService $rowsService) {
        $this->chickensService = $rowsService;
    } // __construct.

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->chickensService->getAllChickens());
    } // index.

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->chickensService->createChickenFromArray($request->all());

        return response()->json([], 201);
    } // store.

    /**
     * Display the specified resource.
     *
     * @param Chicken $chicken
     * @return JsonResponse
     */
    public function show(Chicken $chicken)
    {
        return response()->json($chicken);
    } // show.

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Chicken $chicken
     * @return JsonResponse
     */
    public function update(Request $request, Chicken $chicken)
    {
        $this->chickensService->updateChicken($chicken, $request->all());

        return response()->json([]);
    } // update.

    /**
     * Remove the specified resource from storage.
     *
     * @param Chicken $chicken
     * @return JsonResponse
     */
    public function destroy(Chicken $chicken)
    {
        $this->chickensService->deleteChicken($chicken);

        return response()->json([], 204);
    } // destroy.
}
