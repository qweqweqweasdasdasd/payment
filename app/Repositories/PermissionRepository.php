<?php 
namespace App\Repositories;

use App\Permission;

class PermissionRepository extends BaseRepository
{

    //实例化之后赋值给父类
    public function __construct()
    {
        $this->table = 'permission';
        $this->id = 'p_id';
    }

    //获取到 tree 树形结构数据
    public function Ptree()
    {
        return generateTree(Permission::orderBy('p_id','desc')->get()->toArray());
    }

    //tree权限
    public function GetTree()
    {
        return Permission::get();
    }

    //新建权限
    public function PermissionInsert($data)
    {
        if($data['p_pid'] != 0){
            $data['ps_level'] = (int)((Permission::find($data['p_pid'])->ps_level)+1);
        }
        return $this->CommonInsert($data,true);
    }

    //删除权限
    public function PermissionDelete($id)
    {
        $exist = Permission::where('p_pid',$id)->count();
        if(!$exist){
            return $this->CommonDelete($id);
        }
        return false;
    }

    //更新权限
    public function PermissionUpdate($data)
    {
        $p_id = $data['p_id'];
        $data = array_except($data,['p_id']);
        if($data['p_pid'] != 0){
            $data['ps_level'] = (int)((Permission::find($data['p_pid'])->ps_level)+1);
        }
        return $this->CommonUpdate($p_id,$data);
    }
}