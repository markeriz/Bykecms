<div class="form-group">
   {{ Form::text('value', $cms_config->value, ['style'=>'width:100%']) }}
</div>
<div class="form-group">
   <button type="submit" class="btn">{{__('Save')}}</button>
</div>