<?php

//律冠团队首页
Route::get('/','Visitor\VisitorController@index');

//免登录访客页面路由组
Route::group(['prefix'=>'lvguan','namespace'=>'Visitor'],function (){
    //查询下载中心路由
    Route::get('guide','VisitorController@guide');
    //团队管理路由
    Route::get('about','VisitorController@info');
    //法律咨询选择路由
    Route::get('advice','VisitorController@advice');
    //律师展示页面路由
    Route::get('lawyer','VisitorController@lawyer');
    //客户名录展示
    Route::get('customer','VisitorController@customer');
});

//后台登录处理路由组
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //后台登录路由
    Route::get('login','LoginController@login');
    //后台登录处理路由
    Route::post('dologin','LoginController@doLogin');
    //加密算法
    Route::get('jiami','LoginController@jiami');
});

//提示无权限
Route::get('noaccess','Admin\LoginController@noaccess');

//后台操作路由组
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'AdminIsLogin'],function (){
    //后台首页路由
    Route::get('index','LoginController@index');
    //后台欢迎页
    Route::get('welcome','LoginController@welcome');
    //后台退出登录路由
    Route::get('logout','LoginController@logout');
});

//后台操作路由组
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['hasRole','AdminIsLogin']],function (){
    //后台用户模块相关路由
    Route::resource('user','UserController');
    //用户批量删除
    Route::post('user/del','UserController@delAll');
    //用户停用
    Route::post('user/stop','UserController@customerStop');
    //用户启用
    Route::post('user/run','UserController@customerRun');
    //客户名录列表
    Route::get('unit','UserController@unit');
    //客户名录添加页面
    Route::get('unit/create','UserController@unitCreate');
    //客户名录添加接口
    Route::post('unit','UserController@unitstore');
    //客户名录编辑页面
    Route::get('unit/{id}/edit','UserController@unitedit');
    //客户名录编辑接口
    Route::put('unit/{id}','UserController@unitupdate');
    //客户名录删除接口
    Route::delete('unit/{id}','UserController@unitdestroy');
    //客户名录批量删除接口
    Route::post('unit/del','UserController@unitdelAll');
    //客户名录隐藏接口
    Route::post('unit/stop','UserController@unitstop');
    //客户名录展示接口
    Route::post('unit/run','UserController@unitrun');

    //律师管理模块
    Route::resource('lawyer','LawyerController');
    //律师批量删除
    Route::post('lawyer/del','LawyerController@delAll');
    //律师账户停用
    Route::post('lawyer/stop','LawyerController@lawyerStop');
    //律师账户启用
    Route::post('lawyer/run','LawyerController@lawyerRun');
    //律师展示信息列表页
    Route::get('lawyer/show','LawyerController@show');
    //隐藏律师展示页
    Route::post('lawyer/hidden','LawyerController@hiddenLawyer');
    //启用律师展示页
    Route::post('lawyer/showon','LawyerController@showLawyer');
    //律师展示页修改表单
    Route::get('lawyer/{lawyer}/editshow','LawyerController@editShow');

    //角色模块
    Route::resource('role','RoleController');
    //角色授权路由
    Route::get('role/auth/{id}','RoleController@auth');
    //处理授权
    Route::post('role/doauth','RoleController@doauth');
    //橘色批量删除
    Route::post('role/del','RoleController@delAll');

    //管理员模块
    Route::resource('admin','AdminController');
    //管理员停用
    Route::post('admin/stop','AdminController@adminStop');
    //管理员启用
    Route::post('admin/run','AdminController@adminRun');
    //管理员批量删除
    Route::post('admin/del','AdminController@delAll');

    //行政人员管理模块哦
    Route::resource('admins','AdministController');

});