@extends('layouts.cms')

@section('content')

    <h1>{{ $cms_tag->slug }}</h1>
    <p>
        {{ $cms_tag->description }}
    </p>

    <div class="row">
        <div class="col-md-12">
            <label>Reikšmė:</label>
            <p>
                {{ $cms_tag->value }}
            </p>
        </div>
        <div class="col-md-12">
            {{ date_format($cms_tag->created_at, 'Y-m-d H:i:s') }}
        </div>
    </div>
@endsection