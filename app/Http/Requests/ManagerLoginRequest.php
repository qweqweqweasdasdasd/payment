<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerLoginRequest extends FormRequest
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
            'code' => 'required|captcha|integer',
            'mg_name' => 'required|between:4,16',
            'password' => 'required|between:4,16'
        ];
    }

    public function messages()
    {
        return [
            'code.integer' => '验证码格式不对哦!',
            'code.required' => '验证码没有填写哦!',
            'code.captcha' => '验证码不对哦!',
            'mg_name.required' => '管理员账号没有填写哦!',
            'mg_name.between' => '管理员账号大于4小于16个字符!',
            'password.required' => '密码没有填写的哦!',
            'password.between' => '密码大于4小于16个字符!'
        ];
    }
}
