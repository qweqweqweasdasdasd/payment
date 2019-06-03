<?php

namespace App\Console\Commands;

use App\Libs\ChenPay\Pay;   //支付宝商家号
use App\Libs\ChenPay\AliPay;
use Illuminate\Console\Command;

class mianqianServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mianqianServer:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '免签产品监控';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         //include __DIR__ . '/../../../../vendor/autoload.php';
         $aliCookie = 'mobileSendTime=-1; credibleMobileSendTime=-1; ctuMobileSendTime=-1; riskMobileBankSendTime=-1; riskMobileAccoutSendTime=-1; riskMobileCreditSendTime=-1; riskCredibleMobileSendTime=-1; riskOriginalAccountMobileSendTime=-1; cna=xO+sEyAJuzYCAXE9Lk0xfgBB; unicard1.vm="K1iSL12yD/JTv3byDJkjxQ=="; 3FV_lastvisit=409%091550918121%09%2Fread.php%3Ftid%3D3508%26fid%3D65; UM_distinctid=16afe3d3683a28-0313a65e881efa-3e385b04-1fa400-16afe3d368498a; session.cookieNameId=ALIPAYJSESSIONID; csrfToken=s5hKE2Lr_rceWFy56nF3Xp95; ctoken=eaMvAn_3yp4E_LvJ; LoginForm=alipay_login_auth; alipay="K1iSL12z7H+pDwJw90V9GzfAd2UA1Xg0XYaKvDq8fEpZ2/9r4bw="; CLUB_ALIPAY_COM=2088431274451603; iw.userid="K1iSL12z7H+pDwJw90V9Gw=="; ali_apache_tracktmp="uid=2088431274451603"; zone=GZ00C; ALIPAYJSESSIONID=RZ24UAAj5tNvuNweggNXgLpH064L5qauthRZ24GZ00; CHAIR_SESS=bBWl0VCP1z0NIfxX04kO-z9AMYJNgnHJp7foMVVV4r7vIUmYp7mgRIzomNtEOCMip-NlC0JrBh8pYA_-DTGcj_xgFeHnkievKXx16yEy6DAg5OxYjmkJEMOeg5REImG624NvciV9HmLEzb_p_pJMcw==; rtk=xe5czhQgPTdzyU/lle7dCZSrG9cVaDFfJradywOS+fIO5I4H+zI; spanner=M/G/mwNz1HHAyFs7NJSQn4XEc92VuasKXt2T4qEYgj0=';

         $GLOBALS['aliSum'] = 1;
         $GLOBALS['aliType'] = true; // 支付宝接口切换
         $GLOBALS['aliStatus'] = time(); // 暂停 有订单情况下才是10秒一次的频率 杜绝支付宝风控
 
         Pay::Listen(10, function () use ($aliCookie) {
             // time 现在时间此为订单生成时间 默认3分钟有效时间
             $data = [['fee' => 0.01, 'time' => time() + 3 * 60]];
             if ($GLOBALS['aliStatus'] > time() && count($data) == 0) return;
             
             try {
                 $run = (new AliPay($aliCookie))->getData($GLOBALS['aliType'])->DataHandle();
                 dd($run);
                 foreach ($data as $item) {
                     $remarks = '123456'; //如果需要判断备注
                     $order = $run->DataContrast($item['fee'], $item['time'], 5, $remarks);
                     //dd($order);
                     if ($order) echo "{$order}order success：{$remarks}\n";
                     unset($order, $item);// 摧毁变量防止内存溢出
                 }
                 echo $GLOBALS['aliSum'] . "-run \n";
                 $GLOBALS['aliType'] = !$GLOBALS['aliType'];
                 $GLOBALS['aliSum']++;
                 $GLOBALS['aliStatus'] = time() + 2 * 60; //
             } catch (\ChenPay\PayException\PayException $e) {
                 echo $e->getMessage() . "\n";
                 unset($e);// 摧毁变量防止内存溢出
             }
             unset($run, $data);// 摧毁变量防止内存溢出
         });
    }
}
