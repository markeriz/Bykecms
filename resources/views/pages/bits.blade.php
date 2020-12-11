@extends('layouts.app')

@section('content')

    @if (!empty($bits[0]))

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

    @else 

        <p>{{__('Nothing to show yet')}}.</p>

    @endif


@endsection