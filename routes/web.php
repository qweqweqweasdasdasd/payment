<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::any('/pay/aaaaaa','Server\PayController@aaaaaa');

//测试前端页面
Route::get('/member/login','Home\MemberController@index');
//登录逻辑
Route::post('/member/login','Home\MemberController@login');

//测试--支付页面
Route::get('/pay/list/{pl_id}','Home\PayController@list');
//测试--生成订单 ?? 
Route::post('/pay/list2','Home\PayController@list2');

//支付的逻辑 (正式签约和免签)
Route::post('/pay/jiesuan','Server\PayController@jiesuan');

//同步异步支付回调
Route::get('/pay/alipay/return_url','Home\PayController@return_url');
Route::post('/pay/alipay/notify_url','Home\PayController@notify_url');