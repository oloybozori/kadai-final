<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Region;
use App\Category;
use App\Comment;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(3);
        $regions = Region::orderBy('id', 'asc')->get();
        $categories = Category::orderBy('id', 'asc')->get();

        
        return view('welcome', [
            'posts' => $posts,
            'regions' => $regions,
            'categories' => $categories,
            ]);
    }

    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        if(\Auth::id() === $post->user_id) {
            $post->delete();
        }
        return redirect('/');
    }
    
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments()->orderBy('created_at', 'desc')->paginate(20);
        $categories = $post->categories()->get()->pluck('category');
        return view('posts.show', [
                'post' => $post,
                'comments' => $comments,
                'categories' => $categories,
            ]);
    }
    
    public function create() {
        $post = new Post;
        $regions = Region::all();
        $categories = Category::all();
        
        return view('posts.create', [
           'post' => $post, 
           'regions' => $regions,
           'categories' => $categories,
        ]);
    }
    
    public function store(Request $request)
    {
        //Validattion
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'region_id' => 'required',
            'category_id' => 'required',
        ]);
        
        $category_id = $request->category_id;
        $post_id = $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'region_id' => $request->region_id,
            ])->id;
        
        Post::find($post_id)->categories()->attach($category_id);
        
        return redirect('/');
    }

    public function my_posts($id) {
        $user = User::findOrFail($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
        $selected = 'posted by '. $user->name;
        return view ('commons.selected', [
            'posts' => $posts,
            'selected' => $selected,
        ]);
    }        

    public function my_likes($id) {
        $user = User::findOrFail($id);
        $posts = $user->likes()->orderBy('created_at', 'desc')->paginate(10);
        $selected = 'Likes by '. $user->name;
        return view ('commons.selected', [
            'posts' => $posts,
            'selected' => $selected,
        ]);
    }       
    
}
