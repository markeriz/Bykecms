@if (!empty($bit->name))
  <h2>{{ $bit->name }}</h2>
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
            <img src="{{ url('/nuotraukos/'.$bit->photo->id.'/'.$bit->photo->filename) }}" style="width:100%;">
        </div>
    @endif
</div>

