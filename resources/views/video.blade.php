@extends('layouts.app')

@section('content')

    <h2> {{$video->title}} </h2>
    <p> {{$video->url}} </p>

    <hr>
    <h2>Comments</h2>

    <form method="POST" action="{{route('storeVideoComment')}}" class="row">
        @csrf
        <div class="col">
            <input type="hidden" id="id" name="id" value="{{$video->id}}">
            <textarea class="form-control" id="content" name="content" rows="1" placeholder="your comment here..."></textarea>        </div>
        <div class="col">
          <button type="submit" class="btn btn-dark mb-3">Submit</button>
        </div>
    </form>

    @forelse ($video->comments as $comment)
        <hr>
        <div>{{ $comment->content }} <br> {{$comment->created_at->format('d-m-Y') }}</div> <!-- carbon laravel for formatting time-->
    @empty
        <span>no comments...</span>
    @endforelse

@endsection


