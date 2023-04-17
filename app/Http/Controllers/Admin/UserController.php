<?php

namespace App\Http\Controllers\Admin;
use App\Model\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Void_;

class UserController extends Controller
{
    //返回个案客户列表
    public function index(Request $request)
    {
        $customer=Customer::orderBy('customer_id','asc')
            ->where(function ($query) use ($request){
                $customername=$request->input('customername');
                if(!empty($customername)){
                    $query->where('customer_name','like','%'.$customername.'%');
                }
            })
            ->paginate($request->input('paging')?$request->input('num'):5);//默认5页
        return view('admin.user.list',compact('customer','request'));
    }

    //返回添加客户页面
    public function create()
    {
        return view('admin.user.add');
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
            $res= Customer::create(['customer_name'=>$input['username'],'customer_phone'=>$input['phone'],'lawyer'=>$input['lawyer']]);
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
        $res=$customer->update(['status'=>2]);
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

}
