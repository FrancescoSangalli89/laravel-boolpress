@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h5>Name:</h5>
            {{$category->name}}
        </div>
        <div>
            <h5>Slug:</h5>
            {{$category->slug}}
        </div>
        @if (count($category->posts))
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        
        <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Back to Categories</a>
    </div>
@endsection