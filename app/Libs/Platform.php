<?php 

namespace App\Libs;

use Auth;
use App\Platform as pf;

trait Platform
{
    //获取到当前登录管理员的平台id
    public function GetManagerPlatformId()
    {
        $pl_id = Auth::guard('back')->user()->pl_id;
        return $pl_id;
    }

    //判断是否为超级管理员
    public function IsRoot()
    {
        if( Auth::guard('back')->user()->mg_id == 1 ){
            return true;
        }
        return false;
    }

    //获取到平台的名称
    public function GetPlatformName()
    {
        $pl_id = $this->GetManagerPlatformId();
        return pf::find($pl_id);
    }
}
