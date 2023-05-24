<?php

namespace App\Http\Resources\MenuItem;

use FontLib\Table\Type\name;
use Illuminate\Http\Resources\Json\JsonResource;


class CreateMenuItemResource extends JsonResource
{

    public static function create(array $array)
    {

    }

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'restaurant_id' => $this->restaurant_id,
        ];
    }
}
