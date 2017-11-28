@extends('layouts.app')
@section('content')
@include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update Tag
        </div>
        <div class="panel-body">
            <form action="{{route('update.tag', $tag->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
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