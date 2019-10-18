<?php

namespace App\Services\ShoppingCart\Drivers;

use App\Services\ShoppingCart\DriverContract;
use App\Services\ShoppingCart\CartLineContract;

class SessionDriver implements DriverContract
{
    public function add(CartLineContract $product)
    {
    }

    public function remove(CartLineContract $product)
    {
    }

    public function increment(CartLineContract $product)
    {
    }

    public function decrement(CartLineContract $product)
    {
    }

    public function getLines(): Collection
    {
    }
}
