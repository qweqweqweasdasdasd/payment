<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $primaryKey = 'pa_id';
	protected $table = 'account';
    protected $fillable = [
    	'pl_id','p_id','account_name','account_num','balance','activing','status'
    ];

    //对应平台 一对一
    public function platform()
    {
        return $this->hasOne('App\Platform','pl_id','pl_id');
    }

    //对应产品 一对一
    public function payproduct()
    {
        return $this->hasOne('App\Payproduct','p_id','p_id');
    }
}
