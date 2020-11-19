<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class CmsPhoto extends Model {

    use HasFactory;

    protected $table = 'photos';

    protected $fillable = [
      'bit_id',
      'filename',
      'random',
      'name'
    ];

    
}
