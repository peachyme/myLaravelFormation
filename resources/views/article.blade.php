@extends('layouts.app')

@section('content')
    <h2> {{ $post->title }}</h2>
    <p> {{ $post->content }} </p>

    <hr>

    <h2>Image</h2>
    {{-- <span> {{$post->image ? $post->image->path : "no image to display..."}} </span> --}}

    <img src="{{ $post->image ? Storage::url($post->image->path) : "no image to display..." }}" class="img-fluid" alt="no image to display...">

    <hr>

    <h2>Tags</h2>
    @forelse ($post->tags as $tag)
        <div>{{ $tag->name }} </div>
    @empty
        <span>no tags...</span>
    @endforelse

    {{--
        one to many relationship : polymorphic
    --}}

    <hr>
    <h2>Comments</h2>

    <form method="POST" action="{{route('storePostComment')}}" class="row">
        @csrf
        <div class="col">
            <input type="hidden" name="id" id="id" value="{{$post->id}}">
            <textarea class="form-control" id="content" name="content" rows="1" placeholder="your comment here..."></textarea>        </div>
        <div class="col">
          <button type="submit" class="btn btn-dark mb-3">Submit</button>
        </div>
    </form>

    @forelse($post->comments as $comment)
        <hr>
        <div>{{ $comment->content }} <br> {{$comment->created_at->format('d-m-Y') }}</div> <!-- carbon laravel for formatting time-->
    @empty
        <span>no comments...</span>
    @endforelse

    <hr>
    <h4>The latest comment :</h4>
    <span>{{$post->latestComment ? $post->latestComment->content : "no comments..."}}</span>

    <hr>
    <h4>The oldest comment :</h4>
    <span>{{$post->oldestComment ? $post->oldestComment->content : "no comments..."}}</span>
@endsection
