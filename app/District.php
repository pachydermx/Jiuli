<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Spot;

class District extends Model {

	public function hasManySpots(){
		return $this->hasMany('App\Spot', 'district_id', 'id');
	}

}
