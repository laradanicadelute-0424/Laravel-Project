@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Blog Posts</h2>
        
        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
        @endauth
    </div>

    
    @if ($posts->count())
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    {{--Table Headers--}}
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Author</th>
                    <th scope="col">Published On</th>
                </tr>
            </thead>
            <tbody>
              
                @foreach ($posts as $index => $post)
                    <tr>
                        <th scope="row">{{ $posts->firstItem() + $index }}</th>
                        
                        <td>
                           <!-- {{ $post->title }} -->
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </td>
                        
                      {{--Limit Content characters--}}
                        <td>
                            {{ Str::limit($post->content, 100) }}
                        </td>
                        
                        <td>
                            <a href="{{ route('users.posts.index', $post->user) }}">
                                {{ $post->user->name }}
                            </a>
                        </td>
                        
                     
                        <td>
                            {{ $post->created_at->format('M d, Y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-center">No posts found.</p>
    @endif
</div>
@endsection