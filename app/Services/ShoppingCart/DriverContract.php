<?php

namespace App\Services\ShoppingCart;

use Illuminate\Support\Collection;

interface DriverContract
{
    /**
     * Check if the cart contains a specific item.
     *
     * @param CartLineContract $product
     *
     * @return bool
     */
    public function has(CartLineContract $product);

    /**
     * Add an item to the cart.
     *
     * @param CartLineContract $product
     */
    public function add(CartLineContract $product);

    /**
     * Remove an item from the cart.
     *
     * @param CartLineContract $product
     */
    public function remove(CartLineContract $product);

    /**
     * Increment amount for product.
     *
     * @param CartLineContract $product
     */
    public function increment(CartLineContract $product);

    /**
     * Decrement amount for product.
     *
     * @param CartLineContract $product
     */
    public function decrement(CartLineContract $product);

    /**
     * Get a collection of all lines in the cart.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getLines(): Collection;
}
