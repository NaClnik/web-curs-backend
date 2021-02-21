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
     * @return Response
     */
    public function store(Request $request)
    {
        $this->chickensService->createChickenFromArray($request->all());

        return response('', 201);
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
     * @param Chicken $row
     * @return Response
     */
    public function update(Request $request, Chicken $row)
    {
        $this->chickensService->updateChicken($row, $request->all());

        return response('');
    } // update.

    /**
     * Remove the specified resource from storage.
     *
     * @param Chicken $row
     * @return JsonResponse
     */
    public function destroy(Chicken $row)
    {
        $this->chickensService->deleteChicken($row);

        return response()->json('', 204);
    } // destroy.
}
