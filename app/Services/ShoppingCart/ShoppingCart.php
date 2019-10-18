<?php

namespace App\Services\ShoppingCart;

class ShoppingCart
{
    /**
     * The current driver implmentation.
     *
     * @var DriverContract
     */
    private $driver;

    public function __construct(DriverContract $driver)
    {
        $this->driver = $driver;
    }

    public function add(CartLineContract $product)
    {
        $this->driver->add($product);

        return $this;
    }

    public function remove(CartLineContract $product)
    {
        $this->driver->remove($product);

        return $this;
    }

    public function increment(CartLineContract $product)
    {
        $this->driver->increment($product);

        return $this;
    }

    public function decrement(CartLineContract $product)
    {
        $this->driver->decrement($product);

        return $this;
    }

    public function getLines()
    {
        return $this->driver->getLines();
    }
}
