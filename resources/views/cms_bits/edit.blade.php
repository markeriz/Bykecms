@extends('layouts.cms')

@section('content')

   <h1>{{ __('Edit Bit') }}</h1>

   {!! Form::model($cms_bit, ['route' => ['cms_bits.update', $cms_bit->id]]) !!}

      @csrf
      @method('PATCH')

      @include('cms_bits.form')

    {!! Form::close() !!}

@endsection