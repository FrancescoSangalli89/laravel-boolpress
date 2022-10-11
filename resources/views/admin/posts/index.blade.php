@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.posts.create')}}" class="btn btn-primary">New post</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Category</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{($post->category)?$post->category->name:''}}</td>
                        <td><a class="btn btn-primary" href="{{route('admin.posts.show', $post)}}">Show</a></td>
                        <td><a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}">Edit</a></td>
                        <td>
                            <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" value="delete" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
