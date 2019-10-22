<?php

namespace App\Services\ShoppingCart;

use Illuminate\Support\Collection;

interface DriverContract
{
    public function has(CartLineContract $product);

    public function add(CartLineContract $product);

    public function remove(CartLineContract $product);

    public function increment(CartLineContract $product);

    public function decrement(CartLineContract $product);

    public function getLines(): Collection;
}
