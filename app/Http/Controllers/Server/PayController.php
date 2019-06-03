<?php

namespace App\Http\Controllers\Server;

use App\Libs\OrderTool;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;

class PayController extends Controller
{
    /**
     * 支付结算逻辑
     * 
     * 支付结算包含(免签:支付宝,微信)||(签约:支付宝,微信,招商支付)
     * 
     */
    //数据库仓库
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function jiesuan(Request $request)
    {
        //获取到支付类型分配组装数据的方式
        $order = $this->BaseData($request->all());
        //下单到数据库内
        if(!$this->orderRepository->subOrder($order)){
            return Until::Result(config('code.resource.error'),config('code.msg.10002'));
        }
        //执行免签支付还是官方支付
        dump($this->payRun($order));
        
    }

    //组装数据分发器
    public function BaseData($d)
    {
        $pay_way = explode('-',$d['pay_way']);
        $order = [
            'pl_id' => (int)$d['pl_id'],
            'p_id' => (int)$pay_way[1],
            'pay_type' => $pay_way[0],
            'u_id' => !empty($d['u_id'])?trim($d['u_id']):'1',     //暂时没有该功能
            'username' => !empty($d['username'])?trim($d['username']):'',
            'pa_id' => !empty($d['pa_id'])?trim($d['pa_id']):'13', //获取到一个收款账号
            'order_amount' => $d['pay_amount'],
            // 需要生成
            'order_no' => OrderTool::createUniquOrder(),
            'order_time' => OrderTool::now(),
            'timeout_express' => OrderTool::timeoutExpress(15),
            'status' => OrderTool::CREATE_ORDER,
            'real_amount' => OrderTool::createMoneyUniquDecimals([ 'amount'=>$d['pay_amount'],'pl_id'=>(int)$d['pl_id'],'p_id'=>(int)$pay_way[1] ])
        ];
        
        return $order;
    }

    //执行支付分发器
    public function payRun($order)
    {
        $pay_way = explode('_',$order['pay_type']); $order['pay_type'];
        if($pay_way[1] == 'alipay'){
            return $this->M_Alipay();
        }else if($pay_way[1] == 'wechat'){
            return 'wechat';
        }
        
        return 'gf';
    }

    //免签支付宝支付
    public function M_Alipay()
    {  
       
    }
}
