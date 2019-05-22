<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Repositories\PlatformRepository;
use App\Repositories\PayproductRepository;

class OrderController extends Controller
{
    //数据库仓库
    protected $orderRepository;

    public function __construct(orderRepository $orderRepository,PlatformRepository $platformRepository,PayproductRepository $payproductRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->platformRepository = $platformRepository;
        $this->payproductRepository = $payproductRepository;
    }

    //显示列表
    public function index(Request $request)
    {
        $whereData = [
            'pl_id' => !empty($request->get('pl_id'))?$request->get('pl_id'):'',
            'p_id' => !empty($request->get('p_id'))?$request->get('p_id'):''
        ];
        //dump($whereData);
        $nav = $this->orderRepository->CommonNav($request->path());
        $platformIdAndName = $this->platformRepository->GetPlatformIdAndName();
        $payproductIdAndName = $this->payproductRepository->GetPayproductIdAndName();
        //获取到所有订单数据
        $order = $this->orderRepository->GetOrders($whereData);
        //dump($order);
        //统计总数
        $count = $this->orderRepository->count($whereData);

        //dump($order);
        return view('admin.order.index',compact(
                        'nav',
                        'platformIdAndName',
                        'payproductIdAndName',
                        'order',
                        'count',
                        'whereData'
                    ));
    }

    //创建订单
    public function create()
    {
        //
    }

    //创建订单
    public function store(Request $request)
    {
        //
    }

    //显示订单
    public function show($id)
    {
        //
    }

    //更新订单
    public function edit($id)
    {
        //
    }

    //更新订单
    public function update(Request $request, $id)
    {
        //
    }

    //删除订单
    public function destroy($id)
    {
        //
    }
}
