<?php

namespace App\Http\Controllers\Visitor;

use App\Model\Lawyer;
use App\Model\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
    //团队介绍页
    public function index()
    {
        return view("visitor.index");
    }
    //返回查询下载中心页面
    public function guide()
    {
        return view("guide.index");
    }
    //返回团队介绍界面
    public function info()
    {
        return view("visitor.Info");
    }
    //返回律师咨询选择界面
    public function advice()
    {
        return view("visitor.origanization");
    }
    //客户名录页面
    public function customer(Request $request){
        $unit=Unit::where(function ($query) use ($request){
            $unit=$request->input('name');
            if (!empty($unit)){
                $query->where('name','like','%'.$unit.'%');
            }
        })->get();
        return view('visitor.customer',compact('unit'));
    }

    //返回律师展示页面
    public function lawyer(Request $request){
        $lawyer=Lawyer::where(function ($query) use ($request){
                $lawyername=$request->input('lawyer');
                $group=$request->input('type');
                if(!empty($lawyername)&&!empty($group)){
                    $query->where('lawyer_name','like','%'.$lawyername.'%')->whereRaw('FIND_IN_SET(?,organization)',[$group]);
                }
                elseif (!empty($group)){
                    $query->whereRaw('FIND_IN_SET(?,organization)',[$group]);
                }
                elseif (!empty($lawyername)){
                    $query->where('lawyer_name','like','%'.$lawyername.'%');
                }
            })->get();
        return view('visitor.lawyer',compact('lawyer'));
    }
}
