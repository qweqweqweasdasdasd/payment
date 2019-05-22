<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    protected $rules = [
        'pl_id' => 'required|numeric',
        'p_id' => 'required|numeric',
        'u_id' => 'required|numeric',
        'pa_id' => 'required|numeric',
        'order_amount' => 'required|numeric'
    ];

    protected $messages = [
        'pl_id.required' => '平台id必须存在',
        'pl_id.numeric' => '支付id格式为数值',
        'p_id.required' => '支付方法必须存在',
        'p_id.numeric' => '支付方法格式为数值',
        'u_id.required' => '用户id必须存在',
        'u_id.numeric' => '用户格式为数值',
        'pa_id.required' => '支付收款账号必须存在',
        'pa_id.numeric' => '支付收款账号格式不对',
        'order_amount.required' => '支付金额必须填写',
        'order_amount.numeric' => '支付金额格式不对'
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
        if(Request::isMethod('post')){
            $rules = $this->rules;
        }
        return $rules;
    }

    //自定义错误信息
    public function messages()
    {
        if(Request::isMethod('post')){
            $messages = $this->messages;
        }
        return $messages;
    }
}
