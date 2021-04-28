@extends('layouts.app')

@section('title', 'All Post')

@section('content')
<div class="container">
    <div class="">
        <div>
            @isset($category)
            <h3>Category: {{$category->name}}</h3>
            @endisset

            @isset($tag)
            <h3>Tag: {{$tag->name}}</h3>
            @endisset

            @if (!isset($tag) && !isset($category))
            <h3>All Post</h3>       
            @endif
            <hr>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-7">
            @forelse ($posts as $post)
                <div class="card mb-4">
                    @if ($post->thumbnail)
                    <a href="{{ route('posts.show', $post->slug)}}">
                        <img style="height: 400px; object-fit: cover; object-position: center;" class="card-img-top" src="{{ $post->takeImage }}"> 
                    
                    @endif

                    <div class="card-body">
                        <div>
                            <a href="{{route('categories.show', $post->category->slug) }}" class="text-secondary">
                                <small>
                                    {{ $post->category->name }} - 
                                </small>
                            </a>

                            @foreach ($post->tags as $tag)
                                <a href="{{route('tags.show', $tag->slug) }}" class="text-secondary">
                                    <small>
                                        {{ $tag->name }}
                                    </small>
                                </a>
                            @endforeach
                        </div>
                        <h5>
                            <a class="text-dark" href="{{ route('posts.show', $post->slug)}}" class="card-title">
                                {{$post->title}}
    
                            </a>
                        </h5>
                        
                        <div class="text-secodary my-3">
                            {{ Str::limit($post->body,130, '.')}}
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">

                            <div class="media align-items-center">
                                <img width="40" class="rounded-circle mr-3" src="{{ $post->user->gravatar()}}" alt="">
                                <div class="media-body">
                                    <div>
                                        {{ $post->user->name}}
                                    </div>
                                </div>
                            </div>

                            <div class="text-secondary">
                                <small>
                                    Published on {{ $post->created_at->diffForHumans()}}
                                </small>                            
                            </div>
                        </div>

                    </div>
                </div>
            @empty
            <div class="col-md-6">
                <div class="alert alert-info">
                    There are no post.
                </div>
            </div>
            @endforelse
        </div>
    </div>


    {{$posts->links()}}

</div>

@stop