<?php

namespace Picnook;

use Illuminate\Notifications\Notifiable;
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
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pics() {
        return $this->belongsToMany('Picnook\Pic', 'pic_user')->withTimestamps()->withPivot('mat_color', 'mat_thickness', 'frame_color', 'frame_thickness');

    }
  

    public function lists() {
        $list = $this->pics()->get();
        return $list;
    }

}
