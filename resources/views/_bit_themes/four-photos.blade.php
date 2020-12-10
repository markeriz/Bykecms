@include('_bit_themes.partials.bit-name')

<div class="row bit"> 
   @if (!empty($bit->text))
      <div class="col-md-12" style="text-align:justify">
            {!! $bit->text !!}
            @include('_bit_themes.partials.button')
      </div>
   @endif

   @if (!empty($bit->photos[0]))
     @foreach ($bit->photos as $photo)
       <div class="col-md-3">
        @include('_bit_themes.partials.photo-description')
        <img src="{{ url('/photos/'.$photo->id.'/large.'.$photo->filename) }}" style="width:100%;">
       </div>
     @endforeach
   @endif

</div>