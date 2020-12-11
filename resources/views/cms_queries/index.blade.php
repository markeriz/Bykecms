@extends('layouts.cms')

@section('content')

  <h1>{{__('Queries')}}</h1>
  <table class="table table-bordered">
      @foreach ($cms_queries as $cms_query)
      <tr>
          <td>
            <a href="{{ route('cms_queries.show',$cms_query->id) }}">
              {{ __($cms_query->message) }}
            </a>
            <br/>
          {{ $cms_query->email }}<br/>
          {{ $cms_query->phone }}
        </td>
      </tr>
      @endforeach
  </table>

@endsection