<?php

namespace App\Http\Controllers\Server;

use App\Libs\Until;
use Illuminate\Http\Request;
use App\Libs\GenerateAccount;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    //根据平台 && 根据支付方式,从数据库内按照收款账号轮播方式拿到收款账号,,返回出去
    //例:: http://www.payment.cc/api/get/platform/payproduct/3/4
    public function getAccount($pl_id,$p_id)
    {
        if( empty($pl_id) || empty($p_id) ){
            return Until::Result(config('code.resource.error'),config('code.msg.10000'));
        }
        $param = [
            'pl_id' => $pl_id,
            'p_id' => $p_id
        ];
        $ga = new GenerateAccount($param);
        //获取到一条收款账号
        $account = $ga->getAccount();
        if(is_null($account)){
            return Until::Result(config('code.resource.error'),config('code.msg.10003'));
        }
        //按照要求切换下一个账号
        $info = $ga->generate();
        app('log')->info('账号变动信息:'.$info.'-执行时间-'. date('Y-m-d H:i:s',time()) );
        //dd($account);
        return Until::Result(config('code.resource.success'),json_encode($account));
    }
}
