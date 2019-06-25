<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    // 设置表名
    public $table = 'goods';

    // 配置一对一
    public function goodsinfos()
    {
    	return $this->hasOne('App\Models\goodsinfos','goods_id');
    }
}
