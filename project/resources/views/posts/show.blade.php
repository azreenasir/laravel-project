@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div class="container">
    <h1>{{ $post->title }}</h1>

    <div class="text-secondary">
        <a href="/categories/{{$post->category->slug}}" class="text-decoration-none">{{$post->category->name}}</a> 
        &middot; {{ $post->created_at->format("d F, Y")}}
        &middot; 
        @foreach ($post->tags as $tag)
            <a href="/tags/{{ $tag->slug }}" class="text-decoration-none">{{ $tag->name}}</a>
        @endforeach
    </div>
    <hr>

    <p>{{ $post->body }}</p>

    <!-- Button trigger modal -->
    <button type="button" class="btn text-danger btn-sm p-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Delete
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <div>Title: {{$post->title}}</div>
                    <div class="text-secondary">
                        <small>Published on {{$post->created_at->format("d F, Y")}}</small>
                    </div>
                    </div>
                <form action="/posts/{{$post->slug}}/delete" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn btn-danger" type="submit">Yes</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                </form>
            </div>
        </div>
        </div>
    </div>

        
</div>
@endsection