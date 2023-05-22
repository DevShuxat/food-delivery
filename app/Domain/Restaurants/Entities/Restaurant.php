<?php

namespace App\Domain\Restaurants\Entities;

use App\Domain\Address;
use App\Domain\MenuItems\MenuItem;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 */
class Restaurant extends Model
{
    protected $guarded = ['id'];


    protected $fillable =
        [
            'name',
            'description',
            'address'

        ];

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
