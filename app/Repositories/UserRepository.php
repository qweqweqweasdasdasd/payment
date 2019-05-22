<?php 
namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository
{
    //实例化之后赋值给父类
    public function __construct()
    {
        $this->table = 'user';
        $this->id = 'u_id';
    }

    //通过会员账号获取到会员的信息
    public function FindByUsername($username)
    {
        return User::where('username',$username)->first();
    }

    //新建会员信息
    public function SavaUser($data)
    {
        return User::create($data);
    }
}