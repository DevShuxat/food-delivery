<?php

namespace App\Domain\Restaurant\Entities\Restaurant;

use App\Domain\Address\Address;
use App\Domain\Restaurant\ValueObjects\Menu\MenuItem;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = ['id'];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function setAddress(Address $address)
    {
        $this->address = $address->toArray();
    }

    public function getAddress()
    {
        return new Address($this->address['line1'], $this->address['line2'], $this->address['city'], $this->address['state'], $this->address['country'], $this->address['postal_code']);
    }
}
