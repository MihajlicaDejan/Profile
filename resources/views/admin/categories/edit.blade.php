@extends('layouts.app')
@section('content')
@include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update Category
        </div>
        <div class="panel-body">
            <form action="{{route('update.category', $category->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection