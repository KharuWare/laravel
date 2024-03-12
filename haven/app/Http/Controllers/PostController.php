<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function deletePost(Post $post)
    {
        if (auth()->user()->id === $post->user_id) {
            $post->delete();
            return redirect('/posts');
        }

        return redirect('/posts');
    }

    public function postUpdate(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/');
        }


        $incomingFields = $request->validate([
            'title' => ['required', 'max:30'],
            'body' => ['required', 'max:1000'],
            'category' => 'required|string|in:Technology,Gaming,Music,Art,Off-Topic',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $post->update($incomingFields);
        return redirect('/posts');
    }

    public function getPost(Post $post)
    {
        return view('post', ['post' => $post]);
    }

    public function getUserPosts(Post $post)
    {
        if (auth()->user()->id === $post->user_id) {
        return view('user-posts', ['post' => $post]);
    } 
    }
    public function editPost(Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/');
        }

        return view('post-edit', ['post' => $post]);
    }
    public function createPost(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'body' => 'required',
        'category' => 'nullable|string|in:Technology,Gaming,Music,Art,Off-Topic',
    ]);

    $validatedData['title'] = strip_tags($validatedData['title']);
    $validatedData['body'] = strip_tags($validatedData['body']);

    $post = new Post();
    $post->title = $validatedData['title'];
    $post->body = $validatedData['body'];
    $post->category = $validatedData['category'];
    $post->user_id = auth()->id();
    $post->save();

    return redirect('/posts');
}
}
