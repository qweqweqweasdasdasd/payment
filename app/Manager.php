<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    protected $primaryKey = 'mg_id';
	protected $table = 'manager';
    protected $fillable = [
    	'mg_name','password','session_id','r_id','last_time','login_counts','status','ip','phone','desc','pl_id'
    ];
    protected $rememberTokenName = '';

    //管理员和角色一对一关系
    public function roles()
    {
        return $this->hasOne('App\Role','r_id','r_id');
    }

    //管理员和平台一对一关系
    public function platform()
    {
        return $this->hasOne('App\Platform','pl_id','pl_id');
    }
}
