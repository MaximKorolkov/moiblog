<?php

namespace App;

class Thread extends BaseModel
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'thread_users');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}