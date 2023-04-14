<?php


//免登录访客页面路由组
Route::group(['prefix'=>'lvguan','namespace'=>'Visitor'],function (){
    //查询下载中心路由
    Route::get('guide','VisitorController@guide');
});

//后台登录处理路由组
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //后台登录路由
    Route::get('login','LoginController@login');
    //后台登录处理路由
    Route::post('dologin','LoginController@doLogin');
    //加密算法
//    Route::get('jiami','LoginController@jiami');
});

//后台操作路由组
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'AdminIsLogin'],function (){
    //后台首页路由
    Route::get('index','LoginController@index');
    //后台欢迎页
    Route::get('welcome','LoginController@welcome');
    //后台退出登录路由
    Route::get('logout','LoginController@logout');

    //Route::get('user/del','UserController@delAll');
    //后台用户模块相关路由
    Route::resource('user','UserController');
});
