<?php

namespace App\Domain\MenuItems;

use App\Domain\Restaurants\Entities\Restaurant;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static find($id)
 * @method static create()
 */
class MenuItem extends Model
{
    protected $guarded = ['id'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function setPrice(Price $price)
    {
        $this->price = $price->toArray();
    }

    public function getPrice()
    {
        return new Price($this->price['amount'], $this->price['currency']);
    }
}
