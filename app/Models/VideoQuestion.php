<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoQuestion extends Model
{
    protected $fillable = [
        'video_id',
        'question'

    ];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function videoQuestionAnswer()
    {
        return $this->hasMany(VideoQuestionAnswer::class);
    }
}
