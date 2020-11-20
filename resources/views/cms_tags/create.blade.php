@extends('layouts.cms')

@section('content')

    <h1>{{__('Create Tag')}}</h1>

    {!! Form::open(['url'=>'cms_tags']) !!}
        @csrf
        
        @include('cms_tags.form')

        {!! Form::close() !!}

@endsection