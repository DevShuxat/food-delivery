<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method static all()
 * @method static create(array $array)
 * @method static find($id)
 */
class MenuItem extends JsonResource
{

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
