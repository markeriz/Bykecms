<div class="form-group">
   @if ($cms_config->show_as_textarea==1)
      {{ Form::textarea('value', $cms_config->value, ['style'=>'width:100%']) }}
   @else
      {{ Form::text('value', $cms_config->value, ['style'=>'width:100%']) }}
   @endif
</div>
<div class="form-group">
   <button type="submit" class="btn">{{__('Save')}}</button>
</div>