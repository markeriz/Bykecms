@extends('layouts.app')

@section('content')

    @if (empty($error)) 
        <h2>{{ c('send-query-success-title')}}</h2>
        {{ c('send-query-success-message')}}
    @else 
        <h2>{{ __('Something went wrong')}}</h2>
    @endif

@endsection
