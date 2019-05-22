<?php 
namespace App\Repositories;

use App\Account;

class AccountRepository extends BaseRepository
{
    //实例化之后赋值给父类
    public function __construct()
    {
        $this->table = 'account';
        $this->id = 'pa_id';
    }

    //获取到账号的所有信息
    public function GetAccounts($d)
    {
        $account = Account::with('platform','payproduct')
                        ->where(function($query) use($d){
                            if( !empty($d['pl_id']) ){
                                $query->where(['pl_id'=>$d['pl_id']]);
                            }

                            if( !empty($d['p_id']) ){
                                $query->where(['p_id'=>$d['p_id']]);
                            }

                            if( !empty($d['account_num']) ){
                                $query->where(['account_num'=>$d['account_num']]);
                            }
                        })
                        ->orderBy('pa_id','desc')
                        ->paginate(11);
        
        return $account; 
    }

    //获取到账号的数量
    public function GetAcccountCount($d)
    {
        $count = Account::where(function($query) use($d){
            if( !empty($d['pl_id']) ){
                $query->where(['pl_id'=>$d['pl_id']]);
            }

            if( !empty($d['p_id']) ){
                $query->where(['p_id'=>$d['p_id']]);
            }

            if( !empty($d['account_num']) ){
                $query->where(['account_num'=>$d['account_num']]);
            }
        })->count();

        return $count;
    }    
}