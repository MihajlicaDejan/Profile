@extends('layouts.app')
@section('content')

    <table class="table table-head">
        <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Promisions</th>
            <th>Delete</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    <img src="{{asset($user->profile->avatar)}}" width="200" height="200">
                </td>
                <td>{{$user->name}}</td>
                <td>
                    @if($user->admin)
                        <a href="{{route('author.user', $user->id)}}" class="btn btn-success">You are Admin</a>
                    @else
                        <a href="{{route('admin.user', $user->id)}}" class="btn btn-info">You are Author</a>
                    @endif
                </td>
                <td>
                    @if(Auth::id() !== $user->id)
                        <a href="{{route('delete.user', $user->id)}}" class="btn btn-danger">Delete</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection