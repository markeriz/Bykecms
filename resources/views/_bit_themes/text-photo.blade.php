@include('_bit_themes.partials.bit-name')

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
            <?php 
            $photo = $bit->photo;
            ?>
            @include('_bit_themes.partials.photo-description')
            
        </div>
    @endif
</div>

