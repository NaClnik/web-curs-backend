<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Breed;
use App\Services\Breeds\BreedsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BreedsController extends Controller
{
    // Сервисы.
    private BreedsService $breedsService;

    // Конструктор.
    public function __construct(BreedsService $breedsService) {
        $this->breedsService = $breedsService;
    } // __construct.

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->breedsService->getAllBreeds());
    } // index.

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->breedsService->createBreedFromArray($request->all());

        return response('', 201);
    } // store.

    /**
     * Display the specified resource.
     *
     * @param Breed $breed
     * @return JsonResponse
     */
    public function show(Breed $breed)
    {
        return response()->json($breed);
    } // show.

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Breed $breed
     * @return Response
     */
    public function update(Request $request, Breed $breed)
    {
        $this->breedsService->updateBreed($breed, $request->all());

        return response('');
    } // update.

    /**
     * Remove the specified resource from storage.
     *
     * @param Breed $breed
     * @return JsonResponse
     */
    public function destroy(Breed $breed)
    {
        $this->breedsService->deleteBreed($breed);

        return response()->json('', 204);
    } // destroy.
}
