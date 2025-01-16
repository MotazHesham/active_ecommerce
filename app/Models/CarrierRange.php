<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\PreventDemoModeChanges;

class CarrierRange extends Model
{
    use HasFactory, PreventDemoModeChanges, Auditable;

    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function carrier_range_prices(){
    	return $this->hasMany(CarrierRangePrice::class);
    }
}
