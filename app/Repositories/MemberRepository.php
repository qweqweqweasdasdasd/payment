<?php 
namespace App\Repositories;

use App\Member;

class MemberRepository extends BaseRepository
{

    //实例化之后赋值给父类
    public function __construct()
    {
        $this->table = 'member';
        $this->id = 'm_id';
    }

    //保存用户的信息返回用户的信息
    public function SavaMember($d)
    {
        return Member::create($d);
    }

    //按照条件获取到 会员一册数据
    public function MemberWhere($d)
    {
        return Member::where($d)->first();
    }
}