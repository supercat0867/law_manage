<?php

namespace App\Http\Controllers\Admin;
use App\Model\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Void_;

class UserController extends Controller
{
    //返回常法客户列表
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


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
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
}
