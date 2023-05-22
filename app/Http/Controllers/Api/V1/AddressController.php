<?php

namespace App\Http\Controllers\Api\V1;


use App\Domain\Address;
use App\Domain\AddressService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class AddressController extends Controller
{
    private AddressService $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    public function show(int $id): JsonResponse
    {
        $address = $this->addressService->getById($id);

        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        return response()->json(['address' => new AddressResource($address)]);
    }

    public function store(Request $request): JsonResponse
    {

        $user = $request->user();
        $userAddress = Address::where('user_id',$user->id);
        return $this->respondWithResources(new AddressResource($userAddress));


//        $validatedData = $request->validate([
//            'address_line1' => 'required|string',
//            'address_line2' => 'nullable|string',
//            'city' => 'required|string',
//            'state' => 'required|string',
//            'postal_code' => 'required|string',
//        ]);
//
//        $address = new Address(
//            $validatedData['address_line1'],
//            $validatedData['address_line2'] ?? '',
//            $validatedData['city'],
//            $validatedData['state'],
//            $validatedData['postal_code']
//        );
//
//        $this->addressService->saveAddress($address);
//
//        return response()->json(['message' => 'Address created successfully', 'address' => new AddressResource($address)], 201);
    }

    public function delete(int $id): JsonResponse
    {
        $address = $this->addressService->getById($id);

        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        $this->addressService->deleteAddress($address);

        return response()->json(['message' => 'Address deleted successfully']);
    }
}
