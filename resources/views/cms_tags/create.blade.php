@extends('layouts.cms')

@section('content')

    <h1>Kurti</h1>

    {!! Form::open(['url'=>'cms_tags']) !!}
        @csrf
        
        @include('cms_tags.form')

        {!! Form::close() !!}

@endsection