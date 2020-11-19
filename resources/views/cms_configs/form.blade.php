<div class="form-group">
   <label>Raktas</label>
   {{ Form::text('slug', $cms_config->slug) }}
</div>
<div class="form-group">
   <label>Paskirtis</label>
   {{ Form::text('description', $cms_config->description) }}
</div>
<div class="form-group">
   <label>Reikšmė</label>
   {{ Form::text('value', $cms_config->value) }}
</div>
<div class="form-group">
   <button type="submit" class="btn">Išsaugoti</button>
</div>