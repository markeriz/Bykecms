@if (!empty($photo) and $photo->description!='')
   <div class="photo-description">
      {{ $photo->description }}
   </div>
@endif