<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Restaurants\Entities\Restaurant;
use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * @method respondWithResource(RestaurantResource $param, string $string)
 */
class RestaurantController extends Controller
{
    public $restaurantService;

    public function index(): JsonResponse
    {
        $restaurants = $this->restaurantService->getAllRestaurants();

        return response()->json([
            'restaurants' => RestaurantResource::collection($restaurants),
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $restaurant = $this->restaurantService->getRestaurantById($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }

        return response()->json(['restaurant' => new RestaurantResource($restaurant)]);
    }

    public function store(Request $request): JsonResponse
    {
//        $validatedData = $request->validate([
//            'name' => 'required|string',
//            'description' => 'required|text',
//            'address' => 'required|string',
//        ]);
//
//        $restaurant = new Restaurant(
//            $validatedData['name'],
//            $validatedData['description'],
//            $validatedData['address']
//        $this->restaurantService->createRestaurant($restaurant);
//        return response()->json(['message' => 'Restaurant created successfully', 'restaurant' => new RestaurantResource($restaurant)], 201);
//        );

        $data = $request->validated();


        $newRestaurant = Restaurant::create($data);

        $newRestaurant->uploadSingleDocument($request);

        return $this->respondWithResource(new RestaurantResource($newRestaurant), 'Restaurant successfully created!');
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|text',
            'address' => 'required|string',
        ]);

        $restaurant = $this->restaurantService->getRestaurantById($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }

        $restaurant->setName($validatedData['name']);
        $restaurant->setDescription($validatedData['description']);
        $restaurant->setAddress($validatedData['address']);

        $this->restaurantService->updateRestaurant($restaurant);

        return response()->json(['message' => 'Restaurant updated successfully', 'restaurant' => new RestaurantResource($restaurant)]);
    }

    public function destroy(int $id): JsonResponse
    {
        $restaurant = $this->restaurantService->getRestaurantById($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }

        $this->restaurantService->deleteRestaurant($restaurant);

        return response()->json(['message' => 'Restaurant deleted successfully']);
    }
}




