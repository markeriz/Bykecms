<div class="row"> 

   @if (!empty($bit->name))
    <div class="col-md-12">
        <h2>{{ $bit->name }}</h2>
   </div>
   @endif

   @if (!empty($bit->text))
      <div class="col-md-12" style="text-align:justify">
            {!! $bit->text !!}
      </div>
      @include('_bit_templates.partials.button')
   @endif
   
   @if (!empty($bit->photos[0]))
     @foreach ($bit->photos as $photo)
       <div class="col-md-6">
           <img src="{{ url('/nuotraukos/'.$photo->id.'/'.$photo->filename) }}" style="width:100%;">
       </div>
     @endforeach
   @endif

</div>