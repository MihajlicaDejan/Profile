@extends('layouts.app')
@section('content')

    <table class="table table-head">
        <thead>
            <th>Tag name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
        @if($tags->count() > 0)
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->tag}}</td>
                    <td><a href="{{route('edit.tag', $tag->id)}}" class="btn btn-success">Edit</a></td>
                    <td><a href="{{route('delete.tag', $tag->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center">No tags to show</th>
            </tr>
        @endif
        </tbody>
    </table>

@endsection