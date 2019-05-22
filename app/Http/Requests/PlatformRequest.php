<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class PlatformRequest extends FormRequest
{
    protected $rules = [
        'name' => 'required|max:20|unique:platform',
        //'mg_id' => 'required',
        'app_id' => 'required|max:100',
        'secret' => 'required|max:100',
        'admin_url' => 'required|url',
        'android_secret' => 'required|max:100'
    ];

    protected $messages = [
        'name.required' => '平台名称必须存在!',
        'name.max' => '平台名称不得超出20个字符!',
        'name.unique' => '平台名称不得重复!',

        //'mg_id.required' => '管理员必须存在!',

        'app_id.required' => '平台接口商户id必须存在!',
        'app_id.max' => '平台接口商户id不得超出100个字符!',

        'secret.required' => '平台商户接口秘钥必须存在!',
        'secret.max' => '平台商户接口秘钥不得超出100个字符!',

        'admin_url.required' => '平台管理后台登录域名必须存在!',
        'admin_url.url' => '平台管理后台登录域名格式不对!',

        'android_secret.required' => '安卓app监控秘钥必须存在!',
        'android_secret.max' => '安卓app监控秘钥不得超出100个字符!'
    ];
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
        $rules = $this->rules;
        if(!Request::isMethod('post')){

        }
        return $rules;
    }

    public function messages()
    {
        $messages = $this->messages;
        if(!Request::isMethod('post')){

        }
        return $messages;

    }
}
