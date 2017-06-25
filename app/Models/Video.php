<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'embed',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(VideoQuestion::class);
    }

    public function questionAnswers()
    {
        return $this->hasMany(VideoQuestionAnswer::class);
    }
}
