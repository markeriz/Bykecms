@extends('layouts.cms')

@section('content')

    <h1>Kurti</h1>

    {!! Form::open(['url'=>'cms_users']) !!}
        @csrf
        
        @include('cms_users.form')

        {!! Form::close() !!}

@endsection