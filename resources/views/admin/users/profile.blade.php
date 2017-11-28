@extends('layouts.app')
@section('content')
@include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update profile
        </div>
        <div class="panel-body">
            <form action="{{route('profile.user.update')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="name">User</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Facebook</label>
                    <input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Instagram</label>
                    <input type="text" name="instagram" value="{{$user->profile->instagram}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">About</label>
                    <textarea class="form-control" name="about" id="about">{{$user->profile->about}}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection