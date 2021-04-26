@extends('layouts.app', ['title' => 'New Post'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header">New Post</div>

                    <div class="card-body">
                        <form action="/posts/store" method="POST">
                            @csrf
                            <div class="form-group">
                                <Label for="title">Title</Label>
                                <input type="text" name="title" id="title" class="form-control">
                                @error('title')
                                    <div class="mt-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <Label for="body">Body</Label>
                                <textarea name="body" id="body" class="form-control"></textarea>
                                @error('body')
                                    <div class="mt-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop