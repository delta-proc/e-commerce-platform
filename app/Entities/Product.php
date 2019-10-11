<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /**
     * Get all products this product is contained by (if it's part of a package)
     *
     * @return BelongsToMany
     */
    public function packages()
    {
        return $this->belongsToMany(self::class, 'packages_products', 'product_id', 'package_id');
    }

    /**
     * Get all products contained by this product (if it's a package)
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
     * @return boolean
     */
    public function isPackage()
    {
        return ($this->children());
    }
}
