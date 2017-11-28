@extends('layouts.app')
@section('content')
    <table class="table table-head">
        <thead>
            <th>Category name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @if($categories->count() > 0)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td><a href="{{route('edit.category', $category->id)}}" class="btn btn-success">Edit</a></td>
                        <td><a href="{{route('delete.category', $category->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="5" class="text-center">No categories to show</th>
                </tr>
            @endif
        </tbody>
    </table>
@endsection

