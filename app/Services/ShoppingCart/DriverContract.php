<?php

namespace App\Services\ShoppingCart;

use Illuminate\Support\Collection;

interface DriverContract
{
    public function addLine(CartLineContract $product);

    public function removeLine(CartLineContract $product);

    public function incrementLine(CartLineContract $product);

    public function decrementLines(CartLineContract $product);

    public function getLines(): Collection;
}
