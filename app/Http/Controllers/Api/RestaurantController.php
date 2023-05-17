<?php

namespace App\Http\Controllers\Api;

use App\Domain\Restaurants\Services\RestaurantService;
use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }


    public function index()
    {
        $restaurants = $this->restaurantService->getRestaurants();
        return RestaurantResource::collection($restaurants);
    }


    public function store(Request $request)
    {
        $restaurant = $this->restaurantService->createRestaurant($request->all());
        return new RestaurantResource($restaurant);
    }


    public function show($id)
    {
        $restaurant = $this->restaurantService->getRestaurant($id);
        return new RestaurantResource($restaurant);
    }


    public function update(Request $request, $id)
    {
        $restaurant = $this->restaurantService->updateRestaurant($id, $request->all());
        return new RestaurantResource($restaurant);
    }


    public function destroy($id)
    {
        $this->restaurantService->deleteRestaurant($id);
        return response()->json(['message' => 'RestaurantResource deleted']);
    }
}
