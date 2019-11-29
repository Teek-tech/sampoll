<?php

namespace App;
use App\RatePoll;
use App\Poll;
use Illuminate\Database\Eloquent\Model;

class RatePoll extends Model
{
    public function ratePoll()
    {
        return $this->belongsTo(Poll::class, 'id', 'poll_id');
    }
}
