@extends('layouts.app')

@section('title', 'All Post')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>All Post</h3>


            @foreach ($posts as $post)
                
            
            <div class="card mb-3">
                <div class="card-header">
                    {{$post->title}}

                </div>

                <div class="card-body">
                    <div>
                        {{ Str::limit($post->body,100, '.')}}
                    </div>

                    <a href="/posts/{{$post->slug}}">Read more</a>
                </div>

                <div class="card-footer">
                    Published on {{ $post->created_at->diffForHumans()}}
                </div>
            </div>
            @endforeach
            {{$posts->links()}}
        </div>
    </div>
</div>

@stop