<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Domain\Order;
use App\Services\Order\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->orderByDesc('created_at')->get();
        return response()->json(OrderResource::collection($orders));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        return response()->json(new OrderResource($order));
    }

    public function store(OrderRequest $request)
    {
       $this->validate($request, [
            'restaurant_id' => 'requred|foreignId',
            'user_id' => 'requred|foreignId',
            'status' => 'requred|boolean',
       ]);
    }

    public function update(OrderRequest $request, Order $order)
    {
        $this->authorize('update', $order);
        $order = $this->orderService->updateOrder($order, $request->all());
        return $this->respondWithResource(new OrderResource($order));

    }

    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        $this->orderService->deleteOrder($order);
        return response()->json(null, 204);
    }
}
