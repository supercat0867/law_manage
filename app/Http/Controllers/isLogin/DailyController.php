<?php

namespace App\Http\Controllers\isLogin;

use App\Model\Customer;
use App\Model\Lawyer;
use App\Model\Meeting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DailyController extends Controller
{
    //返回常法客户中心页面
    public function index()
    {
        return view('center.daily');
    }
    //工作记录页面
    public function work()
    {
        return view('center.work');
    }
    //返回法律意见书界面
    public function advice(Request $request)
    {
        $key=$request->input('key');
        $power=session()->get('~__~');
        $phone=session()->get('phone');
        if ($power=='0526'){
            $id=Customer::where('customer_phone',$phone)->first()->customer_id;
            if ($key){
                $advice=Meeting::where('type',2)->where('party_id',$id)->where('title','like','%'.$key.'%')->get();
            }
            else{
                $advice=Meeting::where('type',2)->where('party_id',$id)->get();
            }
        }
        elseif($power=='0710'){
            $id=Lawyer::where('lawyer_phone',$phone)->first()->lawyer_id;
            if ($key){
                $advice=Meeting::where('type',2)->where('lawyer_id',$id)->where('title','like','%'.$key.'%')->get();
            }
            else{
                $advice=Meeting::where('type',2)->where('lawyer_id',$id)->get();
            }
        }
        else{
            $advice=[];
        }
        return view('center.dailyAdvice',compact('advice','key'));
    }
    //法律意见书内容
    public function advicecontent($id)
    {
        $advice=Meeting::find($id);
        return view('center.advice',compact('advice'));
    }
    //其他工作事务界面
    public function other(Request $request)
    {
        $key=$request->input('key');
        $power=session()->get('~__~');
        $phone=session()->get('phone');
        if ($power=='0526'){
            $id=Customer::where('customer_phone',$phone)->first()->customer_id;
            if ($key){
                $other=Meeting::where('type',3)->where('party_id',$id)->where('title','like','%'.$key.'%')->get();
            }
            else{
                $other=Meeting::where('type',3)->where('party_id',$id)->get();
            }
        }
        elseif($power=='0710'){
            $id=Lawyer::where('lawyer_phone',$phone)->first()->lawyer_id;
            if ($key){
                $other=Meeting::where('type',3)->where('lawyer_id',$id)->where('title','like','%'.$key.'%')->get();
            }
            else{
                $other=Meeting::where('type',3)->where('lawyer_id',$id)->get();
            }
        }
        else{
            $other=[];
        }
        return view('center.dailyOther',compact('other','key'));
    }
    //其他工作事务内容
    public function othercontent($id)
    {
        $other=Meeting::find($id);
        return view('center.other',compact('other'));
    }
    //返回会务记录界面
    public function meeting(Request $request)
    {
        $key = $request->input('key');
        $power = session()->get('~__~');
        $phone = session()->get('phone');
        if ($power == '0526') {
            $id = Customer::where('customer_phone', $phone)->first()->customer_id;
            if ($key) {
                $meeting = Meeting::where('type', 1)->where('party_id', $id)->where('title', 'like', '%' . $key . '%')->get();
            } else {
                $meeting = Meeting::where('type', 1)->where('party_id', $id)->get();
            }
        } elseif ($power == '0710') {
            $id = Lawyer::where('lawyer_phone', $phone)->first()->lawyer_id;
            if ($key) {
                $meeting = Meeting::where('type', 1)->where('lawyer_id', $id)->where('title', 'like', '%' . $key . '%')->get();
            } else {
                $meeting = Meeting::where('type', 1)->where('lawyer_id', $id)->get();
            }
        } else {
            $meeting = [];
        }
        return view('center.dailyMeeting', compact('meeting', 'key'));
    }
    //会务内容
    public function meetcontent($id)
    {
        $meeting=Meeting::find($id);
        return view('center.meeting',compact('meeting'));
    }
    //微信沟通群
    public function wxgroup(Request $request)
    {
        $power=session()->get('~__~');
        $phone=session()->get('phone');
        if ($power=='0526'){
            $wxgroup=Customer::where('customer_phone',$phone)->first()->wxgroup;
            return view('center.wxgroup',compact('wxgroup'));
        }
        elseif($power=='0710'){
            $key=$request->input('key');
            $id=Lawyer::where('lawyer_phone',$phone)->first()->lawyer_id;
            if ($key){
                $customer=Customer::where('lawyer_id',$id)->where('customer_name','like','%'.$key.'%')->get();
            }
            else{
                $customer=Customer::where('lawyer_id',$id)->get();
            }
            return view('center.selectWxgroup',compact('customer','key'));
        }
        return view('errors.noaccess');
    }
    //微信沟通群
    public function wxgroup1(Request $request)
    {
        $power=session()->get('~__~');
        if ($power=='0710'){
            $wxgroup=$request->input('path');
            return view('center.wxgroup',compact('wxgroup'));
        }
        else{
            return view('errors.noaccess');
        }
    }
    //合同列表
    public function contract(Request $request)
    {
        $power=session()->get('~__~');
        $phone=session()->get('phone');
        if ($power=='0526'){
            $ori_reactive=public_path('contract').'/'.$phone.'/1/*';
            $upda_reactive=public_path('contract').'/'.$phone.'/2/*';
            $dir1=glob($ori_reactive, GLOB_ONLYDIR);
            $dir2=glob($upda_reactive, GLOB_ONLYDIR);
            $path1=[];
            $path2=[];
            foreach ($dir1 as $v){
                $result=explode('public\\',$v);
                $title=explode('/',$result[1]);
                $path1[$title[3]]=$result[1];
            }
            foreach ($dir2 as $v){
                $result=explode('public\\',$v);
                $title=explode('/',$result[1]);
                $path2[$title[3]]=$result[1];
            }
            return view('center.contract',compact('path1','path2','phone'));
        }
        elseif($power=='0710'){
            $key=$request->input('key');
            $id=Lawyer::where('lawyer_phone',$phone)->first()->lawyer_id;
            if ($key){
                $customer=Customer::where('lawyer_id',$id)->where('customer_name','like','%'.$key.'%')->get();
            }
            else{
                $customer=Customer::where('lawyer_id',$id)->get();
            }
            return view('center.selectContract',compact('customer','key'));
        }
        else{
            return view('errors.noaccess');
        }
    }
    //合同修改
    public function contract1(Request $request)
    {
        $power=session()->get('~__~');
        if ($power=='0710') {
            $phone=$request->input('phone');
            $ori_reactive=public_path('contract').'/'.$phone.'/1/*';
            $upda_reactive=public_path('contract').'/'.$phone.'/2/*';
            $dir1=glob($ori_reactive, GLOB_ONLYDIR);
            $dir2=glob($upda_reactive, GLOB_ONLYDIR);
            $path1=[];
            $path2=[];
            foreach ($dir1 as $v){
                $result=explode('public\\',$v);
                $title=explode('/',$result[1]);
                $path1[$title[3]]=$result[1];
            }
            foreach ($dir2 as $v){
                $result=explode('public\\',$v);
                $title=explode('/',$result[1]);
                $path2[$title[3]]=$result[1];
            }
            return view('center.contract',compact('path1','path2','phone'));

        }
        else{
            return view('errors.noaccess');
        }

    }
    //合同上传接口
    public function upload(Request $request)
    {
        $phone=$request->input('phone');
        $file=$request->file('contract');
        $op=$request->input('op');
        if(!$file->isValid()){
            return response()->json(['ServerNo'=>'400','ResultData'=>'无效上传']);
        }
        else{
            $ext=$file->getClientOriginalExtension();
            if ($ext!='pdf'){
                return response()->json(['ServerNo'=>'401','ResultData'=>'文件格式只能为PDF，请转换后再上传']);
            }
            else{
                $name=$file->getClientOriginalName();
                if ($op==1) {
                    $path=public_path('contract').'/'.$phone.'/1/';
                }
                else{
                    $path=public_path('contract').'/'.$phone.'/2/';
                }
                $file->move($path,$name);
                $file_path=$path.$name;
                $script_path=public_path('script').'/PDFtoImg.py';
                $re = exec("python $script_path $file_path $path");
                if($re == 'success'){
                    return response()->json(['ServerNo'=>'200','ResultData'=>"合同上传成功"]);
                }
                return response()->json(['ServerNo'=>'500','ResultData'=>$re]);
            }
        }
    }
}
