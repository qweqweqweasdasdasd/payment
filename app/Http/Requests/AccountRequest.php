<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    //规则
    protected $rules = [
        'account_name' => 'required|between:2,6',
        'account_num' => 'required|numeric|unique:account',
        'balance' => 'required|numeric',
        'p_id' => 'required|integer',
        'pl_id' => 'required|integer',
        'status' => 'required'
    ];

    //自定义错误
    protected $messages = [
        'account_name.required' => '收款账号名称必须存在!',
        'account_name.between' => '收款账号名称大于2小于6个字符!',
        'account_num.required' => '收款账号必须存在!',
        'account_num.numeric' => '收款账号必须为数字!',
        'account_num.unique' => '收款账号重复了哦!',
        'balance.required' => '当前余额必须存在!',
        'balance.numeric' => '当前余额格式不对!',
        'p_id.required' => '产品id必须存在!',
        'p_id.integer' => '产品id格式不对!',
        'pl_id.required' => '平台id必须存在!',
        'pl_id.integer' => '平台id格式不对!',
        'status.required' => '状态必须存在!'
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

        return $rules;
    }

    public function messages()
    {
        $messages = $this->messages;

        return $messages;
    }
}
