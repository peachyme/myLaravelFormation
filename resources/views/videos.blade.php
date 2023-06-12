@extends('layouts.app')

@section('content')

<h1>Liste des video</h1>
@if ($videos->count())
    @foreach ($videos as $video)
        <h3><a href=" {{ route('video', [ 'id' => $video->id]) }} "> {{$video->id}} : {{$video->title}} </a></h3>
    @endforeach
@else
    <span>No videos available</span>
@endif

@endsection

