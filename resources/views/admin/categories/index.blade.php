@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Add category</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td><a class="btn btn-primary" href="{{route('admin.categories.show', $category)}}">Show</a></td>
                        <td><a class="btn btn-warning" href="{{route('admin.categories.edit', $category)}}">Edit</a></td>
                        <td>
                            <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
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
