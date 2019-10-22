<?php

namespace App\Services\ShoppingCart\Drivers;

use Illuminate\Contracts\Session\Session;
use App\Services\ShoppingCart\DriverContract;
use App\Services\ShoppingCart\CartLineContract;

class SessionDriver implements DriverContract
{
    const SESSION_KEY = 'shopping_cart';

    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function has(CartLineContract $product)
    {
        $lines = collect($this->session->get(self::SESSION_ID));

        return $lines->contains('cart_identifier', $product);
    }

    public function add(CartLineContract $product)
    {
        if ($this->has($product)) {
            $this->increment($product);

            return;
        }

        $this->session->push(self::SESSION_KEY, $product);
    }

    public function remove(CartLineContract $product)
    {
        if ($this->has($product)) {
            $lines = collect($this->session->get(self::SESSION_KEY));

            $newLines = $lines->reject(function ($line) use ($product) {
                return $line->cart_identifier === $product->cart_identifier;
            });

            $this->session->set(self::SESSION_KEY, $newLines->toArray());
        }
    }

    public function increment(CartLineContract $product)
    {
        if (!$this->has($product)) {
            return;
        }

        $lines = collect($this->session->get(self::SESSION_KEY));

        $newLines = $lines->map(function ($line) use ($product) {
            if ($line->cart_identifier === $product->cart_identifier) {
                ++$line->amount;
            }

            return $line;
        });

        $this->session->set(self::SESSION_KEY, $newLines->toArray());
    }

    public function decrement(CartLineContract $product)
    {
        if (!$this->has($product)) {
            return;
        }

        $lines = collect($this->session->get(self::SESSION_KEY));

        $newLines = $lines->map(function ($line) use ($product) {
            if ($line->cart_identifier === $product->cart_identifier) {
                --$line->amount;
            }

            return $line;
        });

        $this->session->set(self::SESSION_KEY, $newLines->toArray());
    }

    public function getLines(): Collection
    {
        return collect($this->session->get(self::SESSION_KEY) ?? []);
    }
}
