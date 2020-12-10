@include('_bit_themes.partials.bit-name')

<div class="row bit"> 

   @if (!empty($bit->text))
      <div class="col-md-12" style="text-align:justify">
            {!! $bit->text !!}
      </div>
      @include('_bit_themes.partials.button')
   @endif
   
  @if (!empty($bit->photos[0]))
    @foreach ($bit->photos as $photo)
      <div class="col-md-4 col-sm-6 col-xs-6">
         @include('_bit_themes.partials.photo-description')
         <img src="{{ url('/photos/'.$photo->id.'/large.'.$photo->filename) }}" style="width:100%;">
      </div>
     @endforeach
   @endif

</div>