<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Link,Object};

class Object extends Model
{
	public function links(){
		return $this->hasMany('App\Models\Link');
	}

	public function object(){
		return $this->belongsTo('App\Models\Object');
	}
}
