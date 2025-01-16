<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\PreventDemoModeChanges;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use PreventDemoModeChanges,Auditable, SoftDeletes;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function pickup_point()
    {
        return $this->belongsTo(PickupPoint::class);
    }

    public function refund_request()
    {
        return $this->hasOne(RefundRequest::class);
    }

    public function affiliate_log()
    {
        return $this->hasMany(AffiliateLog::class);
    }
}
