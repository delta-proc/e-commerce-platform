<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Services\ShoppingCart\CartLineContract;

class Product extends Model implements CartLineContract
{
    /**
     * Get all products this product is contained by (if it's part of a package).
     *
     * @return BelongsToMany
     */
    public function packages()
    {
        return $this->belongsToMany(self::class, 'packages_products', 'product_id', 'package_id');
    }

    /**
     * Get all products contained by this product (if it's a package).
     *
     * @return BelongsToMany
     */
    public function children()
    {
        return $this->belongsToMany(self::class, 'packages_products', 'package_id', 'product_id');
    }

    /**
     * Check if the product is a package
     * TODO: Maybe extract to it's own column...
     *
     * @return bool
     */
    public function isPackage()
    {
        return $this->children();
    }

    public function getCartIdentifierAttribute()
    {
        return self::class.":$this->id";
    }
}
