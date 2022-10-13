@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Show</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td><a class="btn btn-primary" href="{{route('admin.tags.show', $tag)}}">Show</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
