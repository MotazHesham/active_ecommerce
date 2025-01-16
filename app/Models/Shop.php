<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\PreventDemoModeChanges;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
  use PreventDemoModeChanges,SoftDeletes;


  protected $with = ['user'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  
  public function seller_package(){
    return $this->belongsTo(SellerPackage::class);
  }
  public function followers(){
    return $this->hasMany(FollowSeller::class);
  }
}
