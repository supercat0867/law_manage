<?php

namespace App\Http\Controllers\Admin;

use App\Model\CaseInfo;
use App\Model\CaseProgress;
use App\Model\Customer;
use App\Model\Lawyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller{

    //案件列表
    public function index(Request $request)
    {
        $case=CaseInfo::orderBy('caseid','asc')
            ->where(function ($query) use ($request){
                $key=$request->input('key');
                if(!empty($key)){
                    if(is_numeric($key)){
                        $query->where('caseid','like','%'.$key.'%');
                    }
                    else{
                        $query->where('title','like','%'.$key.'%');
                    }
                }
            })
            ->paginate($request->input('paging')?$request->input('paging'):5);//默认5页
        $count=$case->count();
        return view('admin.case.list',compact('case','request','count'));
    }
    //添加案件列表
    public function create()
    {
        $lawyer=Lawyer::get();
        return view('admin.case.add',compact('lawyer'));
    }
    //案件添加接口
    public function store(Request $request)
    {
        $input=$request->all();
        $caseid=date('YmdHis',time());
        $res=Customer::where('customer_phone',$input['phone'])->first();
        if (!$res){
            Customer::create(['customer_name'=>$input['name'],'customer_phone'=>$input['phone'],'lawyer_id'=>$input['lawyer'],'type'=>1]);
        }
        $lawyer_id=Lawyer::where('lawyer_id',$input['lawyer'])->first()->lawyer_phone;
        $res1=CaseInfo::create(['caseid'=>$caseid,'title'=>$input['title'],'party_phone'=>$input['phone'],'lawyer_phone'=>$lawyer_id]);
        $res2=CaseProgress::create(['caseid'=>$caseid]);
        if ($res1&&$res2){
            $data=[
                'status'=>1,
                'message'=>"案件添加成功"
            ];
        }
        else{
            $data=[
                'status'=>2,
                'message'=>"案件添加失败"
            ];
        }
        return $data;
    }
    //返回编辑表单
    public function edit($id)
    {
        $case=CaseInfo::where('caseid',$id)->first();
        $lawyer=Lawyer::where('lawyer_phone',$case->lawyer_phone)->first()->lawyer_name;
        $lawyers=Lawyer::get();
        return view('admin.case.edit',compact('case','lawyers','lawyer'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    //删除案件
    public function destroy($id)
    {
        $case=CaseInfo::where('caseid',$id);
        $progress=CaseProgress::where('caseid',$id);
        $res1=$case->delete();
        $res2=$progress->delete();
        if($res1&&$res2){
            $data=[
                'status'=>0,
                'message'=>'删除成功',
            ];
        }
        else{
            $data=[
                'status'=>1,
                'message'=>'删除失败',
            ];
        }
        return $data;
    }
    //批量删除案件
    public function delAll(Request $request){
        $ids = explode(',', $request->get('id'));
        $res1=CaseInfo::whereIn('caseid',$ids)->delete();
        $res2=CaseProgress::whereIn('caseid',$ids)->delete();
        if($res1&&$res2){
            $data=[
                'status'=>0,
                'message'=>'删除成功',
            ];
        }
        else{
            $data=[
                'status'=>1,
                'message'=>'删除失败',
            ];
        }
        return $data;
    }
}
