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

//测试前端页面
Route::get('/member/login','Home\MemberController@index');
//登录逻辑
Route::post('/member/login','Home\MemberController@login');