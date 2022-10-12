@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h5>Title:</h5>
            {{$post->title}}
        </div>
        <div>
            <h5>Content:</h5>
            {{$post->content}}
        </div>
        <div>
            <h5>Slug:</h5>
            {{$post->slug}}
        </div>
        <div>
            <h5>Category:</h5>
            {{($post->category)?$post->category->name:''}}
        </div>
        <div>
            <h5>Span:</h5>
            @foreach ($post->tags as $tag)
                <div>
                    {{$tag->name}}
                </div>
            @endforeach
        </div>
        <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Back to posts</a>
    </div>
@endsection