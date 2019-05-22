<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//用户登录的逻辑
Route::post('/login','Home\UserController@login');
//用户退出
Route::post('/logout','Home\UserController@logout');
//token刷新
Route::post('/refresh','Home\UserController@refresh');
//用户信息
Route::post('/me','Home\UserController@me');

//从数据库内拿到一个按照要求分配的账号,被用户用于支付
Route::get('/create','Server\AccountController@GenerateAccount');    //生成收款账号

//支付的逻辑 (1) 获取收款账号 
Route::get('/get/platform/payproduct/{pl_id}/{p_id}','Server\AccountController@getAccount');      //获取收款账号

//支付的逻辑 (2) 生成订单 
Route::post('/create/platform/order','Server\OrderController@createOrder');    //生成订单号

//支付的逻辑 (3) 请求平台上分接口
//Route::post('/add/platform/score','Server\ScoreController@add'); //请求平台上分接口

//Route::post('/register','Server\UserController@register')->name('register');  //注册  (??)

//测试金额
Route::get('/createUniquAmount','Server\AmountPoolController@createUniquAmount');






