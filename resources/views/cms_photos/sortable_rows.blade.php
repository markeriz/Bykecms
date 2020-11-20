@if (!empty($cms_photos))
	@foreach ($cms_photos as $cms_photo)
		<li class="col-md-2 photo-{{$cms_photo->id}}">
			@if (file_exists(public_path('nuotraukos').'/'.$cms_photo->id.'/crop.'.$cms_photo->filename))
				<img src="{{ url('nuotraukos/'.$cms_photo->id.'/thumb.'.$cms_photo->filename) }}" style="width:90%; margin-bottom:0px; margin-right:0.6rem; border:1px solid rgb(220,220,220); border-radius:5px; padding:7px;">
			@else 
				<img src="{{ url('nuotraukos/'.$cms_photo->id.'/thumb.'.$cms_photo->filename) }}" style="width:90%; margin-bottom:0px; margin-right:0.6rem; border:1px solid rgb(220,220,220);  border-radius:5px; padding:7px;">
			@endif
			<div style="height:30px;">
				<a href="{{url('/cms_photos/destroy/'.$cms_photo->id)}}" class="delete-button" id="{{$cms_photo->id}}">{{__('Delete')}}</a>
				
			</div>
			{{ Form::hidden('uploaded_photos[]', $cms_photo->id) }}
		</li>
	@endforeach
@else

@endif