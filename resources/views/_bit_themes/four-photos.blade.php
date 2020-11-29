@if (!empty($bit->name))
    <h2>
        <a href="{{ url('/bit/'.$bit->slug) }}" class="black">
            {{ $bit->name }}
        </a>
    </h2>
@endif

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
           <img src="{{ url('/photos/'.$photo->id.'/large.'.$photo->filename) }}" style="width:100%;">
       </div>
     @endforeach
   @endif

</div>