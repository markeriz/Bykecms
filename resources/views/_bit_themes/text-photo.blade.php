@if (!empty($bit->name))
    <h2>
        <a href="{{ url('/bit/'.$bit->slug) }}" class="black">
            {{ $bit->name }}
        </a>
    </h2>
@endif

<div class="row bit"> 
    <div class="col-sm-8">
        <div class="bit-text theme-text-photo">
            {!! $bit->text !!}
            @include('_bit_themes.partials.button')
        </div>
    </div>
    @if (!empty($bit->photo))
        <div class="col-sm-4" style="width:100%;">
            <img src="{{ url('/photos/'.$bit->photo->id.'/large.'.$bit->photo->filename) }}" style="width:100%;">
        </div>
    @endif
</div>

