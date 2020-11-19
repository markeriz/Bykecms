@extends('layouts.cms')

@section('content')

  <h1>Nustatymai <a class="btn" href="{{ route('cms_configs.create') }}">Kurti</a></h1>
  

  <table class="table table-bordered">
      <tr>
          <th>Raktas</th>
          <th>Paskirtis</th>
          <th>Reikšmė</th>
          <th>Veiksmai</th>
      </tr>
      @foreach ($cms_configs as $cms_config)
      <tr>
          <td>{{ $cms_config->slug }}</td>
          <td>{{ $cms_config->description }}</td>
          <td>{{ $cms_config->value }}</td>
          <td>
              <form class="delete" action="{{ route('cms_configs.destroy',$cms_config->id) }}" method="POST">
                  <a class="btn btn-info" href="{{ route('cms_configs.show',$cms_config->id) }}">Rodyti</a>
                  <a class="btn btn-primary" href="{{ route('cms_configs.edit',$cms_config->id) }}">Redaguoti</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Trinti</button>
              </form>
          </td>
      </tr>
      @endforeach
  </table>

@endsection