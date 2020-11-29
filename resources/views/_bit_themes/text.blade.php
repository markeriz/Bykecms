@if (!empty($bit->name))
    <h2>
        <a href="{{ url('/bit/'.$bit->slug) }}" class="black">
            {{ $bit->name }}
        </a>
    </h2>
@endif

<div class="row bit"> 
    <div class="col-md-12 bit-text theme-text">
        {!! $bit->text !!}
        @include('_bit_themes.partials.button')
    </div>
</div>