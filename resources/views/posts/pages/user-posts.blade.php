@extends('layouts.app')

{{-- Will show user's posts --}}

@section('content')
<div class="container">
    <h2 class="mb-4">Posts by: <span class="text-primary">{{ $user->name }}</span></h2>

    @if ($posts->count())
        
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-8 offset-md-2 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                           
                            <h5 class="card-title d-flex justify-content-between align-items-center">
                                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                            </h5>

                            <p class="card-text text-muted">
                                {{ Str::limit($post->content, 150) }}
                            </p>

                            <p class="card-subtitle small text-secondary">
                                Published on: 
                                {{ $post->created_at->format('M d, Y') }}
                            </p>

                          @auth
                                    @if (Auth::id() == $post->user_id)

                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-primary me-2" title="Edit Post">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a> 
                                            
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Post">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    @endif
                        @endauth

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">
            {{ $user->name }} has not published any posts yet.
        </div>
    @endif
    
    <div class="mt-5 text-center">
        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">← Back to All Posts</a>
    </div>

</div>
@endsection