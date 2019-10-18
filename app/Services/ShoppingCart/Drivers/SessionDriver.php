<?php

namespace App\Services\ShoppingCart\Drivers;

use App\Services\ShoppingCart\DriverContract;
use App\Services\ShoppingCart\CartLineContract;

class SessionDriver implements DriverContract
{
    public function addLine(CartLineContract $product)
    {
    }

    public function removeLine(CartLineContract $product)
    {
    }

    public function incrementLine(CartLineContract $product)
    {
    }

    public function decrementLines(CartLineContract $product)
    {
    }

    public function getLines(): Collection
    {
    }
}
