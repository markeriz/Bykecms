@extends('layouts.cms')

@section('content')

   <h1>Redaguoti</h1>

   {!! Form::model($cms_user, ['route' => ['cms_users.update', $cms_user->id]]) !!}

      @csrf
      @method('PATCH')

      @include('cms_users.form')

    {!! Form::close() !!}

@endsection