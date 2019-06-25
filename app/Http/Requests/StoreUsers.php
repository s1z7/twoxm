<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsers extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uname' => 'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{5,17}$/',
            'upass' => 'required|regex:/^[\w]{6,18}$/',
            'repass' => 'required|same:upass',
            'email' => 'required|email',
            'phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
            'profile' => 'required',
        ];
    }

    /**
     * 自定义错误消息
     */
    public function messages()
    {
        return [
            'uname.required'=>'用户名不能为空!',
            'uname.regex'=>'用户名格式错误! 由6-18位 字母数字下划线组成',
            'uname.unique'=>'用户名已被使用!',
            'upass.required'=>'密码不能为空!',
            'upass.regex'=>'密码格式为6-18位!',
            'repass.required'=>'确认密码不能为空!',
            'repass.same'=>'两次密码不一致!',
            'email.required'=>'邮箱不能为空!',
            'email.email'=>'邮箱格式不正确! 例如 @163.com @qq.com',
            'phone.required'=>'手机号不能为空!',
            'phone.regex'=>'手机号格式不正确!',
            'profile.required'=>'头像不能为空!'
        ];
    }

}
