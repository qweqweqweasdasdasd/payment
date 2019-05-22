<?php

namespace App\Http\Controllers\Home;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
//https://learnku.com/articles/10885/full-use-of-jwt

class UserController extends Controller
{
    //私有仓库
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        // 这里额外注意了：官方文档样例中只除外了『login』
        // 这样的结果是，token 只能在有效期以内进行刷新，过期无法刷新
        // 如果把 refresh 也放进去，token 即使过期但仍在刷新期以内也可刷新
        // 不过刷新一次作废
        $this->middleware('auth:api', ['except' => ['login']]);
        // 另外关于上面的中间件，官方文档写的是『auth:api』
        // 但是我推荐用 『jwt.auth』，效果是一样的，但是有更加丰富的报错信息返回
    }

    //登录的逻辑 查询是否有该用户(无插入新数据)  
    public function login(Request $request)
    {
        $username = !empty($request->get('username'))? trim($request->get('username')):'';  
        $user = $this->userRepository->FindByUsername($username);
       
        $credentials = [
            'username' => $username,
            'password' => '123456'
        ];
        
        if(is_null($user)){
            $data = [ 
                'username' => $credentials['username'],
                'password' => Hash::make($credentials['password'])
            ];
            
            $user = $this->userRepository->SavaUser($data);
        }
        
        //查询平台是否有该用户(调用平台的接口)
        if( !$token = auth('api')->attempt($credentials) ){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
        
    }

    //获取到个人信息
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    //登录之后返回token令牌
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}
