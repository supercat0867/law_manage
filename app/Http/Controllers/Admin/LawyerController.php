<?php

namespace App\Http\Controllers\Admin;

use App\Model\Lawyer;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LawyerController extends Controller
{
    //返回律师列表页
    public function index(Request $request)
    {
        $lawyer=Lawyer::orderBy('lawyer_id','asc')
            ->where(function ($query) use ($request){
                $lawyername=$request->input('lawyername');
                if(!empty($lawyername)){
                    $query->where('lawyer_name','like','%'.$lawyername.'%');
                }
            })
            ->paginate($request->input('paging')?$request->input('num'):5);//默认5页
        $count=$lawyer->count();
        return view('admin.lawyer.list',compact('lawyer','request','count'));
    }

    //返回添加律师表单
    public function create()
    {
        return view('admin.lawyer.add');
    }
    //处理添加逻辑
    public function store(Request $request)
    {
        $input=$request->all();
        $res=Lawyer::where('lawyer_phone',$input['phone'])->first();
        if ($res){
            $data=[
                'status'=>1,
                'message'=>'存在相同手机号的律师'
            ];
        }
        else{
            $res= Lawyer::create(['lawyer_name'=>$input['lawyername'],'lawyer_phone'=>$input['phone'],'duty'=>$input['duty']]);
            if($res){
                $data=[
                    'status'=>2,
                    'message'=>'添加成功'
                ];
            }
            else{
                $data=[
                    'status'=>3,
                    'message'=>'添加失败'
                ];
            }
        }
        return $data;
    }

    //返回编辑律师信息表单
    public function edit($id)
    {
        $lawyer=Lawyer::find($id);
        return view('admin.lawyer.edit',compact('lawyer'));
    }

    //修改律师信息
    public function update(Request $request, $id)
    {
        $lawyer=Lawyer::where('lawyer_id',$id);
        $lawyer_name=$request->input('username');
        $lawyer_phone=$request->input('phone');
        $duty=$request->input('duty');
        $res=$lawyer->update(['lawyer_name'=>$lawyer_name,'lawyer_phone'=>$lawyer_phone,'duty'=>$duty]);
        if($res){
            $data=[
                'status'=>0,
                'message'=>'修改成功',
            ];
        }
        else{
            $data=[
                'status'=>1,
                'message'=>'修改失败',
            ];
        }
        return $data;

    }

    //执行删除操作
    public function destroy($id)
    {
        $lawyer=Lawyer::where('lawyer_id',$id);
        $res=$lawyer->delete();
        if($res){
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
    //批量删除
    public function delAll(Request $request){
        $ids = explode(',', $request->get('id'));
        $res=Lawyer::whereIn('lawyer_id',$ids)->delete();
        if($res){
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
    //停用律师账户
    public function lawyerStop(Request $request){
        $id=$request->input('id');
        $lawyer=lawyer::where('lawyer_id',$id);
        $res=$lawyer->update(['status'=>0]);
        if($res){
            $data=[
                'status'=>0,
                'message'=>'已停用!',
            ];
        }
        else{
            $data=[
                'status'=>1,
                'message'=>'停用失败',
            ];
        }
        return $data;
    }
    //启用律师账户
    public function lawyerRun(Request $request){
        $id=$request->input('id');
        $lawyer=Lawyer::where('lawyer_id',$id);
        $res=$lawyer->update(['status'=>1]);
        if($res){
            $data=[
                'status'=>0,
                'message'=>'已启用!',
            ];
        }
        else{
            $data=[
                'status'=>1,
                'message'=>'启用失败',
            ];
        }
        return $data;
    }
    //返回律师信息展示列表页
    public function show(Request $request)
    {
        $lawyer=Lawyer::orderBy('lawyer_id','asc')
            ->where(function ($query) use ($request){
                $lawyername=$request->input('lawyername');
                if(!empty($lawyername)){
                    $query->where('lawyer_name','like','%'.$lawyername.'%');
                }
            })
            ->paginate($request->input('paging')?$request->input('num'):5);//默认5页
        $count=$lawyer->count();
        return view('admin.lawyer.show',compact('lawyer','request','count'));
    }
    //隐藏律师展示页
    public function hiddenLawyer(Request $request)
    {
        $id=$request->input('id');
        $lawyer=lawyer::where('lawyer_id',$id);
        $res=$lawyer->update(['show_status'=>0]);
        if($res){
            $data=[
                'status'=>0,
                'message'=>'已隐藏!',
            ];
        }
        else{
            $data=[
                'status'=>1,
                'message'=>'隐藏失败',
            ];
        }
        return $data;

    }
    //展示律师展示页
    public function showLawyer(Request $request)
    {
        $id=$request->input('id');
        $lawyer=Lawyer::where('lawyer_id',$id);
        $res=$lawyer->update(['show_status'=>1]);
        if($res){
            $data=[
                'status'=>0,
                'message'=>'已启用!',
            ];
        }
        else{
            $data=[
                'status'=>1,
                'message'=>'启用失败',
            ];
        }
        return $data;
    }
}
