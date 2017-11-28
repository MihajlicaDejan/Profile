@extends('layouts.app')
@section('content')
    <table class="table table-head">
        <thead>
            <th>Image</th>
            <th>Title</th>
            <th>Restore</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="200" height="100"></td>
                            <td>{{$post->title}}</td>
                            <td><a href="{{route('restore.post', $post->id)}}" class="btn btn-info">Restore</a></td>
                            <td><a href="{{route('kill.post', $post->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                @else
                <tr>
                    <th colspan="5" class="text-center">No trashed posts</th>
                </tr>
            @endif
        </tbody>
    </table>
@endsection