<?php

namespace App\Http\Controllers\Admin;

use App\Libs\Until;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerRequest;
use App\Repositories\ManagerRepository;

class ManagerController extends Controller
{
    //数据库仓库
    protected $managerRepository;

    public function __construct(ManagerRepository $managerRepository)
    {
        $this->managerRepository = $managerRepository;
    }

    //管理员列表
    public function index(Request $request)
    {
        error_reporting(0);
        $whereData = [
            'mg_name' => !empty($request->get('mg_name'))?$request->get('mg_name'):'',
            'r_id' => !empty($request->get('r_id'))?$request->get('r_id'):''
        ];

        $managers = $this->managerRepository->GetManagers($whereData);
        $nav = $this->managerRepository->CommonNav($request->path());
        $count = $managers->count();
        //dump($managers);
        return view('admin.manager.index',compact('nav','managers','count','whereData'));
    }

    //添加管理员 view
    public function create()
    {
        $roles = $this->managerRepository->GetRoleList();
        $platform = $this->managerRepository->GetPlatFormList();
        //dump($platform);
        return view('admin.manager.create',compact('roles','platform'));
    }

    //添加管理员 data
    public function store(ManagerRequest $request)
    {
        $data = array_except($request->all(),['password_confirmation']);
        $data['password'] = Hash::make($request->get('password'));
        if($this->managerRepository->CommonInsert($data,true)){
            return Until::Result(config('code.resource.success'),config('code.msg.3000'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.3001'));
    }

    //管理员状态 
    public function reset(Request $request)
    {
        $mg_id = $request->get('mg_id');
        $data = array_except($request->all(),['mg_id']);
        if($this->managerRepository->CommonUpdate($mg_id,$data)){
            return Until::Result(config('code.resource.success'),config('code.msg.3002'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.3003'));
    }

    //编辑管理员 view
    public function edit($id)
    {
        $manager = $this->managerRepository->CommonFind($id);
        $roles = $this->managerRepository->GetRoleList();
        $platform = $this->managerRepository->GetPlatFormList();

        return view('admin.manager.edit',compact('roles','manager','platform'));
    }

    //编辑管理员 data
    public function update(ManagerRequest $request, $id)
    {
        
        $data = array_except($request->all(),['mg_id']);
        if($this->managerRepository->CommonUpdate($id,$data)){
            return Until::Result(config('code.resource.success'),config('code.msg.3004'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.3005'));
    }

    //删除管理员 
    public function destroy($id)
    {
        if($this->managerRepository->CommonDelete($id)){
            return Until::Result(config('code.resource.success'),config('code.msg.3006'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.3007'));
    }

    //修改管理员密码
    public function setpwd(Request $request)
    {
        if($request->isMethod('post')){
            $mg_id = $request->get('mg_id');
            if( is_null($mg_id) || is_null($request->get('password')) ){
                return Until::Result(config('code.resource.error'),config('code.msg.3008'));
            }
            $data = [
                'password' => Hash::make($request->get('password'))
            ];
            if($this->managerRepository->CommonUpdate($mg_id,$data)){
                return Until::Result(config('code.resource.success'),config('code.msg.3009'));
            }
            return Until::Result(config('code.resource.error'),config('code.msg.3010'));
        }
        $managers = $this->managerRepository->GetMgNameMgId();
        //dump($managers);
        return view('admin.manager.setpwd',compact('managers'));
    }
}
