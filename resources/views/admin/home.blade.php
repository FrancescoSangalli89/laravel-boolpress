@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Benvenuto {{auth::user()->name}}!</h1>
    </div>
    
@endsection