<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

use Request; 
use Log;

class CmsConfig extends Model {

    use HasFactory;

    protected $table = 'configs';
    public $timestamps = false;

    protected $fillable = [
        'slug',
        'description',
        'value'
    ];
}
