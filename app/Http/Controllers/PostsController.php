<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(3);
        
        return view('welcome', [
            'posts' => $posts,
            ]);
    }

    public function store(Request $request)
    {
        //Validattion
        $request->validate([
            'content' => 'required',
        ]);
        
        // 認証済みユーザの投稿を作成
        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        
        return back();
    }
    
    public function destory($id)
    {
        $post = \App\Post::findOrFail($id);
        
        if(\Auth::id() === $post->user_id) {
            $post->delete();
        }
        return back();
    }
}
