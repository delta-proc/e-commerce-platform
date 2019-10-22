<?php

namespace App\Services\ShoppingCart;

interface CartLineContract
{
    /**
     * Accessor for unique cartline identifier.
     *
     * This should be unique for every model record implementing
     * the CartLineContract. For example use the FQCN + id.
     *
     * @return string
     */
    public function getCartIdentifierAttribute();
}
