<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
	protected $table = 'types';
	
    public function type(){
    	return $this->belongsTo('App\Type');
	}
}
