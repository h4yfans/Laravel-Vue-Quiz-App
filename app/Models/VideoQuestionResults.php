<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoQuestionResults extends Model
{
    protected $fillable = [
        'user_id',
        'video_id',
        'question_id',
        'answer_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function question()
    {
        return $this->belongsTo(VideoQuestion::class);
    }
}
