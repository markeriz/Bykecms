<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class CmsBitTheme extends Model {

    use HasFactory;

    protected $table = 'bit_themes';

    protected $fillable = [
      'slug',
      'name'
    ];

}
