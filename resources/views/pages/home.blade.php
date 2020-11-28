@extends('layouts.app')

@section('content')

    @foreach ($bits as $bit)

        {{-- Rendering Content --}}

        <p>
            @if (!empty($bit->bit_theme))
                @include('_bit_themes.'.$bit->bit_theme['slug'])
            @else 
                @include('_bit_themes.text-photo')
            @endif 
            <div class="content-block-separator"></div>
        </p>

    @endforeach


@endsection