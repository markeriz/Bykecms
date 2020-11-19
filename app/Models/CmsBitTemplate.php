<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class CmsBitTemplate extends Model {

    use HasFactory;

    protected $table = 'bit_templates';

    protected $fillable = [
      'slug',
      'name'
    ];

}
