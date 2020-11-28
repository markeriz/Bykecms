@if (!empty($bit->name))
  <h2>{{ $bit->name }}</h2>
@endif

<div class="row bit"> 

   @if (!empty($bit->text))
      <div class="col-md-12" style="text-align:justify">
            {!! $bit->text !!}
      </div>
      @include('_bit_themes.partials.button')
   @endif
   
   @if (!empty($bit->photos[0]))
     @foreach ($bit->photos as $photo)
       <div class="col-md-6">
           <img src="{{ url('/nuotraukos/'.$photo->id.'/'.$photo->filename) }}" style="width:100%;">
       </div>
     @endforeach
   @endif

</div>