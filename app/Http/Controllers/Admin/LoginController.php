<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //返回后台登录界面
    public function login(){
        return view("admin.login");
    }
    //登录逻辑处理
    public function dologin(Request $request){
        // 1、接收表单提交的数据
        $input = $request->except('_token');
        // 2、表单验证
        $rule=[
            'username'=>'required|between:4,10',
            'password'=>'required|between:6,10|alpha_dash',
        ];
        //错误提示信息
        $msg=[
            'username.required'=>'用户名必须输入',
            'username.between'=>'用户名长度必须在4-10位之间',
            'password.required'=>'密码必须输入',
            'password.between'=>'密码长度必须在6-10位之间',
            'password.alpha_dash'=>'密码必须是数字、字母、下划线',
        ];
        $validator=Validator::make($input,$rule,$msg);
        if($validator->fails()){
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        //检验验证码
        if(!captcha_check(strtolower($input['code']))){
            return redirect('admin/login')->with('errors','验证码错误，请重试');
        }
        //3、验证是否有此用户，验证密码是否正确
        $admin=Admin::where('admin_name',$input['username'])->first();
        if(!$admin){
            return redirect('admin/login')->with('errors','此管理员不存在');
        }
        if($admin->status==0){
            return redirect('admin/login')->with('errors','此管理员账号已被禁用，请联系网站负责人');
        }
        if($input['password']!=Crypt::decrypt($admin->admin_pass)){
            return redirect('admin/login')->with('errors','管理员密码错误');
        }
        //4、保存管理员信息到session中
        session()->put('adminInfo',$admin);
        //5、跳转到主页
        return redirect('admin/index');

    }

    //哈希加密测试
    public function jiami()
        {
        $str='123456';
        $crypt_str=Crypt::encrypt($str);
        return $crypt_str;
        }

    //无权限页面
    public function noaccess(){
        return view("errors.noaccess");
    }
    //返回后台首页
    public function index(){
        $adminInfo=session()->get('adminInfo');
        return view("admin.index",compact("adminInfo"));
    }
    //返回后台欢迎界面
    public function welcome(){
        $adminInfo=session()->get('adminInfo');
        return view("admin.welcome",compact("adminInfo"));
    }
    //退出登录
    public function logout(){
        //清空session中的用户信息
        session()->flush();
        //跳转到登陆页面
        return redirect('admin/login');
    }
}


