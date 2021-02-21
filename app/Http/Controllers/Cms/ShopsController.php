<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Services\Shops\ShopsService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShopsController extends Controller
{
    // Сервисы класса.
    private ShopsService $shopsService;

    // Конструктор.
    public function __construct(ShopsService $shopsService) {
        $this->shopsService = $shopsService;
    } // __construct.

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->shopsService->getAllShops());
    } // index.

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->shopsService->createShopFromArray($request->all());

        return response('', 201);
    } // store.

    /**
     * Display the specified resource.
     *
     * @param Shop $shop
     * @return JsonResponse
     */
    public function show(Shop $shop)
    {
        try {
            return response()->json($shop);
        } catch (ModelNotFoundException $modelNotFoundException){
            return response()->json([], 204);
        } // catch.
    } // show.

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Shop $shop
     * @return Response
     */
    public function update(Request $request, Shop $shop)
    {
        $this->shopsService->updateShop($shop, $request->all());

        return response('');
    } // update.

    /**
     * Remove the specified resource from storage.
     *
     * @param Shop $shop
     * @return Application|ResponseFactory|JsonResponse|Response
     */
    public function destroy(Shop $shop)
    {
        try {
            $this->shopsService->deleteShop($shop);
        } catch (Exception $exception){
            return response()->json(['error' => $exception->getMessage()], 404);
        } // catch.

        return response('', 204);
    } // destroy.
}
