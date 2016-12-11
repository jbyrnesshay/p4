<?php

namespace Picnook;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    
	public function users() {

	return $this->belongsToMany('Picnook\User')->withTimestamps();

  }

}
