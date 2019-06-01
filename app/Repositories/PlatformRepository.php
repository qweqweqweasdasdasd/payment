<?php 
namespace App\Repositories;

use App\Platform;

class PlatformRepository extends BaseRepository
{
    //实例化之后赋值给父类
    public function __construct()
    {
        $this->table = 'platform';
        $this->id = 'pl_id';
    }

    //保存平台新数据 更新中间表
    public function platformInsert($data)
    {
        //更新中间表
        return $this->CommonInsert($data,true);
    }

    //获取到平台的所有数据
    public function GetPlatform()
    {
        return Platform::with('managers')->orderBy('pl_id','asc')->paginate(9);
    }

    //获取到平台的ID AND NAME
    public function GetPlatformIdAndName()
    {
        return Platform::orderBy('pl_id','asc')->pluck('name','pl_id')->toArray();
    }

    //同步平台id 和 支付方式id 
    public function SyncPlatformPayproduct($id,$d)
    {
        $platform = $this->platform($id);
        return $platform->payproducts()->sync($d);
    }

    //获取到一个平台的信息
    public function platform($id)
    {
        return Platform::find($id);
    }

    //从中间表获取到所有启用的支付方式
    public function GetPlatformPayproductIdAndName($pl_id)
    {
        $platform = Platform::find($pl_id);
        return $platform->payproducts()->where('status',1)->get();      
    }
}