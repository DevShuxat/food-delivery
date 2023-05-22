<?php

// File: app/Domain/AddressService.php

namespace App\Domain;

class AddressService
{
    private AddressRepository $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function getById(int $id): ?Address
    {
        return $this->addressRepository->findById($id);
    }

    public function saveAddress(Address $address): void
    {
        $this->addressRepository->save($address);
    }

    public function deleteAddress(Address $address): void
    {
        $this->addressRepository->delete($address);
    }
}
