<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaks extends Model
{
    public $table="speaks";
    public function speaks_users()
    {
    	return $this->belongsTo('App\Models\Users','users_id');
    }
    public function speaks_goods()
    {
    	return $this->belongsTo('App\Models\Goods','goods_id');
    }
}
