@include('_bit_themes.partials.bit-name')

{!! $bit->text !!}
@include('_bit_themes.partials.button')
<div class="row">
   @foreach($bit->cms_photos as $photo)
        <div class="col-md-2">
            @include('_bit_themes.partials.photo-description')
            <img src="{{ url('/photos/'.$photo->id.'/sthumb.'.$photo->filename) }}" style="width:100%;">
        </div>
   @endforeach
</div>