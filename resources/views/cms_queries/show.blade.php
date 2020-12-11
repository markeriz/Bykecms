@extends('layouts.cms')

@section('content')

   <h2>{{ __('Query') }}</h2>

   {{ $cms_query->message }}
   <br/>
   <br/>
   {{ $cms_query->email }}
   <br/>
   {{ $cms_query->phone }}
   <br/>
   <br/>
   {{ $cms_query->created_at }}

@endsection