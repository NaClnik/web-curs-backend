<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Diet;
use App\Services\Diets\DietsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DietsController extends Controller
{
    // Сервисы.
    private DietsService $dietsService;

    // Конструктор.
    public function __construct(DietsService $dietsService) {
        $this->dietsService = $dietsService;
    } // __construct.

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->dietsService->getAllDiets());
    } // index.

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->dietsService->createDietFromArray($request->all());

        return response()->json([], 201);
    } // store.

    /**
     * Display the specified resource.
     *
     * @param Diet $diet
     * @return JsonResponse
     */
    public function show(Diet $diet)
    {
        return response()->json($diet);
    } // show.

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Diet $diet
     * @return JsonResponse
     */
    public function update(Request $request, Diet $diet)
    {
        $this->dietsService->updateDiet($diet, $request->all());

        return response()->json([]);
    } // update.

    /**
     * Remove the specified resource from storage.
     *
     * @param Diet $diet
     * @return JsonResponse
     */
    public function destroy(Diet $diet)
    {
        $this->dietsService->deleteDiet($diet);

        return response()->json([], 204);
    } // destroy.
} // DietsController.
