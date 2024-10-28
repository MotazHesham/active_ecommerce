<?php

namespace App\Observers;

use App\Jobs\CreateProduct;
use App\Models\Product;

class ProductObserver
{
    public function created(Product $product){
        // CreateProduct::dispatch($product);
    }
}
