<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

use Request; 
use Log;
use DB;

class CmsTag extends Model {

    use HasFactory;
    use Sluggable;

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    protected $table = 'tags';

    protected $fillable = [
      'tag_type_id',
      'slug',
      'parent_id',
      'name',
      'description',
      'keywords',
      'home',
      'status'
    ];

    public function cms_bits () {
      return $this->hasMany('App\Models\CmsBit', 'tag_id')->orderBy('position', 'desc');
    }

    // Duplicate
    public function bits () {
      return $this->hasMany('App\Models\CmsBit', 'tag_id')->where('status', 1)->orderBy('position', 'asc');
    }

    // Update Position After Save
    public function save(array $options = []) {
        
      // before save code 
      parent::save();
      // after save code

      $id = $this->attributes['id'];
      $cms_tag = \App\Models\CmsTag::find($id);

      // Define Position
      $input['position']=$cms_tag->id;

      // Save
      if ($cms_tag->position<1) {
          \App\Models\CmsTag::where('id', $id)->update($input);
      }
      
  }
}
