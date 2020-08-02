<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
        /**
     * Postをお気に入り登録するアクション。
     *
     * @param  $id  Postのid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idの投稿をlikeする
        \Auth::user()->like($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * Micorpostをお気に入りから除外するアクション。
     *
     * @param  $id  Postのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idの投稿ユーザをunlikeする
        \Auth::user()->unlike($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
