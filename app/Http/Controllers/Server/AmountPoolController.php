<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis; 


/**
 * (以金额,平台id,和支付产品,)实际支付金额,金额池.判断金额池不满时,添加金额
 * 拿到一个实际支付金额(金额池),小数偏动的实际支付金额,保存到数据库内,状态为生成订单,
 * 5分钟内收到app发送的金额信息,
 * 和数据库内的金额对比,时间往前推5分钟到账,金额一致的,请求平台接口上分
 */
class AmountPoolController extends Controller
{
    public function createUniquAmount($order_amount = 300,$pl_id = 3,$p_id = 4)
    {
        //判断列队长度
        if(Redis::llen('amountpool-'.$order_amount) <= 3){
            $real_amount = [];
            for ($i=0; $i < 100; $i++) { 
                $real_amount[] = ($order_amount - $i/100);
            }
            //进入列队
            Redis::expire('amountpool-'.$order_amount.'-'.$pl_id.'-'.$p_id,86400);//设置过期时间为10秒
            Redis::rpush('amountpool-'.$order_amount.'-'.$pl_id.'-'.$p_id,$real_amount);
        };
        
        $amount = Redis::lpop('amountpool-'.$order_amount.'-'.$pl_id.'-'.$p_id); //获取到第一个数值
        return $amount;
    }
}
