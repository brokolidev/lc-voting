<?php

namespace App\Models;

use App\Models\Idea;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function votes()
    {
        return $this->belongsToMany(Idea::class, 'votes');
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getAvatar()
    {
        $avatarDefaults = ['identicon', 'monsterid', 'retro', 'robohash'];
        $randomInteger = rand(0, count($avatarDefaults) - 1);

        return "https://www.gravatar.com/avatar/"
                .md5( strtolower( trim( $this->email ) ) )
                ."?d={$avatarDefaults[$randomInteger]}"  
                ."&s=200";
    }

    public function isAdmin()
    {
        return in_array($this->email, [
            'bocalist@gmail.com'
        ]);
    }
}
