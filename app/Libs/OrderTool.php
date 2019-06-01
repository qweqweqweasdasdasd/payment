<?php 

namespace App\Libs;

use Illuminate\Support\Facades\Redis; 
/**
 * 生成唯一的订单号 createUniquOrder()
 * 生成一个固定金额附带小数而且不重复的金额 createMoneyUniquDecimals()
 * 订单的状态数值     
 */
class OrderTool
{
    //订单状态
    CONST CREATE_ORDER 	    = 1; 	//下单成功
    CONST PAY_SUCCESS   	= 2; 	//支付成功
    CONST PAY_ERROR     	= 5; 	//支付失败
    CONST SCORE_SUCCESS  	= 3;	//上分成功
    CONST SCORE_ERROS   	= 4;  	//上分失败


    //生成唯一的订单号
    public static function createUniquOrder()
    {
        return strtoupper(md5(uniqid('laravel_',true)));
    }

    //下单时间
    public static function now()
    {
        return time();
    }

    //过期时间
    public static function timeoutExpress($s)
    {
        return time() + $s * 60;
    }

    /**
     * 生成一个固定金额附带小数而且不重复的金额    (200.11)
     * 
     * (以金额,平台id,和支付产品,)实际支付金额,金额池.判断金额池不满时,添加金额
     * 拿到一个实际支付金额(金额池),小数偏动的实际支付金额,保存到数据库内,状态为生成订单,
     * 5分钟内收到app发送的金额信息,
     * 和数据库内的金额对比,时间往前推5分钟到账,金额一致的,请求平台接口上分
     */
    public static function createMoneyUniquDecimals($d)
    {
        //判断参数是否为空
        if( empty($d['amount']) || empty($d['pl_id']) || empty($d['p_id']) ){
            throw new \Exception('参数不全,要求参数为金额,平台id,支付id');
        }

        $order_amount = $d['amount'];
        $pl_id = $d['pl_id'];
        $p_id = $d['p_id'];

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
