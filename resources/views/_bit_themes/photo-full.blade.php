@include('_bit_themes.partials.bit-name')

@foreach($bit->cms_photos as $photo)

    @include('_bit_themes.partials.photo-description')
    <img src="{{ url('/photos/'.$photo->id.'/xlarge.'.$photo->filename) }}" style="width:100%;">
    <br/>
    <br/>
    
@endforeach
{!! $bit->text !!}
@include('_bit_themes.partials.button')