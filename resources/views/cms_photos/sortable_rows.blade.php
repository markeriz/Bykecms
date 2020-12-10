@if (!empty($cms_photos))
	@foreach ($cms_photos as $cms_photo)
		<li class="photo-{{$cms_photo->id}}">
			<div class="row">
				<div class="col-xs-3">
					@if (file_exists(public_path('photos').'/'.$cms_photo->id.'/crop.'.$cms_photo->filename))
						<img src="{{ url('photos/'.$cms_photo->id.'/thumb.'.$cms_photo->filename) }}" style="width:90%; margin-bottom:0px; margin-right:0.6rem; border:1px solid rgb(220,220,220); border-radius:5px; padding:7px;">
					@else 
						<img src="{{ url('photos/'.$cms_photo->id.'/thumb.'.$cms_photo->filename) }}" style="width:90%; margin-bottom:0px; margin-right:0.6rem; border:1px solid rgb(220,220,220);  border-radius:5px; padding:7px;">
					@endif
				</div>
				<div class="col-xs-3">
					{{ Form::text('descriptions['.$cms_photo->id.']', $cms_photo->description, ['placeholder'=>__('Description')]) }}
					<a href="{{url('/cms_photos/destroy/'.$cms_photo->id)}}" class="delete-button" id="{{$cms_photo->id}}">{{__('Delete')}}</a>
					{{ Form::hidden('uploaded_photos[]', $cms_photo->id) }}
				</div>
				
			</div>
		</li>
	@endforeach
@else

@endif