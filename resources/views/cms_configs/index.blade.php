@extends('layouts.cms')

@section('content')

  <h1>{{__('Configs')}}</h1>
  <table class="table table-bordered">
      @foreach ($cms_configs as $cms_config)
      <tr>
          <td>
            <a href="{{ route('cms_configs.edit',$cms_config->id) }}">
              {{ __($cms_config->description) }}
            </a>
            <br/>
          {{ $cms_config->value }}</td>
      </tr>
      @endforeach
  </table>

@endsection