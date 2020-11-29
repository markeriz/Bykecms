<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsCartBit extends Model {

    use HasFactory;
    
    protected $table = 'cart_bits';
    
    public function bit () {
        return $this->belongsTo('App\Models\CmsBit', 'bit_id');
    }
}
