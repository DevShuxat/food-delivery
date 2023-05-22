<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\MenuItems\MenuItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Http\Resources\CreateMenuItemResource;
use App\Http\Resources\MenuItemCollection;
use Illuminate\Http\Request;

/**
 * @method respondWithResourceCollection(MenuItemCollection $param, string $string)
 */
class MenuItemController extends Controller
{
    public function index(Request $request)
    {

        $resMenu = $request->restaurant();
        $menu = MenuItem::where('restaurant_id', $resMenu->id);
        return $this->respondWithResourceCollection(new MenuItemCollection($menu), 'this is all menu items' );


    }

    public function store(CreateMenuItemRequest $request)
    {
        $data = $request->validated();

        $menuItem = CreateMenuItemResource::create($data);

        return respondWithResource(new CreateMenuItemResource($menuItem), 'This is all menu items', 201);
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
