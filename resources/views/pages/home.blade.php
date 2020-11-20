@extends('layouts.app')

@section('content')

    @foreach ($bits as $bit)

        {{-- Rendering Content --}}

        <p>
            @if (!empty($bit->bit_template))
                @include('_bit_templates.'.$bit->bit_template['slug'])
            @else 
                @include('_bit_templates.text-photo')
            @endif 
            <div class="content-block-separator"></div>
        </p>
        

    @endforeach


@endsection