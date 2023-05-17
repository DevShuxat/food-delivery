<?php

namespace App\Domain\Restaurant\ValueObjects\Menu;

use App\Domain\Restaurant\Entities\Restaurant\Restaurant;
use App\Domain\Restaurant\ValueObjects\Price;
use Illuminate\Database\Eloquent\Model;

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
