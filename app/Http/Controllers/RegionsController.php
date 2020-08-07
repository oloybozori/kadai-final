<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Region;

class RegionsController extends Controller
{
    public function show($id) {
        $posts = Region::find($id)->posts()->orderBy('created_at', 'desc')->paginate(10);
        $selected = Region::findOrFail($id)->region;
        return view ('commons.selected', [
            'posts' => $posts,
            'selected' => $selected,
        ]);
    }
}
