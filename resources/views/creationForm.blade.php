@extends('layouts.app')

@section('content')

    <h1>Create new post</h1>
    <br>

    @if ($errors->any())
        @foreach ($errors->all() as $error )
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif
    <div class="container">
        <form method="POST" action="{{route('storePost')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="title...">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3" placeholder="content..."></textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Image</label>
                <input class="form-control" type="file" id="photo" name="photo" accept="image/png , image/jpeg">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-dark mb-3">Create</button>
            </div>
        </form>
    </div>

@endsection
