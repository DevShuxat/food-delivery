<?php

namespace App\Domain\ValueObjects;

use InvalidArgumentException;

class Price
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw new InvalidArgumentException("Price must be a positive number.");
        }

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function add(Price $other)
    {
        return new Price($this->value + $other->value);
    }

    public function subtract(Price $other)
    {
        if ($this->value < $other->value) {
            throw new InvalidArgumentException("Cannot subtract a larger price from a smaller price.");
        }

        return new Price($this->value - $other->value);
    }
}
