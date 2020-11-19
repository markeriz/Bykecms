@extends('layouts.cms')

@section('content')

    <h1>Vartotojai <a class="btn" href="{{ route('cms_users.create') }}">Kurti</a>  </h1>

    

        <table class="table table-bordered">
            <tbody>
            @foreach ($cms_users as $cms_user)
                <tr> 
                    <td>
                        <b>{{ $cms_user->name }}</b>
                    </td>
                    <td>
                        {{ $cms_user->email }}
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('cms_users.show',$cms_user->id) }}">Rodyti</a>
                        <a class="btn btn-primary" href="{{ route('cms_users.edit',$cms_user->id) }}">Redaguoti</a>
                        <a class="btn btn-primary" href="{{ url('/cms_user_delete/'.$cms_user->id) }}" onclick="return confirm('Ar tikrai norite trinti?')">Trinti</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


@endsection