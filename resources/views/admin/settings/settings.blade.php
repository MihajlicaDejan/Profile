@extends('layouts.app')
@section('content')
@include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit blog settings
        </div>

        <div class="panel-body">
            <form action="{{route('update.settings')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" name="site_name"  value="{{$settings->site_name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="contact_email" value="{{$settings->contact_email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Contact number</label>
                    <input type="text" name="contact_number" value="{{$settings->contact_number}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Address</label>
                    <input type="text" name="address" value="{{$settings->address}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="motive1">Motive1</label>
                    <input type="text" name="motive1" value="{{$settings->motive1}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="motive2">Motive2</label>
                    <input type="text" name="motive2" value="{{$settings->motive2}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="biography">Biography</label>
                    <textarea class="form-control" name="biography" id="biography">{{$settings->biography}}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update site settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#biography').summernote();
        });
    </script>
@endsection
