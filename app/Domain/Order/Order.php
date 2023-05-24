<?php

namespace App\Domain\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, int|string|null $id)
 */
class Order extends Model
{
    private int $id;
    private int $restaurantId;
    private array $items;
    private string $status;
    private float $totalAmount;

    public function __construct(int $id, int $restaurantId, array $items, string $status, float $totalAmount)
    {
        $this->id = $id;
        $this->restaurantId = $restaurantId;
        $this->items = $items;
        $this->status = $status;
        $this->totalAmount = $totalAmount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRestaurantId(): int
    {
        return $this->restaurantId;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }



}
