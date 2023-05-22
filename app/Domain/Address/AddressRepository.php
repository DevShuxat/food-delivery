<?php


namespace App\Domain;


// File: app/Domain/AddressRepository.php
interface AddressRepository
{
    public function findById(int $id): ?Address;

    public function save(Address $address): void;

    public function delete(Address $address): void;
}
