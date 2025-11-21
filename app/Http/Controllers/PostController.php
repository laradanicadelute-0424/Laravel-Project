<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function userPosts(User $user) {
        //will display the users posts.
        $posts = $user->posts()
                      ->latest() 
                      ->paginate(10); 

        return view('posts.pages.user-posts', compact('user', 'posts'));
    }
    
    public function index()
    {
        // return Post::all();
        $posts = Post::with('user')
                  ->latest() 
                  ->paginate(10); 

    return view('posts.pages.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.pages.create'); //will render the create form.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
       
        $validatedData = $request->validated();
    
        $validatedData['user_id'] = Auth::id();
        
        $validatedData['published_at'] = now(); 

        $post = Post::create($validatedData);

        return redirect()
        ->route('posts.show', $post) 
        ->with('success', 'Your new post, "' . $post->title . '," has been created!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user'); 
        return view('posts.pages.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $user = $post->user;

        return view('posts.pages.update', [
        'user' => $user, 
        'post' => $post, 
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
            $validated = $request->validated();

            $post->update($validated); 

            return redirect()->route('posts.show', $post)
                            ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return view('posts.pages.user-posts', compact('post'));
    }
}
