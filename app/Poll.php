<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Poll extends Model
{
    //
    public function post()
    {
        return $this->belongsTo(Post::class, 'postId', 'id');
    }
   
    public function ratePost()
    {
        return $this->belongsTo(RatePoll::class, 'id', 'poll_id');
    }
}
