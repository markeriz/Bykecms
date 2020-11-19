@extends('layouts.cms')

@section('content')

    <h1>{{ $cms_user->slug }}</h1>
    <p>
        {{ $cms_user->description }}
    </p>

    <div class="row">
        <div class="col-md-12">
            <label>Reikšmė:</label>
            <p>
                {{ $cms_user->value }}
            </p>
        </div>
        <div class="col-md-12">
            {{ date_format($cms_user->created_at, 'Y-m-d H:i:s') }}
        </div>
    </div>
@endsection