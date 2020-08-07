<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class CategoriesController extends Controller
{
    public function show($id) {
        $posts = Category::find($id)->posts()->orderBy('created_at', 'desc')->paginate(10);
        $selected = Category::findOrFail($id)->category;
        return view ('commons.selected', [
            'posts' => $posts,
            'selected' => $selected,
        ]);
    }    
}
