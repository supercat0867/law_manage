<?php

namespace App\Http\Controllers\Admin;

use App\Model\Lawyer;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
