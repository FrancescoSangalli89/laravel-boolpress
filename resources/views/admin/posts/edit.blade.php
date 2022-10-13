@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option {{ old('category_id') == '' ? 'selected' : '' }} value="">No category</option>
                @foreach ($categories as $category)
                    <option {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <span>Tags:</span>
        <div class="card">
            @foreach ($tags as $tag)
                <div class="mb-3 form-check">
                    @if ($errors->any())
                        <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} type="checkbox"
                            class="form-check-input" name="tags[]" id="{{ $tag->id }}" value="{{ $tag->id }}">
                    @else
                        <input {{ $post->tags->contains($tag) ? 'checked' : '' }} type="checkbox" class="form-check-input"
                            name="tags[]" id="{{ $tag->id }}" value="{{ $tag->id }}">
                    @endif
                    <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
            @error('tags')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-warning">Cancel</a>
    </form>
@endsection
