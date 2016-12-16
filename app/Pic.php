<?php

namespace Picnook;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    
	public function users() {

	return $this->belongsToMany('Picnook\User', 'pic_user')->withTimestamps()->withPivot('mat_color', 'mat_thickness', 'frame_color', 'frame_thickness', 'cost');
	
	}
}
