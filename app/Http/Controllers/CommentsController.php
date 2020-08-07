<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    protected $fillable = [
        'user_id', 'comment', 'post_id',
    ];    
        
    
    public function store(Request $request)
    {
        //Validattion
        $request->validate([
            'comment' => 'required',
        ]);
        
        $comment = new Comment($request->all());
        $comment->save();
        
        return back();
    }    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
        public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
