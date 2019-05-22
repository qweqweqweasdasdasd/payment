<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payproduct extends Model
{
    protected $primaryKey = 'p_id';
	protected $table = 'payproduct';
    protected $fillable = [
    	'sort_id','pay_name','pay_icon','roll_id','roll_info','status','desc'
    ];

    //支付产品和平台的多对多关系建立
    public function platforms(Type $var = null)
    {
        return $this->belongsToMany('App\Platform','platform_payproduct','p_id','pl_id');
    }
}
