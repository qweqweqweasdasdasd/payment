<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class PayproductRequest extends FormRequest
{
    //规则
    protected $rules = [
        'sort_id' => 'required|integer|between:100,2000|unique:payproduct',
        'pay_name' => 'required|max:100|unique:payproduct',
        'pay_icon' => 'required|integer',
        'roll_id' => 'required|integer',
        'status' => 'required|integer',
        'desc' => 'max:200'
    ];

    //自定义错误信息
    protected $messages = [
        'sort_id.required' => '排序号码必须存在!',
        'sort_id.unique' => '排序号码重复了!',
        'sort_id.integer' => '排序号码格式不对!',
        'sort_id.between' => '排序号码从100到2000',
        'pay_name.required' => '栏目名称必须存在!',
        'pay_name.max' => '栏目名称不得超出100',
        'pay_name.unique' => '栏目名称不得重复!',
        'pay_icon.required' => '栏目icon必须存在!',
        'pay_icon.integer' => '栏目icon格式不对!',
        'roll_id.required' => '循环id必须存在!',
        'roll_id.integer' => '循环id格式不对!',
        'status.required' => '状态必须存在',
        'status.integer' => '状态格式不对',
        'desc.max' => '描述不得超出200个字符!'
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
        if(Request::get('roll_id') != 0){
            $rules['roll_range'] = 'required|integer';
        };
        if(!Request::isMethod('post')){
            $rules['sort_id'] = 'required|integer|between:100,2000';
            $rules['pay_name'] = 'required|max:100';
        }
        return $rules;
    }

    public function messages()
    {
        $messages = $this->messages;
        if(Request::get('roll_id') != 0){
            $messages['roll_range.required'] = '循环间隔必须存在!';
            $messages['roll_range.integer'] = '循环间隔格式不对!';
        };
        if(!Request::isMethod('post')){
            
        }
        return $messages;
    }
}
