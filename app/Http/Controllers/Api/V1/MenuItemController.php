<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\MenuItems\MenuItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Http\Resources\MenuItem\CreateMenuItemResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class MenuItemController extends Controller
{
    public function index(Request $request)
    {

        $menu = MenuItem::all();
        return response()->json(['menu items is all' => $menu]);


    }


    // Store function
    public function store(Request $request)
    {
        // Validate the incoming request
        $this->validate($request, [
            'name' => 'required',
            'description' => 'requires|string',
            'price' => 'required|string',
            'restaurant_id' => 'required|integer',
            // Add more validation rules if needed
        ]);
        $data =[
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'restaurant_id' => $request->input('restaurant_id'),
        ];
        // Create a new resource
        $resource = MenuItem::create($data);

        // Return a response with the created resource
        return $this->respondWithResource($resource, 'Resource created successfully.', Response::HTTP_CREATED);
    }

    // Protected function to generate a response with the resource
    protected function respondWithResource($resource, $message, $status)
    {
        $response = [
            'message' => $message,
            'data' => $resource,
        ];

        return response()->json($response, $status);
    }


    public function show($id)
    {
        $menuItem = MenuItem::find($id);

        if (!$menuItem) {
            return response()->json([
                'error' => 'Item not found',
            ], 404);
        }

        return response()->json([
            'menuItem' => $menuItem,
        ]);
    }

    public function update(UpdateMenuItemRequest $request, $id)
    {
        $menuItem = CreateMenuItemResource::find($id);

        if (!$menuItem) {
            return response()->json([
                'error' => 'Item not found',
            ], 404);
        }

        $menuItem->name = $request->name;
        $menuItem->description = $request->description;
        $menuItem->price = $request->price;
        $menuItem->restaurant_id = $request->restaurant_id;
        $menuItem->save();

        return response()->json([
            'menuItem' => $menuItem,
        ]);
    }

    public function destroy($id)
    {
        $menuItem = CreateMenuItemResource::find($id);
        $menuItem->delete();
        return response()->json([
            'message' => 'Item deleted successfully',
        ]);
    }
}
