<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Restaurants\Entities\Restaurant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Resources\Restaurant\RestaurantResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



class RestaurantController extends Controller
{
//    public $restaurantService;

    public function __construct(StoreRestaurantRequest $storeRestaurantRequest)
    {
        $this->storeRestaurantRequest = $storeRestaurantRequest;
    }


    public function index(): JsonResponse
    {
        $restaurants = Restaurant::all();

        return response()->json([
            'restaurants' => RestaurantResource::collection($restaurants),
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }

        return response()->json(['restaurant' => new RestaurantResource($restaurant)]);
    }

    public function store(StoreRestaurantRequest $storeRestaurantRequest)
    {
//        $this->validate($request, [
//            'name' => 'required|string',
//            'description' => 'required|string|max:255',
//            'address' => 'required|string',
//
//        ]);
//
//        $restaurant = [
//            'name' => $request->input('name'),
//            'description' => $request->input('description'),
//            'address' => $request->input('address')
//        ];
//        $resource = Restaurant::create($restaurant);
//    }
        $data = $storeRestaurantRequest->validated();
//        return $storeRestaurantRequest;
//
//
        $newRestaurant = Restaurant::create($data);
//
        return response()->json(['Restaurant created successfully.' => new RestaurantResource($newRestaurant)]);
    }
//        $newRestaurant->uploadSingleDocument($request);
//
//        return $this->respondWithResource(new RestaurantResource($newRestaurant), 'Restaurant successfully created!');


    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }
//        return $validatedData;

        $restaurant->responce($validatedData['name']);
        $restaurant->responce($validatedData['description']);
        $restaurant->responce($validatedData['address']);

        $this->restaurantService->updateRestaurant($restaurant);

        return response()->json(['message' => 'Restaurant updated successfully', 'restaurant' => new RestaurantResource($restaurant)]);
    }

    public function destroy(int $id): JsonResponse
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }

        Restaurant::destroy($id);
        return response()->json(['message' => 'Restaurant deleted successfully']);
    }
}




