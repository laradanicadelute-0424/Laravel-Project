@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Will show selected user's individual post --}}
    
    @if ($post)
        <article class="post-detail">
            
            <h1 class="mb-3">{{ $post->title }}</h1>

        
            <p class="text-muted mb-4">
                Published by     
                <a href="{{ route('users.posts.index', $post->user) }}">
                    <strong>{{ $post->user->name }}</strong>
                </a>

                <time datetime="{{ $post->created_at->toISOString() }}">
                    {{ $post->created_at->format('F d, Y \a\t h:i A') }}
                </time>
            </p>


            <div class="post-content mb-5">
                @if (isset($post->content_is_html) && $post->content_is_html)
                    {!! $post->content !!} 
                @else
                    {{ $post->content }}
                @endif
            </div>

            <a href="{{ route('posts.index') }}" class="btn btn-secondary">← Back to all posts</a>

        </article>
    @else
        <div class="alert alert-warning text-center">
            Post not found.
        </div>
    @endif
</div>
@endsection