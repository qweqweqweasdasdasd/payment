<?php

namespace App\Http\Controllers\Admin;

use App\Libs\Until;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ManagerRepository;
use App\Http\Requests\ManagerLoginRequest;

class LoginController extends Controller
{
    //数据库仓库
    protected $managerRepository;

    public function __construct(ManagerRepository $managerRepository)
    {
        $this->managerRepository = $managerRepository;
    }

    //后台管理--登录
    public function index()
    {
        if(\Auth::guard('back')->check()){
            return redirect('/admin/index');
        }
        return view('admin.login.index');
    }

    //后台管理--验证
    public function sigIn(ManagerLoginRequest $request)
    {
        $name_password = $request->only(['mg_name','password']);
        //auth验证
        
        if(!(\Auth::guard('back')->attempt($name_password))){
            return Until::Result(config('code.resource.error'),config('code.msg.1001'));
        }

        //管理员状态 1 开启 2 关闭
        if($this->managerRepository->CurrentManager()->status == 2){
            return Until::Result(config('code.resource.error'),config('code.msg.1000'));
        };         

        //记录 ip 最后登录时间 登录次数
        $data = [
            'ip' => $request->getClientIp(),
            'last_time' => date('Y-m-d H:i:s',time())
        ];
        $this->managerRepository->UpdateManagerLastloginIp($data) && $this->managerRepository->LoginCountIncrement();

        return Until::Result(config('code.resource.success'),config('code.msg.1002'));
    }

    //后台管理--退出登录
    public function logout()
    {
        \Auth::guard('back')->logout();
        return redirect('/admin/login');
    }
}
