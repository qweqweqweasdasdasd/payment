<?php

namespace App\Http\Controllers\Admin;

use App\Libs\Until;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PayproductRequest;
use App\Repositories\PayproductRepository;

class PayproductController extends Controller
{
    //数据库仓库
    protected $payproductRepository;

    public function __construct(PayproductRepository $payproductRepository)
    {
        $this->payproductRepository = $payproductRepository;
    }

    //显示支付产品
    public function index(Request $request)
    {
        $nav = $this->payproductRepository->CommonNav($request->path());
        $payproducts = $this->payproductRepository->GetPayproducts();
       
        return view('admin.payproduct.index',compact('nav','payproducts'));
    }

    //支付创建get
    public function create()
    {
        return view('admin.payproduct.create');
    }

    //支付创建post
    public function store(PayproductRequest $request)
    {
        $data = [
            'sort_id'=>$request->get('sort_id'),
            'pay_name'=>$request->get('pay_name'),
            'pay_icon'=>$request->get('pay_icon'),
            'roll_id'=>$request->get('roll_id'),
            'status'=>$request->get('status'),
            'roll_range'=> $request->get('roll_range'),
            
            'desc'=>$request->get('desc')
        ];

        if($this->payproductRepository->CommonInsert($request->all(),true)){
            return Until::Result(config('code.resource.success'),config('code.msg.6000'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.6001'));
    }

    //修改产品的状态
    public function reset(Request $request)
    {
        $p_id = $request->get('p_id');
        $data = array_except($request->all(),['p_id']);
        if($this->payproductRepository->CommonUpdate($p_id,$data)){
            return Until::Result(config('code.resource.success'),config('code.msg.6002'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.6003'));
    }

    //支付编辑get
    public function edit($id)
    {
        $payproduct = $this->payproductRepository->CommonFind($id);
        
        return view('admin.payproduct.edit',compact('payproduct'));
    }

    //支付编辑post
    public function update(Request $request, $id)
    {
        $data = [
            'sort_id'=>$request->get('sort_id'),
            'pay_name'=>$request->get('pay_name'),
            'pay_icon'=>$request->get('pay_icon'),
            'roll_id'=>$request->get('roll_id'),
            'status'=>$request->get('status'),
            'roll_range'=> $request->get('roll_range'),
            
            'desc'=>$request->get('desc')
        ];

        if($this->payproductRepository->CommonUpdate($id,$data)){
            return Until::Result(config('code.resource.success'),config('code.msg.6004'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.6005'));
    }

    //支付删除
    public function destroy($id)
    {
        if($this->payproductRepository->CommonDelete($id)){
            return Until::Result(config('code.resource.success'),config('code.msg.6006'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.6007'));
    }
}
