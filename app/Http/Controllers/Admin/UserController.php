<?php

namespace App\Http\Controllers\Admin;
use App\Model\Customer;
use App\Model\Lawyer;
use App\Model\Unit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Void_;

class UserController extends Controller
{
    //返回客户列表
    public function index(Request $request)
    {
        $customer=Customer::orderBy('customer_id','asc')
            ->where(function ($query) use ($request){
                $customername=$request->input('customername');
                if(!empty($customername)){
                    $query->where('customer_name','like','%'.$customername.'%');
                }
            })
            ->paginate($request->input('paging')?$request->input('paging'):5);//默认5页
        $count=$customer->count();
        return view('admin.user.list',compact('customer','request','count'));
    }

    //返回添加客户页面
    public function create()
    {
        $lawyer=Lawyer::get();
        return view('admin.user.add',compact('lawyer'));
    }

    //执行添加客户操作
    public function store(Request $request)
    {
        $input=$request->all();
        $res=Customer::where('customer_phone',$input['phone'])->first();
        if ($res){
            $data=[
                'status'=>1,
                'message'=>'存在相同手机号的客户'
            ];
        }
        else{
            $res= Customer::create(['customer_name'=>$input['username'],'customer_phone'=>$input['phone'],'lawyer_id'=>$input['lawyer']]);
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

    //返回用户信息修改页面
    public function edit($id)
    {
        $customer=Customer::find($id);
        return view('admin.user.edit',compact('customer'));

    }

    //执行用户修改操作
    public function update(Request $request, $id)
    {
        $customer=Customer::where('customer_id',$id);
        $customer_name=$request->input('username');
        $customer_phone=$request->input('phone');
        $res=$customer->update(['customer_name'=>$customer_name,'customer_phone'=>$customer_phone]);
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
        $customer=Customer::where('customer_id',$id);
        $res=$customer->delete();
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
    //执行批量删除
    public function delAll(Request $request){
        $ids = explode(',', $request->get('id'));
        $res=Customer::whereIn('customer_id',$ids)->delete();
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
    //停用用户
    public function customerStop(Request $request){
        $id=$request->input('id');
        $customer=Customer::where('customer_id',$id);
        $res=$customer->update(['status'=>0]);
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
    //启用用户
    public function customerRun(Request $request){
        $id=$request->input('id');
        $customer=Customer::where('customer_id',$id);
        $res=$customer->update(['status'=>1]);
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
    //客户名录列表
    public function unit(Request $request){
        $unit=Unit::orderBy('id','asc')
            ->where(function ($query) use ($request){
                $unitname=$request->input('unitname');
                if(!empty($unitname)){
                    $query->where('name','like','%'.$unitname.'%');
                }
            })
            ->paginate($request->input('paging')?$request->input('paging'):5);//默认5页
        $count=$unit->count();
        return view('admin.unit.list',compact('unit','request','count'));
    }
    //添加客户名录
    public function unitCreate()
    {
        return view('admin.unit.add');
    }
    //处理添加逻辑
    public function unitstore(Request $request)
    {
        $input=$request->all();
        $res=Unit::where('name',$input['name'])->first();
        if ($res){
            $data=[
                'status'=>1,
                'message'=>'客户名录中已存在此用户'
            ];
        }
        else{
            $res=Unit::create(['name'=>$input['name']]);
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
    //编辑客户名录表单
    public function unitedit($id)
    {
        $unit=Unit::find($id);
        return view('admin.unit.edit',compact('unit'));

    }
    //提交编辑
    public function unitupdate(Request $request, $id)
    {
        $unit=Unit::where('id',$id);
        $name=$request->input('name');
        $res=$unit->update(['name'=>$name]);
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
    //删除
    public function unitdestroy($id)
    {
        $unit=Unit::where('id',$id);
        $res=$unit->delete();
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
    public function unitdelAll(Request $request){
        $ids = explode(',', $request->get('id'));
        $res=Unit::whereIn('id',$ids)->delete();
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
    //客户名录隐藏
    public function unitstop(Request $request)
    {
        $id=$request->input('id');
        $unit=Unit::where('id',$id);
        $res=$unit->update(['status'=>0]);
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
    //客户名录展示
    public function unitrun(Request $request)
    {
        $id=$request->input('id');
        $unit=Unit::where('id',$id);
        $res=$unit->update(['status'=>1]);
        if($res){
            $data=[
                'status'=>0,
                'message'=>'已展示!',
            ];
        }
        else{
            $data=[
                'status'=>1,
                'message'=>'展示失败',
            ];
        }
        return $data;
    }

}
