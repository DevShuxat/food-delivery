<?php

namespace App\Domain;


/**
 * @method static where(string $string, $id)
 * @method toArray()
 */
class Address
{
    public $region;
    private string $addressLine1;
    private string $addressLine2;
    private string $city;
    private string $state;
    private string $postalCode;

    public function __construct(
        string $addressLine1,
        string $addressLine2,
        string $city,
        string $region,
        string $postalCode
    )
    {
        $this->addressLine1 = $addressLine1;
        $this->addressLine2 = $addressLine2;
        $this->city = $city;
        $this->state = $region;
        $this->postalCode = $postalCode;
    }

    public function getAddressLine1(): string
    {
        return $this->addressLine1;
    }

    public function getAddressLine2(): string
    {
        return $this->addressLine2;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }
}
