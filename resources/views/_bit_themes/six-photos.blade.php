@if (!empty($bit->name))
    <h2>
        <a href="{{ url('/bit/'.$bit->slug) }}" class="black">
            {{ $bit->name }}
        </a>
    </h2>
@endif

{!! $bit->text !!}
@include('_bit_themes.partials.button')
<div class="row">
   @foreach($bit->cms_photos as $photo)
      <div class="col-md-2">
         <img src="{{ url('/photos/'.$photo->id.'/sthumb.'.$photo->filename) }}" style="width:100%;">
      </div>
   @endforeach
</div>