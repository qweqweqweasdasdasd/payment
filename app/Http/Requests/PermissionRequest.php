<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    protected $rules = [
        'p_name' => 'required|between:2,16|unique:permission',
        'p_pid' => 'required|numeric'
    ];
    protected $messages = [
        'p_name.required' => '权限名必须存在!',
        'p_name.between' => '权限大于2到小于16个字符!',
        'p_pid.required' => '父级必须存在!',
        'p_pid.numeric' => '父级格式不对!',
        'p_name.unique' => '权限名不许重复!'
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
        if(Request::get('p_pid') != 0){     //顶级权限
            $rules['p_c'] = 'required|between:2,16';
            $rules['p_a'] = 'required|between:2,16';
            $rules['ps_route'] = 'required';
        };
        return $rules;
    }

    public function messages()
    {
        $messages = $this->messages;
        if(Request::get('p_pid') != 0){      //顶级权限
            $messages['p_c.required'] = '控制器必须存在';
            $messages['p_c.between'] = '控制器大于2小于16个字符';
            $messages['p_a.required'] = '方法必须存在';
            $messages['p_a.between'] = '方法大于2到小于16个字符';
            $messages['ps_route.required'] = '路由必须存在';
        }
        return $messages;
    }
}
