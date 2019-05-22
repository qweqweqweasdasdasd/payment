<?php

namespace App\Http\Controllers\Admin;

use App\Libs\Until;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Repositories\AccountRepository;
use App\Repositories\PlatformRepository;
use App\Repositories\PayproductRepository;

class AccountController extends Controller
{
    //数据库仓库
    protected $accountRepository;
    protected $platformRepository;

    public function __construct(AccountRepository $accountRepository,PlatformRepository $platformRepository,PayproductRepository $payproductRepository)
    {
        $this->accountRepository = $accountRepository;
        $this->platformRepository = $platformRepository;
        $this->payproductRepository = $payproductRepository;
    }

    //显示
    public function index(Request $request)
    {
        //收集搜索条件
        $whereData = [
           'pl_id' => !empty($request->get('pl_id'))? trim($request->get('pl_id')) : '',
           'p_id' => !empty($request->get('p_id'))? trim($request->get('p_id')) : '',
           'account_num' => !empty($request->get('account_num'))? trim($request->get('account_num')) : ''
        ];
        
        $account = $this->accountRepository->GetAccounts($whereData);
        $count = $this->accountRepository->GetAcccountCount($whereData);
        
        $nav = $this->accountRepository->CommonNav($request->path());
        $platformIdAndName = $this->platformRepository->GetPlatformIdAndName();
        $payproductIdAndName = $this->payproductRepository->GetPayproductIdAndName();

        //dump($payproductIdAndName);
        return view('admin.account.index',compact('nav','account','platformIdAndName','payproductIdAndName','count','whereData'));
    }

    //创建
    public function create()
    {
        //平台信息
        $platform = $this->platformRepository->GetPlatformIdAndName();
        //产品信息
        $payproduct = $this->payproductRepository->GetPayproductIdAndName();

        return view('admin.account.create',compact('platform','payproduct'));
    }

    //创建
    public function store(AccountRequest $request)
    {
        if($this->accountRepository->CommonInsert($request->all(),true)){
            return Until::Result(config('code.resource.success'),config('code.msg.7001'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.7002'));
    }

    //设置状态
    public function reset(Request $request)
    {
        $pa_id = $request->get('pa_id');
        $data = array_except($request->all(),['pa_id']);
        if($this->accountRepository->CommonUpdate($pa_id,$data)){
            return Until::Result(config('code.resource.success'),config('code.msg.7003'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.7004'));
    }

    //分配
    public function distribution($id)
    {
        //
    }

    //更新
    public function edit($id)
    {
        //平台信息
        $platform = $this->platformRepository->GetPlatformIdAndName();
        //产品信息
        $payproduct = $this->payproductRepository->GetPayproductIdAndName();
        $account = $this->accountRepository->CommonFind($id);
        //dump($account);
        return view('admin.account.edit',compact('platform','payproduct','account'));
    }

    //更新
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if($this->accountRepository->CommonUpdate($id,$data)){
            return Until::Result(config('code.resource.success'),config('code.msg.7005'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.7006'));
    }

    //删除
    public function destroy($id)
    {
        if($this->accountRepository->CommonDelete($id)){
            return Until::Result(config('code.resource.success'),config('code.msg.7007'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.7008'));
    }
}
