<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Money\Money;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMoneyRequest;
use App\Http\Requests\UpdateMoneyRequest;

class MoneyController extends Controller
{

    public function index()
    {
        //
    }




    public function store(StoreMoneyRequest $request)
    {
        //
    }






    public function update(UpdateMoneyRequest $request, Money $money)
    {
        //
    }


    public function destroy(Money $money)
    {
        //
    }
}
