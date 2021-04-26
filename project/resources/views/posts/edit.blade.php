@extends('layouts.app', ['title' => 'Update Post'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header">Update Post : {{ $post->title }}</div>

                    <div class="card-body">
                        <form action="/posts/{{$post->slug}}/edit" method="POST">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <Label for="title">Title</Label>
                                <input type="text" value="{{ old('title') ?? $post->title}}" name="title" id="title" class="form-control">
                                @error('title')
                                    <div class="mt-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <Label for="body">Body</Label>
                                <textarea name="body" id="body" class="form-control">{{ old('body') ?? $post->body}}</textarea>
                                @error('body')
                                    <div class="mt-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop