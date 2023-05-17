<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMenuItem;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Http\Resources\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::all();

        return response()->json([
            'menuItems' => $menuItems,
        ]);
    }

    public function store(CreateMenuItem $request)
    {
        $menuItem = MenuItem::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'restaurant_id' => $request->restaurant_id,
        ]);

        return response()->json([
            'menuItem' => $menuItem,
        ], 201);
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
        $menuItem = MenuItem::find($id);

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
        $menuItem = MenuItem::find($id);

        if (!$menuItem) {
            return response()->json([
                'error' => 'Item not found',
            ], 404);
        }

        $menuItem->delete();

        return response()->json([
            'message' => 'Item deleted successfully',
        ]);
    }
}
