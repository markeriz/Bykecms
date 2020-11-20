@extends('layouts.cms')

@section('content')

    <h1>{{__('Create Configuration')}}</h1>

    {!! Form::open(['url'=>'cms_configs']) !!}
        @csrf
        
        @include('cms_configs.form')

        {!! Form::close() !!}

@endsection