<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    


    /**
     * このユーザが所有する投稿。（ Micropostモデルとの関係を定義）
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    
    /**
     * カウント
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('posts');
    }
    
    // お気に入り
    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimestamps();
    }

    /**
     * 指定された $postIdの投稿をこのユーザがお気に入り済であるか調べる。済ならtrueを返す。
     *
     * @param  int  $postId
     * @return bool
     */
    public function in_likes($postId)
    {
        // 登録済みのお気に入りの中に $postIdのものが存在するか
        return $this->likes()->where('post_id', $postId)->exists();
    }
    
        /**
     * $postIdで指定された投稿をlikeする。
     *
     * @param  int  $postId
     * @return bool
     */
    public function like($postId)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->in_likes($postId);

        if ($exist) {
            // すでに登録していれば何もしない
            return false;
        } else {
            // 未登録であれば登録する
            $this->likes()->attach($postId);
            return true;
        }
    }

    // unlike
    public function unlike($postId)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->in_likes($postId);

        if ($exist) {
            // 登録済みであれば外す
            $this->likes()->detach($postId);
            return true;
        } else {
            // まだであれば何もしない
            return false;
        }
    }
    
    
}
