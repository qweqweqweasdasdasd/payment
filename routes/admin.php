<?php

Route::get('/login','Admin\LoginController@index')->name('login');  //后台管理--登录
Route::post('/login','Admin\LoginController@sigIn');                //后台管理--登录验证
Route::get('/logout','Admin\LoginController@logout');                //后台管理--退出登录

//设置auth中间件有back的guard设置
Route::group(['middleware'=>'auth:back'],function(){
    
    Route::get('/index','Admin\IndexController@index');                 //后台管理--首页
    Route::get('/welcome','Admin\IndexController@welcome');             //后台管理--welcome
    
    Route::match(['get','post'],'/manager/setpwd','Admin\ManagerController@setpwd');    
    Route::resource('/manager','Admin\ManagerController');              //后台管理--管理员
    Route::post('/manager/reset','Admin\ManagerController@reset');      //后台管理--状态
    
    Route::match(['get','post'],'/role/distribute/{r_id}','Admin\RoleController@distribute');
    Route::resource('/role','Admin\RoleController');                    //后台管理--角色
    
    Route::post('/role/reset','Admin\RoleController@reset');            //后台管理--设置状态
    Route::resource('/permission','Admin\PermissionController');        //后台管理--权限
    
    Route::resource('/payproduct','Admin\PayproductController');        //后台管理--支付产品(免签||正式)
    Route::post('/payproduct/reset','Admin\PayproductController@reset');//后台管理--设置状态
    
    Route::resource('/account','Admin\AccountController');              //后台管理--收款账号
    Route::post('/account/reset','Admin\AccountController@reset');            //后台管理--设置状态
    
    Route::resource('/order','Admin\OrderController');    //后台管理--订单管理
    
    Route::match(['get','post'],'/platform/disaccount/{pl_id}','Admin\PlatformController@disaccount'); //后台管理--平台分配支付方式 (多对多)
    Route::resource('/platform','Admin\PlatformController');            //后台管理--平台 (管理员和平台是[逆一对多]) (平台和管理员是一对多) 
});


