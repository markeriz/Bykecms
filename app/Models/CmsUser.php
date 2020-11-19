<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

use Request; 
use Log;
use DB;

class CmsUser extends Model {

    use HasFactory;
    
    protected $table = 'users';

    protected $fillable = [
      'name',
      'email',
      'password',
      'bit_rights',
      'tag_rights',
      'cart_rights',
      'cart_edit_rights',
      'client_rights',
      'client_edit_rights',
      'webmaster_rights',
      'superadmin_rights'
    ];

}
