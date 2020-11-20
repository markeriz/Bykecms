@extends('layouts.cms')

@section('content')

   <h1>{{__('Edit Tag')}}</h1>

   {!! Form::model($cms_tag, ['route' => ['cms_tags.update', $cms_tag->id]]) !!}

      @csrf
      @method('PATCH')

      @include('cms_tags.form')

    {!! Form::close() !!}

@endsection