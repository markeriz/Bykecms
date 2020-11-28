@if (!empty($bit->name))
  <h2>{{ $bit->name }}</h2>
@endif

<div class="row bit"> 
    @if (!empty($bit->photo))
        <div class="col-sm-4 hide-sm-down" >
            <img src="{{ url('/nuotraukos/'.$bit->photo->id.'/'.$bit->photo->filename) }}" style="width:100%;">
        </div>
    @endif
    <div class="col-sm-8">
        <div class="bit-text theme-photo-text">
                {!! $bit->text !!}
                @include('_bit_themes.partials.button')
        </div>
    </div>
    @if (!empty($bit->photo))
        <div class="col-sm-4 hide-md-up" >
            <img src="{{ url('/nuotraukos/'.$bit->photo->id.'/'.$bit->photo->filename) }}" style="width:100%;">
        </div>
    @endif
</div>