<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'location', 'languages_spoken', 'visited_cities', 'user_id'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'remember_token'
  ];

  public function users() {
    return $this->belongsTo(User::class);
}

}
