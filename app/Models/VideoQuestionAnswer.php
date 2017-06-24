<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoQuestionAnswer extends Model
{
    protected $fillable = [
        'video_id',
        'question_id',
        'answer',
        'is_correct'
    ];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function question()
    {
        return $this->belongsTo(VideoQuestionResults::class);
    }
}
