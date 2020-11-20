<div class="form-group">
   <label>{{__('Name')}}</label>
   {{ Form::text('name', $cms_tag->name) }}
</div>
<div class="form-group">
   <?php 
   $tags = \App\Models\CmsTag::where('parent_id', NULL)->where('id', '!=', $cms_tag->id)->orderBy('position', 'asc')->get()->pluck('name', 'id')->toArray();
   ?>
   {!! Form::label('name', __('Move to')) !!}
   {{ Form::select('parent_id', [null=>''] + $tags, $cms_tag->parent_id, ['class'=>'select']) }}
</div>
<?php 
/*
<div class="form-group">
   <?php 
   $tag_types = \App\Models\CmsTagType::orderBy('id', 'asc')->get()->pluck('name', 'id')->toArray();
   ?>
   {!! Form::label('name', 'Žymės tipas:') !!}
   {{ Form::select('tag_type_id', $tag_types, $cms_tag->tag_type_id, ['class'=>'select']) }}
</div>
*/
?>

<hr/>

<div class="row"> 
   <div class="col-md-6">
      <div class="form-group">
         <label>{{__('Description')}}</label>
         {{ Form::text('description', $cms_tag->description) }}
      </div>
   </div>
   <div class="col-md-6">
      <div class="form-group">
         <label>{{__('Keywords')}}</label>
         {{ Form::text('keywords', $cms_tag->keywords) }}
      </div>
   </div>
</div>

<hr/>

<div class="row"> 
   <div class="col-md-6">
      <div class="form-group">
         {!! Form::hidden('status', 0) !!}
         {!! Form::checkbox('status', 1, $cms_tag->status) !!}
         {!! Form::label('status', __('Set Active')) !!}
      </div>
   </div>
   <div class="col-md-6">
      <div class="form-group">
         {!! Form::hidden('home', 0) !!}
         {!! Form::checkbox('home', 1, $cms_tag->home) !!}
         {!! Form::label('home', __('Set as homepage')) !!}
      </div>
   </div>
</div>
<div class="form-group">
   <button type="submit" class="btn">{{__('Save')}}</button>
</div>