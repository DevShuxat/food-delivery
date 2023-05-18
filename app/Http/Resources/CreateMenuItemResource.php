<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method static all()
 * @method static create(array $array)
 * @method static find($id)
 */
class CreateMenuItemResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'restaurant_id' => $this->restaurant_id,
        ];
    }
}
