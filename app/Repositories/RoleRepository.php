<?php 
namespace App\Repositories;

use Auth;
use App\Role;
use App\Permission;
use App\Libs\Platform;

class RoleRepository extends BaseRepository
{
    use Platform;
    //实例化之后赋值给父类
    public function __construct()
    {
        $this->table = 'role';
        $this->id = 'r_id';
    }

    //获取到所有的角色的列表
    public function GetRoles($d)
    {
        return Role::with(['managers'=>function($query){
                    if($pl_id = $this->GetManagerPlatformId()){
                        $query->where('pl_id',$pl_id);
                    }
                }])
                ->where(function($query) use($d){
                    if( !empty($d['r_name']) ){
                        $query->where('r_name',$d['r_name']);
                    }
                })
                ->orderBy('r_id','asc')
                ->paginate(9);
    }

    //获取到一条角色信息
    public function FindRoleWithManagers($id)
    {
        return Role::with('managers')->find($id);
    } 

    //获取到不同级权限列表
    public function PermissionLevel($level=0)
    {
        return Permission::orderBy('p_id','desc')->where('ps_level',$level)->get();
    }

    //保存权限数据
    public function PDS($id,$d)
    {
        //组装ca字符串
        
        $ps_ca = Permission::select(\DB::raw("concat(p_c,'-',p_a) as ca"))
                    ->whereIn('p_id',$d['qx'])
				    ->whereIn('ps_level',[1,2])
                    ->pluck('ca')
                    ->toArray();
        $data = [
            'ps_ca' => implode(',',$ps_ca),
            'ps_ids'=> implode(',',$d['qx']),
        ];
        
        dd($data);
        dd($id);
    }
}