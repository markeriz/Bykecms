@if (!empty($bit->name))
  <h2>{{ $bit->name }}</h2>
@endif

{!! $bit->text !!}
@include('_bit_themes.partials.button')
<div class="row">
   @foreach($bit->cms_photos as $photo)
      <div class="col-md-2">
         <img src="{{ url('/nuotraukos/'.$photo->id.'/'.$photo->filename) }}" style="width:100%;">
      </div>
   @endforeach
</div>