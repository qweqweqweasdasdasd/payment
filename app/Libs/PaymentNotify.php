<?php 

namespace App\Libs;

use Payment\Notify\PayNotifyInterface;

class PaymentNotify implements PayNotifyInterface
{
    public function notifyProcess(array $data)
    {
        $channel = $data['channel'];
        //$type = isset($data['return_param']) ? $data['return_param'] : '';
        
        if ($channel === Config::ALI_CHARGE) {// 支付宝支付
            //支付成的逻辑

        } elseif ($channel === Config::WX_CHARGE) {// 微信支付

        } elseif ($channel === Config::CMB_CHARGE) {// 招商支付

        } elseif ($channel === Config::CMB_BIND) {// 招商签约

        } else {
            // 其它类型的通知
        }

        // 执行业务逻辑，成功后返回true
        return true;
    }

    //支付成功之后
    public function paysuccess()
    {
        
    }
}


