<div class="form-group">
   <label>Vardas ir pavardė</label>
   {{ Form::text('name', $cms_user->name) }}
</div>
<div class="form-group">
   <label>El. pašto adresas</label>
   {{ Form::text('email', $cms_user->email) }}
</div>
<div class="form-group">
   <label>Slaptažodis</label>
   {{ Form::password('password') }}
</div>
<div class="form-group">
   {!! Form::hidden('tag_rights', 0) !!}
   {!! Form::checkbox('tag_rights', 1, $cms_user->tag_rights) !!}
   {!! Form::label('tag_rights', 'Kategorijų redagavimas') !!}
</div>
<div class="form-group">
   {!! Form::hidden('cart_rights', 0) !!}
   {!! Form::checkbox('cart_rights', 1, $cms_user->cart_rights) !!}
   {!! Form::label('cart_rights', 'Matyti užsakymus') !!}
</div>
<div class="form-group">
   {!! Form::hidden('cart_edit_rights', 0) !!}
   {!! Form::checkbox('cart_edit_rights', 1, $cms_user->cart_edit_rights) !!}
   {!! Form::label('cart_edit_rights', 'Redaguoti užsakymus') !!}
</div>
<div class="form-group">
   {!! Form::hidden('client_rights', 0) !!}
   {!! Form::checkbox('client_rights', 1, $cms_user->client_rights) !!}
   {!! Form::label('client_rights', 'Matyti klientus') !!}
</div>
<div class="form-group">
   {!! Form::hidden('client_edit_rights', 0) !!}
   {!! Form::checkbox('client_edit_rights', 1, $cms_user->client_edit_rights) !!}
   {!! Form::label('client_edit_rights', 'Redaguoti klientus') !!}
</div>
<div class="form-group">
   {!! Form::hidden('webmaster_rights', 0) !!}
   {!! Form::checkbox('webmaster_rights', 1, $cms_user->webmaster_rights) !!}
   {!! Form::label('webmaster_rights', 'Visos teisės (Webmaster)') !!}
</div>
<div class="form-group">
   {!! Form::hidden('superadmin_rights', 0) !!}
   {!! Form::checkbox('superadmin_rights', 1, $cms_user->superadmin_rights) !!}
   {!! Form::label('superadmin_rights', 'Visos valdymo teisės (Admin)') !!}
</div>
<div class="form-group">
   <button type="submit" class="btn">Išsaugoti</button>
</div>