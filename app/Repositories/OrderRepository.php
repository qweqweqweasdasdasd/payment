<?php 
namespace App\Repositories;

use DB;
use App\Order;
use Illuminate\Support\Facades\Schema;

class OrderRepository extends BaseRepository
{
    //实例化之后赋值给父类
    public function __construct()
    {
        $this->table = 'order';
        $this->id = 'o_id';
    }

    //获取到所有的订单数据
    public function GetOrders($d)
    {
        $order = (new Order)->setTable($this->getOrdersName($d['pl_id']))
                    ->where(function($query) use($d){
                        if( !empty($d['pl_id']) ){
                            $query->where('pl_id',$d['pl_id']);
                        }
                        if( !empty($d['p_id']) ){
                            $query->where('p_id',$d['p_id']);
                        }
                    })
                    ->with(['account','payproduct','platform'])
                    ->orderBy('o_id','desc')
                    ->paginate(12);
                    
        return $order;
    }

    //获取到订单数据的总数
    public function count($d)
    {
        $count = (new Order)->setTable($this->getOrdersName($d['pl_id']))->count();
        return $count;
    }

    //使用(平台)分表,自动创建数据表,添加数据
    public function subOrder($data)
    {
        $tableName = "p_order_pl_id_".$data['pl_id'];
        $tables = DB::select("SHOW TABLES");
        $tablesArr = json_decode(json_encode($tables),true);
        $createName = "order_pl_id_".$data['pl_id'];
        
        //查询数据库内是否有该分表
        $tableTemp = [];
        foreach ($tablesArr as $k => $v) {
            if( strstr($v['Tables_in_paydata'],'p_order_pl_id_') ){
                $tableTemp[] = $v['Tables_in_paydata'];
            };
        }
        
        //合并表字符串
        $str = '';
        foreach ($tableTemp as $k => $v) {
            $str .= '`' . $v . '`,';
        }
        $tables = $str . '`' . $tableName . '`';
        

        //没有该表,创建一张分表
        if(!in_array($tableName,$tableTemp)){
            DB::select($this->createOrderSql($data));   //建立分表
            //判断'p_order'是否存在
            if(!$this->tableExist($tablesArr,'p_orders')){
                DB::select($this->createMergeSql());        //建立合并表
            }
            DB::select($this->updateMergeSql($tables));   //更新合并表
        }

        //添加两条数据
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['o_id'] = $this->get_order_id();

        return (new Order())->setTable("order_pl_id_".$data['pl_id'])->insert($data);
    }

    //分表唯一的id 
    protected function get_order_id()
    {
        $getId = DB::table('create_id')->insertGetId(['created_at'=>date('Y-m-d H:i:s',time())]);
        return $getId;
    }

    //获取需要查询的表
    protected function getOrdersName($pl_id)
    {
        //没有平台的时候查询order表
        //有平台的时候查询分表
        if(! empty($pl_id) ){
            return 'order_pl_id_' . $pl_id;
        }
        return 'orders';
    }

    //新建数据表结构
    protected function createOrderSql($data)
    {
        $sql = "CREATE TABLE `p_order_pl_id_".$data['pl_id']."` (
            `o_id` int(11) unsigned NOT NULL,
            `pl_id` int(11) DEFAULT '0' COMMENT '平台id',
            `p_id` int(11) DEFAULT '0' COMMENT '支付方式id',
            `u_id` int(11) DEFAULT '0' COMMENT '提交用户id',
            `pa_id` int(11) DEFAULT '0' COMMENT '收款账号id',
            `order_amount` varchar(50) DEFAULT '' COMMENT '订单金额',
            `order_no` varchar(100) DEFAULT '' COMMENT '订单号',
            `order_time` int(11) DEFAULT NULL COMMENT '下单时间',
            `status` tinyint(4) DEFAULT '0' COMMENT '1下单成功 2支付成功 3上分成功 4上分失败 ',
            `real_amount` varchar(50) DEFAULT '' COMMENT '真实金额',
            `bio` varchar(255) DEFAULT '' COMMENT '介绍',
            `created_at` datetime DEFAULT NULL,
            `updated_at` datetime DEFAULT NULL,
            `deleted_at` datetime DEFAULT NULL,
            PRIMARY KEY (`o_id`),
            UNIQUE KEY `order_no` (`order_no`)
          ) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;";
       return $sql;
    }

    //新建合并表
    public function createMergeSql()
    {
        $sql = "CREATE TABLE `p_orders` (
            `o_id` int(11) unsigned NOT NULL,
            `pl_id` int(11) DEFAULT '0' COMMENT '平台id',
            `p_id` int(11) DEFAULT '0' COMMENT '支付方式id',
            `u_id` int(11) DEFAULT '0' COMMENT '提交用户id',
            `pa_id` int(11) DEFAULT '0' COMMENT '收款账号id',
            `order_amount` varchar(50) DEFAULT '' COMMENT '订单金额',
            `order_no` varchar(100) DEFAULT '' COMMENT '订单号',
            `order_time` int(11) DEFAULT NULL COMMENT '下单时间',
            `status` tinyint(4) DEFAULT '0' COMMENT '1下单成功 2支付成功 3上分成功 4上分失败 ',
            `real_amount` varchar(50) DEFAULT '' COMMENT '真实金额',
            `bio` varchar(255) DEFAULT '' COMMENT '介绍',
            `created_at` datetime DEFAULT NULL,
            `updated_at` datetime DEFAULT NULL,
            `deleted_at` datetime DEFAULT NULL,
            PRIMARY KEY (`o_id`),
            UNIQUE KEY `order_no` (`order_no`)
          ) ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8;";
        return $sql;
    }

    //判断该表是否存在
    public function tableExist($tablesArr,$table)
    {
        $tableTemp = [];
        foreach ($tablesArr as $k => $v) {
            if( strstr($v['Tables_in_paydata'],$table) ){
                $tableTemp[] = $v['Tables_in_paydata'];
            };
        }
        return ($tableTemp);
    }

    //创建合并表
    public function updateMergeSql($tables)
    {  
        $sql = "ALTER TABLE p_orders UNION = (".$tables.");";
        return $sql;
    }
}