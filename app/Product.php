<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	
    public function type(){
    	return $this->hasOne('App\Type');
	}
}
