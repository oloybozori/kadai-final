<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(3);
        $likes = $user->likes()->paginate(3);        
        
        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
            'likes' => $likes,
            ]);
    }
    
    public function likes($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのお気に入り一覧を取得
        $likes = $user->likes()->paginate(10);

        // 一覧ビューでそれらを表示
        return view('users.likes', [
            'user' => $user,
            'posts' => $likes,
        ]);
    }    
}
