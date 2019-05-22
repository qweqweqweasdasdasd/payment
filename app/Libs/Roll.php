<?php 

namespace App\Libs;

use App\Account;

class Roll
{
    //$d roll_id,roll_range
    public static function go($d)
    {
        switch ($d['roll_id']) {
            case '0':
                
                break;
            case '1':  
                return self::r1($d);//达到支付次数(max)切换
            case '2':
                return self::r2($d);//按照时间轮换
            case '3':
                return self::r3($d);//达到支付次数(max)切换       
        }
    }   
    
    // 按照付款次数轮换
    public static function r1($d)
    {   
        if(self::pre($d)){
            //判断轮播条件
            if(!self::current($d)){
                //往下切换一个账号
                self::timeCycles($d);
                return '切换';
            };
            return '无切换';
        };
    }
    // 按照时间轮换
    public static function r2($d)
    {
        if(self::pre($d)){
            //判断轮播条件
            if(!self::current($d)){
                //往下切换一个账号
                self::timeCycles($d);
                return '切换';
            };
            return '无切换';
        };
    }
    
    // 按照预订金额轮换
    public static function r3($d)
    {
        if(self::pre($d)){
            //判断轮播条件
            
            if(!self::current($d)){
                //往下切换一个账号
                self::timeCycles($d);
                return '切换';
            };
            return '无切换';
        };
    }

    // 判断当前账号是否符合轮播要求
    public static function current($d)
    {
        $current = Account::where([ ['pl_id',$d['pl_id']],['p_id',$d['p_id']],['status',1],['activing',1] ])->first();
        //不存在记录
        if(is_null($current->carousel) || empty($current->carousel)){
            $data = [
                'roll_id' => $d['roll_id'],
                'current_roll_range' => self::switchValue($d['roll_id']),  //实时记录数值
                'pl_id' => $d['pl_id'],
                'p_id' => $d['p_id']
            ];
            
            //记录轮播条件
            $current->carousel = json_encode($data);
            $current->save();
        }
        //存在记录判断轮播条件
        
        if(!self::carouselCondition($d,$current)){
            //往下切换一个账号
            //self::timeCycles($d);
            return false;
        };
        return true;
    }

    //根据轮播方式切换不同数值
    public static function switchValue($roll_id)
    {
        switch ($roll_id) {
            case '1':
                return 0;
            case '2':
                return time();
            case '3':
                # code...
                break;
            
        }
    }

    // 往下切换一个账号
    public static function timeCycles($d)
    {
        $accounts = Account::where([ ['pl_id',$d['pl_id']],['p_id',$d['p_id']],['status',1] ])->get();
        foreach ($accounts as $k => $v) {
            if($v->activing == 1){
                if($k+1 >= count($accounts)){
                    $accounts[0]->activing = 1;
                    $accounts[0]->save();
                }else{
                    $accounts[$k+1]->activing = 1;
                    $accounts[$k+1]->save();
                }
                $v->activing = 0;
                $v->save();
                
                return true;
            }
        }
    }

    // 存在记录判断轮播条件
    public static function carouselCondition($map,$current)
    {
        //区分是什么轮播方式
        switch ($map['roll_id']) {
            case '1':   //达到支付次数(max)切换
                if( $map['roll_range'] > json_decode($current->carousel,true)['current_roll_range'] ){
                    $data = [
                        'roll_id' => $map['roll_id'],
                        'current_roll_range' => (json_decode($current->carousel,true)['current_roll_range'] +1),  //实时记录数值
                        'pl_id' => $map['pl_id'],
                        'p_id' => $map['p_id']
                    ];
                    $current->carousel = json_encode($data);
                    return $current->save();
                };
                return false;
                
            case '2':   //达到时间间隔(max)切换
                if( !($map['roll_range'] * 60 + json_decode($current->carousel,true)['current_roll_range'] < time()) ){
                    return true;
                };
                return false;
            case '3':   //达到收款金额(max)切换
                dd($map);
                echo '达到收款金额(max)切换';
                break;
            
        }
    }

    // 预处理,返回true代表继续向下执行
    public static function pre($d)
    {
        //要求的平台和要求的支付方式,状态为开启,状态为激活
        $first = Account::where([ ['pl_id',$d['pl_id']],['p_id',$d['p_id']],['status',1],['activing',1] ])->first();

        if(!count($first)){
            $first = Account::where([ ['pl_id',$d['pl_id']],['p_id',$d['p_id']],['status',1] ])->first();
            $first->update(['activing'=>1]);
            return true;
        }

        return true;
    }
}
