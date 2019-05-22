<?php

namespace App\Http\Controllers\Home;

use Hash;
use App\Libs\Until;
use App\Libs\ResponseJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MemberRepository;
use App\Repositories\PlatformRepository;

class MemberController extends Controller
{
    //数据库仓库
    protected $platformRepository;
    protected $memberRepository;

    public function __construct(PlatformRepository $platformRepository,MemberRepository $memberRepository)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->platformRepository = $platformRepository;
        $this->memberRepository = $memberRepository;
    }

    //显示登录页面
    public function index()
    {
        $getPlatformIdAndName = $this->platformRepository->GetPlatformIdAndName();
        //dump($getPlatformIdAndName);
        return view('home/member/index',compact('getPlatformIdAndName'));
    }

    use ResponseJson;
    //登陆之后拿到令牌
    public function login(Request $request)
    {
        //收集用户的信息
        $whereData = [
            'username' => !empty($request->get('username'))?trim($request->get('username')):'',
            'pl_id' => !empty($request->get('pl_id'))?trim($request->get('pl_id')):''
        ];
        if( empty($whereData['username']) || empty($whereData['pl_id']) ){
            return Until::Result(config('code.resource.error'),'用户或者平台id为空');
        }
        //查询数据库是否存在该用户
        $member = $this->memberRepository->MemberWhere($whereData);

        if( !count($member) ){
            //查询平台是否存在该用户

            //存在的话保存
            $whereData['password'] = Hash::make('123456');
            $member = $this->memberRepository->SavaMember($whereData);
        }
        //模拟用户登录获取到token 
        $credentials = [
            'username' => $whereData['username'],
            'password' => '123456'
        ];
        if( !$token = auth('api')->attempt($credentials) ){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        //拿到令牌
        return $this->respondWithToken($token);
    }

    //获取到个人信息
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    //登录之后返回token令牌
    public function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
