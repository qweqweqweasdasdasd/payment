<?php

namespace App\Console\Commands;

use Workerman\Worker;
use Workerman\Autoloader;
use Illuminate\Console\Command;

class WorkermanCommand extends Command
{
    protected $ws;
    // -d 是否以debug方式运行的
    protected $signature = 'workerman:ws {action} {--daemonize}';
    protected $description = 'workerman ws';
    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        //因为workerman需要带参数 所以得强制修改
        global $argv;
        $action=$this->argument('action');

        if(!in_array($action,['start','stop','restart','reload'])){
            $this->error('Error Arguments');
            exit;
        }

        $argv[0]='workerman:ws';
        $argv[1]=$action;
        $argv[2]=$this->option('daemonize')?'-d':'';

        switch ($argv[1]) {
            case 'start':
                $this->start();
                break;
            case 'stop':
                $this->stop();
                break;
            case 'restart':
                $this->restart();
                break;
            case 'reload':
                $this->reload();
                break;
        }
    }

    //开启一个服务
    private function start()
    {
        // 创建一个Worker监听9130端口，不使用任何应用层协议
        $this->ws = new Worker('websocket://0.0.0.0:9130');

        // 启动4个进程对外提供服务
        $this->ws->count = 4;
        $handler = \App::make('handlers\WorkermanHandler');
        
        // 连接时回调
        $this->ws->onConnect = [$handler, 'onConnect'];
        // 收到客户端信息时回调
        $this->ws->onMessage = [$handler, 'onMessage'];
        // 进程启动后的回调
        $this->ws->onWorkerStart = [$handler, 'onWorkerStart'];
        // 断开时触发的回调
        $this->ws->onClose = [$handler, 'onClose'];
        // 运行worker
        Worker::runAll();
    }    
}
