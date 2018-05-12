<?php

namespace App;

class Message extends BaseModel
{
    protected $fillable = [
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function threads()
    {
        return $this->belongsTo(Thread::class);
    }
}