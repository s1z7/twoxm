<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $table="orders";
    // 根据订单找用户
    public function orders_users()
    {
    	return $this->belongsTo('App\Models\Users','users_id');
    }
    // 根据订单找地址
    public function orders_addresses()
    {
    	return $this->belongsTo('App\Models\Addresses','address_id');
    }
    // 根据订单找商品
    public function orders_goods()
    {
    	return $this->belongsTo('App\Models\Goods','goods_id');
    }
}
