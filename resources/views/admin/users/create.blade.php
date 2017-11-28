@extends('layouts.app')
@section('content')
@include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Create User
        </div>
        <div class="panel-body">
            <form action="{{route('store.user')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="name">User</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection