@extends('layouts.cms')

@section('content')

    <h1>{{__('Users')}} <a class="btn" href="{{ route('cms_users.create') }}">{{__('Create User')}}</a>  </h1>

    

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($cms_users as $cms_user)
                <tr> 
                    <td>
                        <a href="{{ route('cms_users.edit',$cms_user->id) }}">
                            {{ $cms_user->name }}
                        </a>
                    </td>
                    <td>
                        {{ $cms_user->email }}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ url('/cms_user_delete/'.$cms_user->id) }}" onclick="return confirm('{{__('Do you really want to delete?')}}')">{{__('Delete')}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


@endsection