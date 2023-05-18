<?php


namespace App\Domain\Restaurants\Services;


use App\Domain\Restaurant\Entities\Restaurant\Restaurant;


class RestaurantService
{

    public $Restauarant;

    public function __construct(Restaurant $Restaurant)
    {
        $this->Restauarant = $Restaurant;
    }

}
