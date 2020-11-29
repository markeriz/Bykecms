@extends('layouts.app')

@section('content')

    @if (empty($error)) 
        <h2>{{ c('web-cart-finish-success-title')}}</h2>
        {{ c('web-cart-finish-success')}}
    @else 
        <h2>{{ __('Something went wrong')}}</h2>
    @endif

@endsection
