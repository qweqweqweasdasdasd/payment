<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'o_id';
	protected $table = 'order';
    protected $fillable = [
    	'pl_id','p_id','u_id','pa_id','order_amount','order_no','order_time','status','real_amount','username','pay_type','timeout_express'
    ];

    //对订单表进行分表
    public function setTable($table)
    {
        $this->table = $table;
        
        return $this;
    }

    //订单和用户一对一关系
    public function user()
    {
        return $this->hasOne('App\User','u_id','u_id');
    }

    //订单和平台一对一关系
    public function platform()
    {
        return $this->hasOne('App\Platform','pl_id','pl_id');
    }

    //订单和支付方式
    public function payproduct()
    {
        return $this->hasOne('App\Payproduct','p_id','p_id');  
    }

    //订单和收款账号一对关系
    public function account()
    {
        return $this->hasOne('App\Account','pa_id','pa_id');
    }
}
