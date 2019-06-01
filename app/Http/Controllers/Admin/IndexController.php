<?php

namespace App\Http\Controllers\Admin;

use App\Libs\Platform;
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
    use Platform;
    public function index()
    {
        $pf = $this->GetPlatformName();
        //dump($pf);
        return view('admin.index.index',compact('pf'));
    }

    //后台管理--welcome 
    public function welcome()
    {
        $manager = $this->managerRepository->CurrentManager();
        //dump($manager);
        return view('admin.index.welcome',compact('manager'));
    }
}
