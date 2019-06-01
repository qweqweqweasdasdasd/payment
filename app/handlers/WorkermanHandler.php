<?php
namespace handlers;

use Workerman\Lib\Timer;

// 心跳间隔10秒
define('HEARTBEAT_TIME',50);

class WorkermanHandler {
    // 处理客户端连接
    public function onConnect($connection) {
        echo "链接成功";
    }

    // 处理客户端消息
    public function onMessage($connection, $data) {
        //当上来数据获取最后上传数据的时间
        $connection->lastMessageTime = time();
        //想客户端发送hello
        switch ($data) {
            case 'init':
                //获取初始化数据
                $d = $this->BudanList();
                $connection->send('初始化数据: ' . $d);
            break;

            case 'ping':
                //实时更新数据
                $d = 'ping';
                $connection->send('实时更新的数据: ' . $d);
            break;

        }

    }

    // 处理客户端断开
    public function onClose($connection) {
        echo "connection closed from ip {$connection->getRemoteIp()}\n";
    }

    // 补单列表
    public function BudanList()
    {
        //实例化ws 订单
        echo 'ping';
    }

    // 
    public function onWorkerStart($worker)
    {
        Timer::add(1,function() use($worker){
            $time_now = time();
            foreach ($worker->connections  as $connection) {
               if(empty($connection->lastMessageTime)){
                    $connection->lastMessageTime = $time_now;
                    continue;
               }

               if($time_now - $connection->lastMessageTime > HEARTBEAT_TIME) {
                    echo "Client ip {$connection->getRemoteIp()} timeout!!!\n"; $connection->close();
                }
            }
        });
    }
}