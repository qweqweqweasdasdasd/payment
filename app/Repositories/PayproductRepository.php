<?php 
namespace App\Repositories;

use App\Payproduct;

class PayproductRepository extends BaseRepository
{
    //实例化之后赋值给父类
    public function __construct()
    {
        $this->table = 'payproduct';
        $this->id = 'p_id';
    }

    //支付产品所有数据
    public function GetPayproducts()
    {
        return Payproduct::orderBy('sort_id','desc')->get();
    }

    //获取产品 ID AND NAME
    public function GetPayproductIdAndName()
    {
        return Payproduct::orderBy('sort_id','desc')->pluck('pay_name','p_id')->toArray();
    }
}