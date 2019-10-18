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

    public function addLine(CartLineContract $product)
    {
        $this->driver->addLine($product);

        return $this;
    }

    public function removeLine(CartLineContract $product)
    {
        $this->driver->removeLine($product);

        return $this;
    }

    public function incrementLine(CartLineContract $product)
    {
        $this->driver->incrementLine($product);

        return $this;
    }

    public function decrementLine(CartLineContract $product)
    {
        $this->driver->decrementLine($product);

        return $this;
    }

    public function getLines()
    {
        return $this->driver->getLines();
    }
}
