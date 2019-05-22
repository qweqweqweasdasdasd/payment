<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ManagerRepository;

class IndexController extends Controller
{
    //数据库仓库
    protected $managerRepository;

    public function __construct(ManagerRepository $managerRepository)
    {
        $this->managerRepository = $managerRepository;
    }

    //后台管理--首页
    public function index()
    {
        
        return view('admin.index.index');
    }

    //后台管理--welcome 
    public function welcome()
    {
        $manager = $this->managerRepository->CurrentManager();
        //dump($manager);
        return view('admin.index.welcome',compact('manager'));
    }
}
