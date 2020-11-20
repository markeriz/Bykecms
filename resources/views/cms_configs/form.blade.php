<div class="form-group">
   <label>{{__('System Key')}}</label>
   {{ Form::text('slug', $cms_config->slug) }}
</div>
<div class="form-group">
   <label>{{__('Where used')}}</label>
   {{ Form::text('description', $cms_config->description) }}
</div>
<div class="form-group">
   <label>{{__('Value')}}</label>
   {{ Form::text('value', $cms_config->value) }}
</div>
<div class="form-group">
   <button type="submit" class="btn">{{__('Save')}}</button>
</div>