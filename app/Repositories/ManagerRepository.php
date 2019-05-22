<?php 
namespace App\Repositories;

use Auth;
use App\Role;
use App\Manager;
use App\Platform;

class ManagerRepository extends BaseRepository
{

    //实例化之后赋值给父类
    public function __construct()
    {
        $this->table = 'manager';
        $this->id = 'mg_id';
    }

    //当前管理员
    public function CurrentManager()
    {
        return Auth::guard('back')->user();
    }

    //获取到管理员列表
    public function GetManagers($whereData)
    {
        return Manager::where(function($query) use($whereData){
                if( !empty($whereData['mg_name']) ){
                    $query->where('mg_name',$whereData['mg_name']);
                }
                if( !empty($whereData['r_id']) ){
                    $query->where('r_id',$whereData['r_id']);
                }
            })
            ->with('roles','platform')
            ->orderBy('mg_id','asc')
            ->paginate(9);
    }

    //后期到管理员名称和id
    public function GetMgNameMgId()
    {
        return Manager::select('mg_id','mg_name')->orderBy('mg_id','asc')->get();
    }

    //记录管理员最后登录时间和ip
    public function UpdateManagerLastloginIp($d)
    {
        $mgID = $this->CurrentManager()->mg_id;
        return $this->CommonUpdate($mgID,$d);
    }

    //获取到角色列表
    public function GetRoleList()
    {
        return Role::select('r_name','r_id','status')->orderBy('r_id','asc')->get();
    }

    //获取到平台列表
    public function GetPlatFormList()
    {
        return Platform::select('name','pl_id')->orderBy('pl_id','asc')->get();
    }

    //记录管理员登录的次数
    public function LoginCountIncrement()
    {
        $mgID = $this->CurrentManager()->mg_id;
        return $this->CommonIncrement($mgID,'login_counts');
    }
    
}