<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ManagerRequest extends FormRequest
{
    protected $rules = [
        'mg_name' => 'required|unique:manager|between:2,16',
        'password' => 'required|between:2,16|confirmed',
        'password_confirmation' => 'required',
        'status' => 'required|integer',
        'r_id' => 'required|integer',
        'pl_id' => 'required|integer'
    ];

    protected $messages = [
        'mg_name.required' => '管理员必须存在!',
        'mg_name.unique' => '管理员名称不得重复!',
        'mg_name.between' => '管理员大于2小于16个字符!',
        'password.required' => '密码必须存在',
        'password.between' => '密码大于2小于16个字符',
        'password_confirmation.required' => '确认密码必须存在!',
        'password.confirmed' => '确认密码和密码不一致',
        'status.required' => '状态必须存在',
        'status.integer' => '状态格式不对',
        'r_id.required' => '角色必须存在',
        'r_id.integer' => '角色的格式不对',
        'pl_id.required' => '平台必须存在!',
        'pl_id.integer' => '平台格式不对!'
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
            $rules['mg_name'] = 'required|between:2,16';
            $rules['password'] = '';
            $rules['password_confirmation'] = '';
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
