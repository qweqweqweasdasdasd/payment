<?php

namespace App\Http\Controllers\Admin;

use App\Libs\Until;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    //数据库仓库
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    //用户组列表
    public function index(Request $request)
    {
        $dataWhere = [
            'r_name' => $request->input('r_name','')
        ];

        $roles = $this->roleRepository->GetRoles($dataWhere);
        $count = $roles->count();
        $nav = $this->roleRepository->CommonNav($request->path());
        //dump($roles);
        return view('admin.role.index',compact(
                'nav',
                'roles',
                'count',
                'dataWhere'
            ));
    }

    //添加用户组
    public function create()
    {
        return view('admin.role.create');
    }

    //添加用户组
    public function store(RoleRequest $request)
    {
        $data = array_except($request->all(),['_token']);
        if($this->roleRepository->CommonInsert($data,true)){
            return Until::Result(config('code.resource.success'),config('code.msg.2000'));
        };
        return Until::Result(config('code.resource.error'),config('code.msg.2001'));
    }

    //显示用户组
    public function reset(Request $request)
    {
        $r_id = $request->get('id');
        $status = array_except($request->all(),['id']);
        if($this->roleRepository->CommonUpdate($r_id,$status)){
            return Until::Result(config('code.resource.success'),config('code.msg.2007'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.2008'));
    }

    //编辑用户组
    public function edit($id)
    {
        $role = $this->roleRepository->CommonFind($id);
        //dump($role);
        return view('admin.role.edit',compact('role'));
    }

    //编辑用户组
    public function update(RoleRequest $request, $id)
    {
        $data = array_except($request->all(),['r_id','_token']);
        //dd($data);
        if($this->roleRepository->CommonUpdate($id,$request->all())){
            return Until::Result(config('code.resource.success'),config('code.msg.2002'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.2003'));
    }

    //删除用户组
    public function destroy($id)
    {
        
        $RoleCount = count($this->roleRepository->FindRoleWithManagers($id)->managers);
        if($RoleCount){
            return Until::Result(config('code.resource.error'),config('code.msg.2006'));    //角色下面是否有管理员
        }
        if($this->roleRepository->CommonDelete($id)){
            return Until::Result(config('code.resource.success'),config('code.msg.2004'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.2005'));
    }

    //分配权限
    public function distribute(Request $request,$id)
    {
        if($request->isMethod('post')){
            if($this->roleRepository->PDS($id,array_except($request->all(),['r_id']))){
                return Until::Result(config('code.resource.success'),config('code.msg.2006'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.2007'));
        }
        $permission_l = $this->roleRepository->PermissionLevel();
        $permission_ll = $this->roleRepository->PermissionLevel(1);
        $permission_lll = $this->roleRepository->PermissionLevel(2);
        $role = $this->roleRepository->CommonFind($id);
        //dump($permission_l);
        return view('admin.role.distribute',compact('role','permission_l','permission_ll','permission_lll'));
    }
}
