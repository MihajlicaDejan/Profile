@extends('layouts.app')
@section('content')
    <table class="table table-head">
        <thead>
            <th>Image</th>
            <th>Title</th>
            <th>Edit</th>
            <th>Trash</th>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="200" height="100"></td>
                <td>{{$post->title}}</td>
                <td><a href="{{route('edit.post', $post->id)}}" class="btn btn-success">Edit</a></td>
                <td><a href="{{route('delete.post', $post->id)}}" class="btn btn-danger">Trash</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
