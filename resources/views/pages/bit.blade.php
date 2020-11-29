@extends('layouts.app')

@section('content')

   {{-- Rendering Content --}}

   <p>
       @if (!empty($bit->bit_theme))
           @include('_bit_themes.'.$bit->bit_theme['slug'])
       @else 
           @include('_bit_themes.text-photo')
       @endif 
       <div class="content-block-separator"></div>
   </p>

@endsection