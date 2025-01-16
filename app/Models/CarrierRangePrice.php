<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\PreventDemoModeChanges;

class CarrierRangePrice extends Model
{
    use HasFactory, PreventDemoModeChanges, Auditable;

    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function carrier_ranges()
    {
        return $this->belongsTo(CarrierRange::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
