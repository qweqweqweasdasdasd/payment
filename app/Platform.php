<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $primaryKey = 'pl_id';
	protected $table = 'platform';
    protected $fillable = [
    	'name','app_id','secret','admin_url','android_secret'
    ];

    //平台和管理员一对多的关系
    public function managers()
    {
        return $this->hasMany('App\Manager','pl_id','pl_id');
    }

    //平台和支付产品多对多关系建立
    public function payproducts(Type $var = null)
    {
        return $this->belongsToMany('App\Payproduct','platform_payproduct','pl_id','p_id')->withTimestamps();
    }


}
