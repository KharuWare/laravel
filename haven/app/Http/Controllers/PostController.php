<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function postDelete(Post $post)
    {
        if (auth()->user()->id === $post->user_id) {
            $post->delete();
            return redirect('/');
        }

        return redirect('/');
    }

    public function postUpdate(Post $post, Request $request)
    {
        if (auth()->user()->id === $post->user_id) {
            return redirect('/');
        }


        $incomingFields = $request->validate([
            'title' => ['required', 'max:30'],
            'body' => ['required', 'max:1000'],
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $post->update($incomingFields);
        return redirect('/');
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

        return view('edit-post', ['post' => $post]);
    }
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/posts');
    }
}
