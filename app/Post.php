<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Poll;
class Post extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function poll()
    {
        return $this->belongsTo(Poll::class, 'id', 'postId');
    }

    public function ratePoll()
    {
        return $this->belongsTo(RatePoll::class, 'id', 'poll_id');
    }
    
}
