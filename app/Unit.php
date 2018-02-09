<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
	protected $table = 'units';
	
    public function type(){
    	return $this->belongsTo('App\Type');
	}
}
