<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user','likes')->latest()->paginate(20);

        return view('posts.index',compact('posts'));
    }

    public function store(Request $request){

        $request->validate([
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();

    }

    public function destroy(Post $post){

        $this->authorize('delete', $post);

        $post->delete();

        return back();

    }
}
