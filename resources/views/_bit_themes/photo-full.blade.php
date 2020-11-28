@if (!empty($bit->name))
  <h2>{{ $bit->name }}</h2>
@endif

@foreach($bit->cms_photos as $photo)
   <img src="{{ url('/nuotraukos/'.$photo->id.'/'.$photo->filename) }}" style="width:100%;">
@endforeach
{!! $bit->text !!}
@include('_bit_themes.partials.button')