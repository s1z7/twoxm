<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Models\Users;
use Hash;
use Mail;
class RegisterController extends Controller
{
    public function index()
    {
    	// 显示 注册页面	
    	return view('home.register.index');
    }

    // 执行 邮箱注册
    public function insert(Request $request)
    {
    	// dump($request->all());
        $upass = $request->input('upass'); 
        $repass = $request->input('repass'); 
        $email = $request->input('email'); 

       
        // 给密码加正则验证
        // $upass_a = "/^\w{6,18}$/";
        // $repass_a ="/^\w{6,18}$/";
        if(empty($email)){
             echo "<script>alert('邮箱不能为空');location.href='/home/register'</script>";
             exit;
        }
        if(!preg_match("/^[\w]{6,18}$/",$upass)){
             echo "<script>alert('密码格式错误');location.href='/home/register'</script>";
             exit;
        }
         if(!preg_match("/^[\w]{6,18}$/",$repass)){
             echo "<script>alert('确认密码格式错误');location.href='/home/register'</script>";
             exit;
        }

        if($upass != $repass){
            echo "<script>alert('两次密码输入不一致');location.href='/home/register'</script>";
            exit;
        }

       
        $token  = str_random(50);

        $user = new Users;
        $user->uname = $email;
        $user->upass = Hash::make($upass);
        $user->email = $email;
        $user->token = $token;
        $userdata = Users::where('uname','=',$email)->first();
        if(!$userdata){
             $res = $user->save();
            
            if($res){

                // send 模板的名字 模板里几个参数 
                 Mail::send('home.register.mail', ['id' => $user->id,'token'=>$token], function ($m) use ($email) {
               
                    // to 发送到的地址 subject 邮件标题
                    $s = $m->to($email)->subject('【two商城】 提醒邮件');
                     if($s){

                         echo "<script>alert('用户注册成功,请尽快完成激活');location.href='https://mail.qq.com/cgi-bin/loginpage'</script>";
                        }
                    });
                 
                 
            }else{
                echo "<script>alert('注册失败');location.href='/home/register'</script>";
            }
        }else{
                 echo "<script>alert('用户已存在');location.href='/home/register'</script>";
            }
       
    }

    public function changeStatus($id,$token)
    {
       // echo '激活'.$id;
       $user = Users::find($id);
       // dd($user);
       // 验证token
       if($user->token != $token){
            echo "<script>alert('链接失效');location.href='/home/register'</script>";
            exit;
       }
       // 链接只能用一次 再次访问的时候链接失效
       $user->status = 1;
       $user->token = str_random(50);
       if($user->save()){
           echo "<script>alert('激活成功');location.href='/home/index'</script>";
       }else{
            echo "<script>alert('激活失败');location.href='/home/register'</script>";
       }
    }
    // 执行手机号注册 
    public function store(Request $request)
    {
    	 //dd($request->all());
    	// 接收 用户手机号
    	$phone = $request->input('phone',0);
    	// dd($phone);
    	// 获取 验证码
    	$k = $phone.'_code';
    	
    	// 发送到手机上的验证码
    	$phone_code = session($k);
    	
    	// 用户输入的验证码
    	$code = $request->input('code',0);
    	
         if(empty($phone)){
             echo "<script>alert('手机号不能为空');location.href='/home/register'</script>";
             exit;
        }
    	// 比较用户输入的验证码和发送的验证码是否一致 若不一致 显示验证码错误 返回重新注册 
    	if($phone_code != $code){
    		echo "<script>alert('验证码错误');location.href='/home/register'</script>";
    		exit;
    	}
    	$upass = $request->input('upass',0);
    	
    	$repass = $request->input('repass',0);

		  if(!preg_match("/^[\w]{6,18}$/",$upass)){
             echo "<script>alert('密码格式错误');location.href='/home/register'</script>";
             exit;
        }
         if(!preg_match("/^[\w]{6,18}$/",$repass)){
             echo "<script>alert('确认密码格式错误');location.href='/home/register'</script>";
             exit;
        }
    	if($upass != $repass){
    		echo "<script>alert('两次密码输入不一致');location.href='/home/register'</script>";
    		exit;
    	}
 
    	$data = $request->all();
    	// dump($data);
    	$user = new Users;
    	$user->uname = $data['phone'];
    	$user->upass = Hash::make($data['upass']);
        $user->phone = $data['phone'];
        $user->token = str_random(50); //随机数
    	// 根据 输入的手机号 查找库中的用户名 找出表中数据 若存在 将不能再进行注册 
    	$userdata = Users::where('uname','=',$data['phone'])->first();
    	// dd($userdata);
    	if(!$userdata){
    		$res = $user->save();
    		if($res){
    			// return redirect('/home/register')->with('success','注册成功');
    			echo "<script>alert('注册成功');location.href='/home/index'</script>";
    		}else{
    			// return back()->with('error','注册失败');
    			echo "<script>alert('注册失败');location.href='/home/register'</script>";
    		}
    		
    	}else{
    		// return back()->with('error','用户已存在');
    		echo "<script>alert('用户已存在');location.href='/home/register'</script>";
    	}
    	
    }

    // 发送手机号 验证码
    public function sendPhone(Request $request)
    {
    	// 接收手机号
    	$phone = $request->input('phone');
    	
    	// 设置 验证码
    	$code = rand(1234,4321);
    	// 将验证码压入到 redis中 
    	$k = $phone.'_code';
    	session([$k=>$code]);
    	// Redis::setex('$k',600,json_encode($code));

    	$url = "http://v.juhe.cn/sms/send";
		$params = array(
		    'key'   => '58218722872e3645241bd374c695f0de', //您申请的APPKEY
		    'mobile'    => $phone, //接受短信的用户手机号码
		    'tpl_id'    => '165984', //您申请的短信模板ID，根据实际情况修改
		    'tpl_value' =>'#code#='.$code, //您设置的模板变量，根据实际情况修改
		    'dtype'	=> 'json',
		);

		$paramstring = http_build_query($params);
		$content = self::juheCurl($url, $paramstring);
		echo $content;
		// $result = json_decode($content, true);
		// if ($result) {
		//     var_dump($result);
		// } else {
		//     //请求异常
		// }
    	
    }




/**
 * 请求接口返回内容
 * @param  string $url [请求的URL地址]
 * @param  string $params [请求的参数]
 * @param  int $ipost [是否采用POST形式]
 * @return  string
 */
public static function juheCurl($url, $params = false, $ispost = 0)
{
    $httpInfo = array();
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    if ($ispost) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_URL, $url);
    } else {
        if ($params) {
            curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }
    $response = curl_exec($ch);
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
    curl_close($ch);
    return $response;
} 
}
