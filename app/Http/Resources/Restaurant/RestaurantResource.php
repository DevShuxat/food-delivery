<?php

namespace App\Http\Resources\Restaurant;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{

    public function toArray($request)
    {
        return [
          'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
        ];
    }
}
