<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    protected $rules = [
        'r_name' => 'required|between:2,16|unique:role',
        'desc' => 'max:255',
        'status' => 'required|integer'
    ];

    protected $messages = [
        'r_name.required' => '角色名称必须存在!',
        'r_name.between' => '角色大于2到16个字符!',
        'r_name.unique' => '角色名称重复了!',
        'status.required' => '状态必须存在!',
        'status.integer' => '状态为数值!',
        'desc.max' => '备注不得超出250个字符!'
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
            $rules['r_name'] = 'required|between:2,16';
        };
        return $rules;
    }

    public function messages()
    {
        $messages = $this->messages;
        if(!Request::isMethod('post')){
            $messages['r_name.required'] = '角色名称必须存在!';
            $messages['r_name.between'] = '角色大于2到16个字符';
        };
        return $messages;
    }
}
