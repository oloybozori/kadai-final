<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content',
    ];    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function like_users()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
    }    
    

    public function loadRelationshipCounts(){
        return $this->loadCount('likes');
    }

}
