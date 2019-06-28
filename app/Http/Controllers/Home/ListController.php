<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;

class ListController extends Controller
{	
	public static function getPidCateData($pid = 0)
    {
        //获取一级分类
        $data = Cates::where('pid',$pid)->get();
        foreach($data as $k=>$v){
            $v->sub = self::getPidCateData($v->id);
        }

        return $data;
    }

    public function __construct()
    {
    	// 引入类文件
		require 'D:\wamp64\www\blog\public\pscws4/pscws4.class.php';
		// 实例化
		@$this->cws = new \PSCWS4;
		//设置字符集
		$this->cws->set_charset('utf8');
		//设置词典
		$this->cws->set_dict('pscws4/etc/dict.utf8.xdb');
		//设置utf8规则
		$this->cws->set_rule('pscws4/etc/rules.utf8.ini');
		//忽略标点符号
		$this->cws->set_ignore(true);
    }

    public function dataWord()
    {
    	$data = DB::table('goods')->select('title','id')->get();
    	foreach ($data as $key => $value) {
    		$arr = $this->word($value->title);
    		foreach ($arr as $kk => $vv) {
    			DB::table('goods_words')->insert(['goods_id'=>$value->id,'word'=>$vv]);
    		}
    	}
    }


    public function index(Request $request)
    {	
    	// 压分词
    	//$this->dataWord();
        $id = $request->input('id','');
    	// 接收参数
    	$search = $request->input('search','');

    	//$data = DB::table('goods')->where('title','like','%'.$search.'%')->get();
    	// 中文分词 开始
    	if(!empty($search)){
    		$gid = DB::table('view_goods_words')->select('goods_id')->where('word',$search)->get();
	    	$gids = [];
	    	foreach ($gid as $key => $value) {
	    		$gids[] = $value->goods_id;
	    	}
	    	$data2 = DB::table('goods')->whereIn('id',$gids)->get();
	    }else{
	    	$data2 =  DB::table('goods')->where('cates_id',$id)->get();
	    }

    	// 中文分词结束

    	return view('home.list.index',['data'=>$data2]);
    }

    public function word($text)
    {	
    	$arr = explode(' ',$text);
    	$preg = '/[\w\+\%\.\(\)]+/';

    	$string = '';
    	foreach ($arr as $key => $value) {
    		$string .=preg_replace($preg,'',$value);
    	}

		//传递字符串
		$this->cws->send_text($string);
		//获取权重最高的前十个词
		// $res = $cws->get_tops(10);// top 顶部
		//获取所有的结果
		$res = $this->cws->get_result();
		$list = [];
		if($res){
			foreach ($res as $key => $value) {
				$list[] = $value['word'];
			}
		}
		return $list;
    }

    public function __destruct()
    {
    	//关闭
		$this->cws->close();
    }
}
