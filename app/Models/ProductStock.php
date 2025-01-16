<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\PreventDemoModeChanges;

class ProductStock extends Model
{
    use PreventDemoModeChanges,Auditable;

    protected $fillable = ['product_id', 'variant', 'sku', 'price', 'qty', 'image'];
    //
    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public function wholesalePrices() {
        return $this->hasMany(WholesalePrice::class);
    }
}
