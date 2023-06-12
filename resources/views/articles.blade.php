@extends('layouts.app')

@section('content')

<h1>Liste des articles</h1>
@if($posts->count())
    @foreach($posts as $post)
       <h3><a href="{{ route('article', ['id' => $post->id]) }}"> {{$post->id}} : {{$post->title}} </a></h3>
    @endforeach
    <div class="pagination">
        {{ $posts->links() }}
    </div>
@else
<span>No articles available</span>
@endif

@endsection

