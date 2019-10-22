<?php

namespace App\Http\Controllers;

use App\Services\ShoppingCart\ShoppingCart;
use App\Entities\Product;

class CartController extends Controller
{
    private $cart;

    public function __construct(ShoppingCart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * List all products in the cart.
     *
     * @param \App\Entities\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response()->json($cart->list(), 200);
    }

    /**
     * Add a product to the cart.
     *
     * @param \App\Entities\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Product $product)
    {
        $this->cart->add($product);

        return response()->json([], 201);
    }

    /**
     * Delete a product from the cart.
     *
     * @param \App\Entities\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $this->cart->delete($product);

        return response()->json([], 200);
    }

    /**
     * Increment a cartline.
     *
     * @param \App\Entities\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function increment()
    {
        $this->cart->increment($product);

        return response()->json([], 200);
    }

    /**
     * Decrement a cartline.
     *
     * @param \App\Entities\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function decrement()
    {
        $this->cart->decrement($product);

        return response()->json([], 200);
    }
}
