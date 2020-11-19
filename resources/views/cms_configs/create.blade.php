@extends('layouts.cms')

@section('content')

    <h1>Kurti</h1>

    {!! Form::open(['url'=>'cms_configs']) !!}
        @csrf
        
        @include('cms_configs.form')

        {!! Form::close() !!}

@endsection