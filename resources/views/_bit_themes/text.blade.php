@if (!empty($bit->name))
  <h2>{{ $bit->name }}</h2>
@endif

<div class="row bit"> 
    <div class="col-md-12 bit-text theme-text">
        {!! $bit->text !!}
        @include('_bit_themes.partials.button')
    </div>
</div>