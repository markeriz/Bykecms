<div class="form-group">
   <label>{{__('Name and Surname')}}</label>
   {{ Form::text('name', $cms_user->name) }}
</div>
<div class="form-group">
   <label>{{__('Email address')}}</label>
   {{ Form::text('email', $cms_user->email) }}
</div>
<div class="form-group">
   <label>{{__('Password')}}</label>
   {{ Form::password('password') }}
</div>
<div class="form-group">
   {!! Form::hidden('tag_rights', 0) !!}
   {!! Form::checkbox('tag_rights', 1, $cms_user->tag_rights) !!}
   {!! Form::label('tag_rights', __('Edit Tag')) !!}
</div>
<div class="form-group">
   {!! Form::hidden('cart_rights', 0) !!}
   {!! Form::checkbox('cart_rights', 1, $cms_user->cart_rights) !!}
   {!! Form::label('cart_rights', __('View Cart')) !!}
</div>
<div class="form-group">
   {!! Form::hidden('cart_edit_rights', 0) !!}
   {!! Form::checkbox('cart_edit_rights', 1, $cms_user->cart_edit_rights) !!}
   {!! Form::label('cart_edit_rights', __('Edit Cart')) !!}
</div>
<div class="form-group">
   {!! Form::hidden('client_rights', 0) !!}
   {!! Form::checkbox('client_rights', 1, $cms_user->client_rights) !!}
   {!! Form::label('client_rights', __('View Client') ) !!}
</div>
<div class="form-group">
   {!! Form::hidden('client_edit_rights', 0) !!}
   {!! Form::checkbox('client_edit_rights', 1, $cms_user->client_edit_rights) !!}
   {!! Form::label('client_edit_rights', __('Edit Client')) !!}
</div>
<div class="form-group">
   {!! Form::hidden('superadmin_rights', 0) !!}
   {!! Form::checkbox('superadmin_rights', 1, $cms_user->superadmin_rights) !!}
   {!! Form::label('superadmin_rights', __('Set as super admin') ) !!}
</div>
<div class="form-group">
   {!! Form::hidden('webmaster_rights', 0) !!}
   {!! Form::checkbox('webmaster_rights', 1, $cms_user->webmaster_rights) !!}
   {!! Form::label('webmaster_rights', __('Set as webmaster (highest rights)') ) !!}
</div>
<div class="form-group">
   <button type="submit" class="btn">{{__('Save')}}</button>
</div>