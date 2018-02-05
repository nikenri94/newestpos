<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

	protected $table = 'types';
    public function product(){
    	return $this->belongsTo('App\Product');
	}
	public function unit(){
    	return $this->hasMany('App\Unit');
	}
}
