@extends('layouts.app')

@section('content')
    <div class="container">
        <div>Title: {{$post->title}}</div>
        <div>Content: {{$post->content}}</div>
        <div>Slug: {{$post->slug}}</div>
        <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Back to posts</a>
    </div>
@endsection