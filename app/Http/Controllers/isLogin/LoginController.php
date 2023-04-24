<?php

namespace App\Http\Controllers\isLogin;

use App\Model\Customer;
use App\Model\Lawyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //返回前台登录界面
    public function login()
    {
        return view('center.login');
    }
    //验证用户在库中，发送验证码
    public function getCode(Request $request)
    {

        function getcode($len,$phone)
        {
            $code = '';
            for ($i = 0; $i < $len; $i++) {
                $num = rand(0, 9);
                $code .= $num;
            }
//            $statusStr = array(
//                        "0" => "短信发送成功",
//                        "-1" => "参数不全",
//                        "-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
//                        "30" => "密码错误",
//                        "40" => "账号不存在",
//                        "41" => "余额不足",
//                        "42" => "帐户已过期",
//                        "43" => "IP地址限制",
//                        "50" => "内容含有敏感词"
//                            );
//            $smsapi = "http://api.smsbao.com/";
//            $user = "howietung"; //短信平台帐号
//            $pass = md5("zYuJIeT9Nmyk4W1C"); //短信平台密码
//            $content = "【律冠精英】您的验证码是".$code."。如非本人操作，请忽略本短信";//要发送的短信内容
//            $sendurl = $smsapi . "sms?u=" . $user . "&p=" . $pass . "&m=" . $phone . "&c=" . urlencode($content);
//            $result = file_get_contents($sendurl);
            session()->put('code', $code);
            session()->put('phone', $phone);
//            return $statusStr[$result];
            return $code;
        }
        //在用户和律师表中检查是否存在此用户
        $phone=$request->input('phone');
        $user=Customer::where('customer_phone',$phone)->first();
        $lawyer=Lawyer::where('lawyer_phone',$phone)->first();
        if ($user){
            if($user->status!=1){
                $data=[
                    "status"=>'2',
                    "message"=>'此账户已被禁用！'
                ];
            }
            else{
                $result=getcode(5,$phone);
                if($result){
                    $data=[
                        "status"=>'1',
                        "message"=>'验证码发送成功'.$result
                    ];
                    session()->put('~__~',"0526");
                }
                else{
                    $data=[
                        "status"=>'3',
                        "message"=>'验证码发送失败'
                    ];
                }
            }
        }
        elseif ($lawyer){
            if($lawyer->status!=1){
                $data=[
                    "status"=>'2',
                    "message"=>'此账户已被禁用！'
                ];
            }
            else{
                $result=getcode(5,$phone);
                if($result){
                    $data=[
                        "status"=>'1',
                        "message"=>'验证码发送成功'.$result
                    ];
                    session()->put('~__~',"0710");
                }
                else{
                    $data=[
                        "status"=>'3',
                        "message"=>'验证码发送失败'
                    ];
                };
            }
        }
        else{
            $data=[
                "status"=>'0',
                "message"=>'未查找到此用户！请联系律师注册！'
            ];
        }
        return $data;
    }
    //验证手机号、验证码是否匹配
    public function dologin(Request $request)
    {
        $phone=$request->input('phone');
        $code=$request->input('code');
        $target=$request->input('targetPage');
        $session_phone=session()->get('phone');
        $session_code=session()->get('code');
        if ($phone==$session_phone&&$code==$session_code){
            $time = md5(time());
            $token = substr($time,5,6);
            session()->put('code', '');
            session()->put('token',$token);
            if ($target){
                $data=[
                    "status"=>'1',
                    "target"=>$target
                ];
            }
            else{
                $data=[
                    "status"=>'1',
                    "target"=>'/'
                ];
            }
        }
        else{
            $data=[
                "status"=>'2',
                "message"=>'手机号与验证码不匹配'
            ];
        }
        return $data;
    }
}
