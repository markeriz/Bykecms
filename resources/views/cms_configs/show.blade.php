@extends('layouts.cms')

@section('content')

    <h1>{{ $cms_config->slug }}</h1>
    <p>
        {{ $cms_config->description }}
    </p>

    <div class="row">
        <div class="col-md-12">
            <label>Reikšmė:</label>
            <p>
                {{ $cms_config->value }}
            </p>
        </div>
        <div class="col-md-12">
            {{ date_format($cms_config->created_at, 'Y-m-d H:i:s') }}
        </div>
    </div>
@endsection