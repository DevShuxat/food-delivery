<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Http\Resources\CreateMenuItemResource;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = CreateMenuItemResource::all();

        return response()->json([
            'menuItems' => $menuItems,
        ]);
    }

    public function store(CreateMenuItemRequest $request)
    {
        $data = $request->validated();

        $menuItem = CreateMenuItemResource::create($data);

        return respondWithResource(new CreateMenuItemResource($menuItem),'This is all menu items', 201);
    }

    public function show($id)
    {
        $menuItem = CreateMenuItemResource::find($id);

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
