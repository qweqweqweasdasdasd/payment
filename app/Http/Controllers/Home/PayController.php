<?php

namespace App\Http\Controllers\Home;

use Payment\Config;
use App\Libs\Until;
use App\Libs\OrderTool;
use Payment\Client\Charge;
use Payment\Client\Notify;
use App\Libs\PaymentNotify;
use Illuminate\Http\Request;
use Payment\Common\PayException;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Repositories\PlatformRepository;
use App\Http\Controllers\Server\AccountController;

class PayController extends Controller
{
    //数据库仓库
    protected $platformRepository;

    public function __construct(PlatformRepository $platformRepository,OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->platformRepository = $platformRepository;
    }

    //显示支付
    public function list($pl_id)
    {
        $platform = $this->platformRepository->platform($pl_id);
        //平台和支付方式是一对多的关系,,,获取到支付方式的id数组
        $platformWithPayproduct = $this->platformRepository->GetPlatformPayproductIdAndName($pl_id);
        
        // dump($platformWithPayproduct);
        return view('home.pay.list',compact('platform','platformWithPayproduct'));
    }

    //显示支付方式下拉菜单和支付账号
    public function list2(Request $request)
    {
        $pl_id = $request->get('pl_id');
        $p_id = $request->get('p_id');

        //生成一个收款账号  (官方||非官方)
        // $Account = new AccountController();
        // $a = $Account->getAccount($pl_id,$p_id);
        // dump($a);

        //生成订单

    }

    //结算金额
    public function jiesuan(Request $request)
    {
        //组装订单数据  //
        $order = $this->packageData($request->all());
        //写入数据库
        if(!$this->orderRepository->subOrder($order)){
            return Until::Result(config('code.resource.error'),config('code.msg.10002'));
        }
        $pay_way = $order['pay_type'];
        //dd($order);
        /**
        * ali_wap：支付宝 PC 网页支付
        * 如果这里不清楚，去Payment\Config类查看，都在这里。
        */
        if (!in_array($pay_way, ['wx_wap', 'cmb_charge','ali_wap'])) {
            Until::Result(config('code.resource.success'),config('code.msg.20000'));
        }

        $payData = [
                'body'            => '测试', //对一笔交易的具体描述信息。
                'subject'         => $order['username'], //标题
                'order_no'        => $order['order_no'],  //订单号不可重复向支付宝发送
                //'amount'          => $order['order_amount'], //单位：元
                'amount'          => '0.1', //单位：元
                'timeout_express' => $order['timeout_express'], //过期时间（当前时间+过期s数），必须大于当前支付请求时间
                'client_ip'       => $request->ip(),
                'goods_type'      => '0',	//0:虚拟商品 1:实物商品
                'return_param'    => 'recharge' //异步通知时原样返回的数据，不需要urlencode。不可包含特殊符号
            ];
        
        /**
        * Config::ALI_CHANNEL_WAP 	== 'ali_wap'| 'wx_qr'
        * Config::ALI_CHARGE	 	== 'ali_charge'
        * Config::ALI_CHANNEL_WEB 	== 'wx_charge'
        */

        //获取到哪个收款账号
        //TODO

        //支付宝h5   
        if($pay_way == Config::ALI_CHANNEL_WAP){
            $type = Config::ALI_CHARGE;
        }
        //微信h5
        elseif($pay_way == Config::WX_CHANNEL_WAP){
            $type = Config::WX_CHARGE;
        }
        //招商h5
        elseif($pay_way == Config::CMB_CHANNEL_WAP){
            $type = Config::CMB_CHARGE;
        }

        $config = config('payment');
        
        // 调用payment组件接口 返回发起支付的url
        $payment_url = Charge::run($pay_way, $config[$type], $payData);
        
        //跳转到支付宝
        return ['code'=>config('code.resource.success'),'herf' => $payment_url];
    }

    //异步通知地址 返回 trade_status
    public function notify_url(Request $request)
    {
        $order = $this->orderRepository->GetOrder($request->get('out_trade_no'));
        $pay_way = ($order->pay_type);
        //支付宝h5   
        if($pay_way == Config::ALI_CHANNEL_WAP){
            $type = Config::ALI_CHARGE;
        }
        //微信h5
        elseif($pay_way == Config::WX_CHANNEL_WAP){
            $type = Config::WX_CHARGE;
        }
        //招商h5
        elseif($pay_way == Config::CMB_CHANNEL_WAP){
            $type = Config::CMB_CHARGE;
        }
        //支付方式是否存在
        
        if(!in_array($type,[Config::ALI_CHARGE,Config::WX_CHARGE,Config::CMB_CHARGE])){
            return ['支付方式不存在'];
        }

        $channel = $type;
        $config = config('payment');
        $callback = new PaymentNotify();
        
        try {
            $ret = Notify::run($channel, $config[$channel], $callback);
            Log::error($ret);
        } catch (PayException $e) {
            Log::error($channel . ':支付通知：' . $e->getTraceAsString());
        }
        return $ret;
    }

    //同步跳转  不返回 trade_status
    public function return_url(Request $request)
    {
        $order = $this->orderRepository->GetOrder($request->get('out_trade_no'));
        $pay_way = ($order->pay_type);
        //支付宝h5   
        if($pay_way == Config::ALI_CHANNEL_WAP){
            $type = Config::ALI_CHARGE;
        }
        //微信h5
        elseif($pay_way == Config::WX_CHANNEL_WAP){
            $type = Config::WX_CHARGE;
        }
        //招商h5
        elseif($pay_way == Config::CMB_CHANNEL_WAP){
            $type = Config::CMB_CHARGE;
        }
        //支付方式是否存在
        
        if(!in_array($type,[Config::ALI_CHARGE,Config::WX_CHARGE,Config::CMB_CHARGE])){
            return ['支付方式不存在'];
        }
        //支付成功修改订单号
        $res = $this->orderRepository->paysuccess($order);
        
        // $channel = $type;
        // $config = config('payment');
        // $callback = new PaymentNotify();
        
        // try {
        //     $ret = Notify::run($channel, $config[$channel], $callback);
        //     Log::error($ret);
        // } catch (PayException $e) {
        //     Log::error($channel . ':支付通知：' . $e->getTraceAsString());
        // }
        // return $ret;
    }

    //组装订单数据
    public function packageData($d)
    {
        $pay_way = explode('-',$d['pay_way']);
        $order = [
            'pl_id' => (int)$d['pl_id'],
            'p_id' => (int)$pay_way[1],
            'pay_type' => $pay_way[0],
            'u_id' => !empty($d['u_id'])?trim($d['u_id']):'1',     //暂时没有该功能
            'username' => !empty($d['username'])?trim($d['username']):'',
            'pa_id' => !empty($d['pa_id'])?trim($d['pa_id']):'13', 
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
}
