<?php

namespace App\Http\Controllers\isLogin;

use App\Model\CaseInfo;
use App\Model\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Boss extends Controller
{
    public function index()
    {

        return view('center.boss');
    }
    //个案汇总
    public function case($type,Request $request)
    {
        $key=$request->input('key');
        if ($key) {
            if (is_numeric($key)) {
                $case=CaseInfo::where('type',$type)->where('caseid','like','%'.$key.'%')->get();
            }
            else{
                $case=CaseInfo::where('type',$type)->where('title','like','%'.$key.'%')->get();
            }
        }
        else {
            $case=CaseInfo::where('type',$type)->get();
        }
        return view('center.bossCase',compact('case','type','key'));
    }
    //常法汇总
    public function daily(Request $request)
    {
        $key=$request->input('key');
        if ($key){
            $daily=Customer::where('type',2)->where('customer_name','like','%'.$key.'%')->get();
        }
        else{
            $daily=Customer::where('type',2)->get();
        }
        return view('center.bossDaily',compact('daily','key'));
    }

}
