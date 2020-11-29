<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Iatstuti\Database\Support\NullableFields;
use Request; 

class CmsCart extends Model {
    protected $table = 'carts';   

    public function cart_items () {
        return $this->hasMany('App\Models\CmsCartBit', 'cart_id')->orderBy('id', 'asc');
    }

    public function payment_method () {
        return $this->belongsTo('App\Models\CmsPaymentMethod');
    }
}
