<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    //获取授权页面
    public function auth($id){
        $role=Role::find($id);
        $perms=Permission::get();

        $own_perms=$role->permission;
        $own_pers=[];
        foreach ($own_perms as $v){
            $own_pers[]=$v->id;
        }
        return view('admin.role.auth',compact("role","perms","own_pers"));
    }
    //处理授权
    public function doauth(Request $request){
        $input=$request->all();
        //删除当前角色已有的权限
        DB::table('role_permission')->where('role_id',$input['role_id'])->delete();
        //添加新授予的权限
        if(!empty($input['permission_id'])){
            foreach ($input['permission_id'] as $v){
                DB::table('role_permission')->insert(['role_id'=>$input['role_id'],'permission_id'=>$v]);
            }
        }
        $data=[
            'status'=>2,
            'message'=>'授权成功'
        ];
        return $data;

    }

    //返回列表首页
    public function index(Request $request)
    {
        $rolename=$request->input('rolename');
        $role=Role::orderBy('id','asc')->where('role_name','like','%'.$rolename.'%')->get();
        $count=$role->count();
        return view('admin.role.list',compact('role','request','count'));
    }

    //角色添加页面
    public function create()
    {
        return view('admin.role.add');
    }

    //执行添加
    public function store(Request $request)
    {
        $input=$request->except("_token");
        $res=Role::where('role_name',$input['role'])->first();
        if ($res){
            $data=[
                'status'=>1,
                'message'=>'已存在此角色'
            ];
        }
        else{
            $res=Role::create(['role_name'=>$input['role'],'describe'=>$input['describe']]);
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

    //角色修改界面
    public function edit($id)
    {
        $role=Role::find($id);
        return view('admin.role.edit',compact("role"));
    }

    //处理角色修改逻辑
    public function update(Request $request, $id)
    {
        $role=Role::where('id',$id);
        $role_name=$request->input('rolename');
        $describe=$request->input('describe');
        $res=$role->update(['role_name'=>$role_name,'describe'=>$describe]);
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

    //删除角色
    public function destroy($id)
    {
        $role=Role::where('id',$id);
        \DB::table('role_permission')->where('role_id',$id)->delete();
        $res=$role->delete();
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
    //执行批量删除角色
    public function delAll(Request $request){
        $ids = explode(',', $request->get('id'));
        $res=Role::whereIn('id',$ids)->delete();
        \DB::table('role_permission')->whereIn('role_id',$ids)->delete();
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
