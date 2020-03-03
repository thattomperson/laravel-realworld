<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Returns the url of this users avatar from Gravatar.
     *
     * @return string
     */
    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/'.md5(\strtolower($this->email));
    }

    public function likes()
    {
        return $this->belongsToMany(Article::class, 'likes');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    public function like(Article $article)
    {
        return $this->likes()->attach($article->id);
    }

    public function unlike(Article $article)
    {
        return $this->likes()->detach($article->id);
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follower_id');
    }

    public function follow(self $user)
    {
        return $user->addFollower($this);
    }

    public function unfollow(self $user)
    {
        $user->removeFollower($this);
    }

    public function addFollower(self $user)
    {
        $this->followers()->attach($user->id);
    }

    public function removeFollower(self $user)
    {
        $this->followers()->detach($user->id);
    }
}
