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
    Route::get('lawyers','VisitorController@lawyer');
    //客户名录展示
    Route::get('customer','VisitorController@customer');
    //行政人员展示
    Route::get('admin','VisitorController@admin');
    //律冠法研
    Route::get('article','VisitorController@article');
});

//登录前台
Route::get('/login','isLogin\LoginController@login');
//获取验证码
Route::post('/code','isLogin\LoginController@getCode');
//处理登录逻辑
Route::post('/dologin','isLogin\LoginController@dologin');

//登录后可查看
Route::group(['prefix'=>'lvguan','namespace'=>'isLogin','middleware'=>'IsLogin'],function (){
    //查看个人案件
    Route::get('case','CaseController@case');
    //查看案件信息
    Route::get('case/{id}/info','CaseController@caseInfo');
    //案件材料路由
    Route::get('case/data','CaseController@caseData');
    //预览案件材料
    Route::get('case/preview','CaseController@preview');
    //常法服务中心
    Route::get('daily','DailyController@index');
    //会务记录
    Route::get('daily/meeting','DailyController@meeting');
    //会议内容
    Route::get('daily/{id}/meeting','DailyController@meetcontent');
    //微信沟通群
    Route::get('daily/wxgroup','DailyController@wxgroup');
    //微信沟通群
    Route::get('daily/wxgroup/info','DailyController@wxgroup1');
    //合同修改
    Route::get('daily/contract','DailyController@contract');
    //合同修改
    Route::get('daily/contract/info','DailyController@contract1');
    //合同上传接口
    Route::post('daily/contract/uploads','DailyController@upload');

});

//律师专栏
Route::group(['prefix'=>'lvguan','namespace'=>'isLogin','middleware'=>['IsLogin','IsLawyer']],function () {
    //律师专栏
    Route::get('lawyer','LawyerController@index');
    //案件信息上传表单
    Route::get('lawyer/form/caseinfo','LawyerController@caseform');
    //案件信息上传接口
    Route::post('lawyer/post/case','LawyerController@case');
    //案件选择页面
    Route::get('lawyer/{op}/select/case','LawyerController@selectcase');
    //案件进度上传表单
    Route::get('lawyer/{id}/progress','LawyerController@progressform');
    //案件进度上传接口
    Route::post('lawyer/post/progress','LawyerController@progress');
    //案件材料选择
    Route::get('lawyer/{id}/data','LawyerController@data');
    //案件材料上传接口
    Route::post('lawyer/post/data','LawyerController@postdata');
    //案件材料
    Route::get('lawyer/data/case','LawyerController@casedata');
    //服务单位上传表单
    Route::get('lawyer/form/custo','LawyerController@custoform');
    //服务单位上传接口
    Route::post('lawyer/post/custo','LawyerController@custo');
    //会务记录上传表单
    Route::get('lawyer/form/meeting','LawyerController@meetform');
    //会务记录上传接口
    Route::post('lawyer/post/meeting','LawyerController@meeting');
    //微信沟通群上传/修改表单
    Route::get('lawyer/form/wxgroup','LawyerController@wxgroup');
    //微信图片上传
    Route::post('lawyer/post/ercode','LawyerController@ercode');
    //更换图片
    Route::put('lawyer/put/{id}','LawyerController@change');
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

//提示无权限
Route::get('/noaccess','Admin\LoginController@noaccess');

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
    //律师展示页修改
    Route::put('lawyer/{lawyer}/update','LawyerController@updateShow');
    //更换头像表单
    Route::get('lawyer/{lawyer}/upload','LawyerController@uploadShow');
    //上传头像
    Route::post('lawyer/upload','LawyerController@upload');
    //更换头像
    Route::put('lawyer/upload/{lawyer}','LawyerController@change');

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

    //行政人员管理模块
    Route::resource('admins','AdministController');
    //行政人员隐藏
    Route::post('admins/hidden','AdministController@hidden');
    //行政人员展示
    Route::post('admins/show','AdministController@show');
    //更换头像表单
    Route::get('admins/{id}/upload','AdministController@header');
    //上传头像
    Route::post('admins/upload','AdministController@upload');
    //更换头像
    Route::put('admins/upload/{id}','AdministController@change');

    //文章管理模块
    Route::resource('article','ArticleController');
    //文章批量删除
    Route::post('article/del','ArticleController@delAll');
    //文章隐藏
    Route::post('article/stop','ArticleController@stop');
    //文章展示
    Route::post('article/run','ArticleController@run');
    //更换封面表单
    Route::get('article/{id}/upload','ArticleController@cover');
    //上传封面
    Route::post('article/upload','ArticleController@upload');
    //更换封面
    Route::put('article/upload/{id}','ArticleController@change');

});