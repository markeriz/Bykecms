<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

use Request; 
use Log;

class CmsBit extends Model {

    use HasFactory;

    protected $table = 'bits';

    use Sluggable;

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'parent_id',
        'tag_id',
        'bit_type_id',
        'photo_view_id',
        'product_button',
        'product_url',
        'status',
        'name',
        'text',
        'price'
    ];

    public function cms_photo () {
        return $this->hasOne('App\Models\CmsPhoto', 'bit_id')->orderBy('position', 'desc');
    }

    public function cms_photos () {
        return $this->hasMany('App\Models\CmsPhoto', 'bit_id')->orderBy('position', 'desc');
    }

    public function cms_bit_template () {
        return $this->hasMany('App\Models\CmsBitTemplate', 'bit_id')->orderBy('position', 'desc');
    }

    // Duplicating same relations, because of not creating two models

    public function childs () {
        return $this->hasMany('App\Models\CmsBit', 'parent_id')->orderBy('position', 'desc');
    }

    public function photo () {
        return $this->hasOne('App\Models\CmsPhoto', 'bit_id')->orderBy('position', 'desc');
    }

    public function photos () {
        return $this->hasMany('App\Models\CmsPhoto', 'bit_id')->orderBy('position', 'desc');
    }

    public function bit_template () {
        return $this->belongsTo('App\Models\CmsBitTemplate', 'bit_template_id');
    }

}
