@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h5>Name:</h5>
            {{$tag->name}}
        </div>
        <div>
            <h5>Slug:</h5>
            {{$tag->slug}}
        </div>
        @if (count($tag->posts))
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tag->posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        
        <a class="btn btn-primary" href="{{route('admin.tags.index')}}">Back to Tags</a>
    </div>
@endsection