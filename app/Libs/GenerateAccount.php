<?php 

namespace App\Libs;

use DB;
use Exception;
use App\Libs\Roll;

class GenerateAccount
{
    protected $pl_id;       //根据平台id
    protected $p_id;        //支付方式id
    protected $userID;      //会员账号
    protected $roll_id;     //轮播方式
    protected $roll_range;  //轮播条件
    protected $accountList; //收款账号列表  

    //构造函数获取到平台和支付方式
    public function __construct($d)
    {
        $this->pl_id = $d['pl_id'];
        $this->p_id = $d['p_id'];
    }

    //从数据库内按照收款账号轮播的方式拿到收款账号
    public function generate()
    {
        try {
            //从产品表内拿到数据判断 根据平台id,支付方式的轮播方式,判断是否开启功能
            $this->GetPlatformInfo();
            //根据平台id和支付方式id内获取到收款账号列表
            $this->GetAccountByPlatformIdAndpayproductId();
            //根据支付方式的配置文件要求,获取到一个收款账号,
            $data = [
                'roll_id' => $this->roll_id,
                'roll_range' => $this->roll_range,
                'pl_id' => $this->pl_id,
                'p_id' => $this->p_id
            ];
            return (Roll::go($data));

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        //生成订单号
    }

    //从数据库内拿到收款账号
    public function getAccount()
    {
        $account = DB::table('account')
                ->select('pa_id','pl_id','p_id','account_name','account_num','activing','status')
                ->where([['pl_id',$this->pl_id],['p_id',$this->p_id],['activing',1]])
                ->first();
        return $account;
    }

    //根据平台id和支付方式id内获取到收款账号列表
    public function GetAccountByPlatformIdAndpayproductId()
    {
        $accountList = DB::table('account')
                    ->where([
                        ['pl_id',$this->pl_id],
                        ['p_id',$this->p_id],
                        ['status',1]
                    ])
                    ->get();
                    
        //判断集合是否为空
        if(!count($accountList)){
            throw new Exception('收款账号为空,请添加!');
        }
        $this->accountList = json_decode($accountList,true);
    }

    //从产品表内拿到数据判断 根据平台id,支付方式的轮播方式,判断是否开启功能,那到配置文件放在类的属性上
    public function GetPlatformInfo()
    {
        // (1) 平台,支付方式中间表(平台是否存在该支付方式)
        if(!DB::table('platform_payproduct')->where([ ['pl_id',$this->pl_id],['p_id',$this->p_id] ])->count()){
            throw new Exception('该平台不存在这个支付方式!');
        }

        // (2) 产品表 判断是否开启 拿到支付方式的轮播配置文件
        $payproduct = DB::table('payproduct')->where('p_id',$this->p_id)->first();

        // (3) 判断支付方式不存在
        if(is_null($payproduct)){
            throw new Exception('该支付方式不存在,没有上架!');
        }
        // (4) 判断支付方式状态
        if($payproduct->status == 2){
            throw new Exception('该支付方式状态为关闭!');
        };
        // (5) 添加到属性上
        $this->roll_id = $payproduct->roll_id;
        $this->roll_range = $payproduct->roll_range;
    }

}
