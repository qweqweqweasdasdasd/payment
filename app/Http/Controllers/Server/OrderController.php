<?php

namespace App\Http\Controllers\Server;

use App\Libs\ResponseJson;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Http\Controllers\Server\AmountPoolController;

class OrderController extends Controller
{
    //私有仓库
    protected $orderRepository;
    //构造函数
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    //生成订单号
    //例::http://www.payment.cc/api/create/platform/order
    //分表::按照平台创建数据表,,然后插入数据

    use ResponseJson;
    public function createOrder(OrderRequest $request)
    {
        //收集数据
        $order = [
            'pl_id' => $request->input('pl_id'),
            'p_id' => $request->input('p_id'),
            'u_id' => $request->input('u_id'),
            'pa_id' => $request->input('pa_id'),
            'order_amount' => $request->input('order_amount'),
            // 需要生成
            'order_no' => $this->createOrderNo(),
            'order_time' => time(),
            'status' => 1,
            'real_amount' => (new AmountPoolController)->createUniquAmount($request->input('order_amount'))
        ];
        //dump($order);
        if($this->orderRepository->subOrder($order)){
            return $this->JsonData(config('code.resource.success'),config('code.msg.10001'));
        }
        return $this->JsonData(config('code.resource.error'),config('code.msg.10002'));

    }

    //生成订单号
    public function createOrderNo()
    {
        return strtoupper(md5(uniqid('laravel_',true)));
    }


    /**
     * (以金额,平台id,和支付产品,)实际支付金额,金额池.判断金额池不满时,添加金额
     * 拿到一个实际支付金额(金额池),小数偏动的实际支付金额,保存到数据库内,状态为生成订单,
     * 5分钟内收到app发送的金额信息,
     * 和数据库内的金额对比,时间往前推5分钟到账,金额一致的,请求平台接口上分
     */
}
