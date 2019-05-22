<?php

namespace App\Http\Controllers\Admin;

use App\Libs\Until;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Repositories\PermissionRepository;

class PermissionController extends Controller
{
    //数据库仓库
    protected $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    //权限列表
    public function index(Request $request)
    {
        $Ptree = $this->permissionRepository->Ptree();

        $nav = $this->permissionRepository->CommonNav($request->path());
        //dump($Ptree);
        return view('admin.permission.index',compact('nav','Ptree'));
    }

    //创建权限
    public function create()
    {
        $Ptree = $this->permissionRepository->Ptree();
        //dump($GetTree);
        return view('admin.permission.create',compact('Ptree'));
    }

    //创建权限
    public function store(PermissionRequest $request)
    {
        if($this->permissionRepository->PermissionInsert($request->all())){
            return Until::Result(config('code.resource.success'),config('code.msg.4000'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.4001'));
    }

    //
    public function show($id)
    {
        //
    }

    //编辑权限
    public function edit($id)
    {
        $Ptree = $this->permissionRepository->Ptree();
        $permission = $this->permissionRepository->CommonFind($id);
        //dump($permission);
        return view('admin.permission.edit',compact('Ptree','permission'));
    }

    //编辑权限
    public function update(Request $request, $id)
    {
        if($this->permissionRepository->PermissionUpdate($request->all())){
            return Until::Result(config('code.resource.success'),config('code.msg.4002'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.4003'));
    }

    //删除权限
    public function destroy($id)
    {
        if($this->permissionRepository->PermissionDelete($id)){
            return Until::Result(config('code.resource.success'),config('code.msg.4004'));
        }
        return Until::Result(config('code.resource.error'),config('code.msg.4005'));
    }
}
