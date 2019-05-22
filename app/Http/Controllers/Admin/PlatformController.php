<?php

namespace App\Http\Controllers\Admin;

use App\Libs\Until;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlatformRequest;
use App\Repositories\ManagerRepository;
use App\Repositories\PlatformRepository;
use App\Repositories\PayproductRepository;

class PlatformController extends Controller
{
    //数据库仓库
    protected $platformRepository;
    protected $managerRepository;

    public function __construct(PlatformRepository $platformRepository,ManagerRepository $managerRepository,PayproductRepository $payproductRepository)
    {
        $this->platformRepository = $platformRepository;
        $this->managerRepository = $managerRepository;
        $this->payproductRepository = $payproductRepository;
    }

    //显示平台列表
    public function index(Request $request)
    {
        $nav = $this->platformRepository->CommonNav($request->path());
        $platform = $this->platformRepository->GetPlatform();

        return view('admin.platform.index',compact('nav','platform'));
    }

    //创建平台get
    public function create()
    {
        //$managers = $this->managerRepository->GetMgNameMgId();
        return view('admin.platform.create');
    }

    //创建平台post
    public function store(PlatformRequest $request)
    {
        if($this->platformRepository->platformInsert($request->all())){
            return Until::Result(config('code.resource.success'),config('code.msg.5000'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.5001'));
    }

    //编辑平台get
    public function edit($id)
    {
        $platform = $this->platformRepository->CommonFind($id);
        //dump($platform);
        return view('admin.platform.edit',compact('platform'));
    }

    //编辑平台post
    public function update(Request $request, $id)
    {
        $data = array_except($request->all(),['pl_id']);
        if($this->platformRepository->CommonUpdate($id,$data)){
            return Until::Result(config('code.resource.success'),config('code.msg.5002'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.5003'));
    }

    //删除平台
    public function destroy($id)
    {
        if($this->platformRepository->CommonDelete($id)){
            return Until::Result(config('code.resource.success'),config('code.msg.5004'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.5005'));
    }

    //显示分配支付方式页面
    public function disaccount(Request $request,$id)
    {
        if($request->isMethod('post')){
            //更新平台和支付方式关系表
            if($this->platformRepository->SyncPlatformPayproduct($id,$request->get('dis'))){
                return Until::Result(config('code.resource.success'),config('code.msg.5006'));
            }
            return Until::Result(config('code.resource.error'),config('code.msg.5007'));

        }
        //所有的支付方式
        $payproduct = $this->payproductRepository->GetPayproducts();
        //$platform = $this->platformRepository->CommonFind($id);
        $platform = ($this->platformRepository->platform($id));
        $payproducts = $platform->payproducts()->get();
        $payproductsArr = [];
        foreach ($payproducts as $k => $v) {
            $payproductsArr[] = $v->p_id;
        }
        
        //dump($payproductsArr);
        return view('admin.platform.disaccount',compact('payproduct','platform','payproductsArr'));
    }
}
