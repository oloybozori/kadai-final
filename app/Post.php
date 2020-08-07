<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'region_id',
    ];    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    
    public function like_users()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
    }    
    

    public function loadRelationshipCounts(){
        return $this->loadCount('likes', 'comment');
    }
    
    // コメント
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }    
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }

}
