@extends('layouts.cms')

@section('content')

  <h1>{{__('Configurations')}}</h1>
  <table class="table table-bordered">
      <tr>
          <th>{{__('Description')}}</th>
          <th>{{__('Value')}}</th>
      </tr>
      @foreach ($cms_configs as $cms_config)
      <tr>
          <td>
            <a href="{{ route('cms_configs.edit',$cms_config->id) }}">
              {{ __($cms_config->description) }}
            </a>
          </td>
          <td>{{ $cms_config->value }}</td>
      </tr>
      @endforeach
  </table>

@endsection