@if (!empty($bit->name))
    <h2>
        <a href="{{ url('/bit/'.$bit->slug) }}" class="black">
            {{ $bit->name }}
        </a>
    </h2>
@endif

@foreach($bit->cms_photos as $photo)
   <img src="{{ url('/photos/'.$photo->id.'/xlarge.'.$photo->filename) }}" style="width:100%;">
@endforeach
{!! $bit->text !!}
@include('_bit_themes.partials.button')