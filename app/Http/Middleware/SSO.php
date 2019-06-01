<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class SSO
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //得到session_id 
        $sessionId = $request->session()->getId();
        //从数据库内比对 ? 无,更新到数据库 : 删除源码内的session_id 跳转到登陆页面 ;
        $manager = Auth::guard('back')->user();
        
        //判断数据库内的sessionid是否存在
        if(!($manager->session_id)){
            $manager->session_id = $sessionId;
            $manager->update();
        }
        //判断数据库内和登录的sessionid是否一致
        if($manager->session_id != $sessionId){
            try {
                //删除sessionid文件 
                $session_file = storage_path() . '/framework/sessions/' . $manager->session_id;
                @unlink($session_file);
                //更新最新的sessionid
                $manager->session_id = $sessionId;
                $manager->update();
            } catch (\Exception $e) {
            }

        }
        // dump(Auth::guard('back'));
        return $next($request);
    }
}
