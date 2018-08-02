<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;


/**
 * @property mixed articles
 */
class User extends BaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Notifiable;

    use Authenticatable, Authorizable, CanResetPassword;

    use HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'city',
        'about',
        'published_email',
        'social_vk',
        'social_fb',
        'social_twitter',
        'social_instagram',
        'social_google',
        'social_telegram',
        'site',
        'avatar',
        'thumbImage',
    ];

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_followers', 'follower_id', 'user_id');
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'user_subscribers', 'subscriber_id', 'user_id');
    }

    public function threads()
    {
        return $this->belongsToMany(Thread::class, 'thread_users');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getThumbImageAttribute()
    {
        $path = explode('/', $this->attributes['avatar']);
        return implode('/', array_merge(array_slice($path, 0, 3), ['thumbs'], array_slice($path, 3)));
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
