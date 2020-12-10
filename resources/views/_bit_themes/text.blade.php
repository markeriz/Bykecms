@include('_bit_themes.partials.bit-name')

<div class="row bit"> 
    <div class="col-xs-12 bit-text theme-text">
        {!! $bit->text !!}
        @include('_bit_themes.partials.button')
    </div>
</div>