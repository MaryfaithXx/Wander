<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar', 'country', 'state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
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

	public function events() {
		return $this->belongsToMany(Event::class)->withTimestamps();
	}

	public function posts() {
		return $this->hasMany(Post::class);
	}

	public function profiles() {
		return $this->hasOne(Profile::class);
	}

  public function following() {
		return $this->belongsToMany(User::class)->withTimestamps();
	}

  public function followers() {
		return $this->belongsToMany(User::class)->withTimestamps();
	}

}
