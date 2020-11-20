@extends('layouts.cms')

@section('content')

  <h1>{{__('Configurations')}} <a class="btn" href="{{ route('cms_configs.create') }}">{{__('Create Configuration')}}</a></h1>
  

  <table class="table table-bordered">
      <tr>
          <th>{{__('System Key')}}</th>
          <th>{{__('Where used')}}</th>
          <th>{{__('Value')}}</th>
          <th>{{__('Actions')}}</th>
      </tr>
      @foreach ($cms_configs as $cms_config)
      <tr>
          <td>{{ $cms_config->slug }}</td>
          <td>{{ __($cms_config->description) }}</td>
          <td>{{ $cms_config->value }}</td>
          <td>
              <form class="delete" action="{{ route('cms_configs.destroy',$cms_config->id) }}" method="POST">
                  <a class="btn btn-primary" href="{{ route('cms_configs.edit',$cms_config->id) }}">{{__('Edit')}}</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
              </form>
          </td>
      </tr>
      @endforeach
  </table>

@endsection