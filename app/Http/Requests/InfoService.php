<?php


namespace App\Http\Requests;


use App\Domain\Restaurants\Services\restaurantService;

/**
 * @property  InfoService
 * @property  InfoService
 */
class InfoService
{
    public function store(StoreRestaurantRequest $request, $validated)
    {
        $this->InfoService->store($request->$validated);
        return redirect()->route(restaurantService::class);
    }

}
