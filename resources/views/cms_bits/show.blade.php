@extends('layouts.cms')


@section('content')

    <h1>{{ $cms_bit->name }}</h1>

    <div class="row">
        <div class="col-md-12">
            <p>
                {{ $cms_bit->text }}
            </p>
        </div>
        <div class="col-md-12">
            {{ date_format($cms_bit->created_at, 'Y-m-d H:i:s') }}
        </div>
    </div>
@endsection