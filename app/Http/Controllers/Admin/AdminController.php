<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use App\Model\Role;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index(Request $request)
    {

        $logname=$request->input('logname');
        $admin=Admin::orderBy('admin_id','asc')->where('admin_name','like','%'.$logname.'%')->get();
        $arr=[];
        $info=[];
        foreach ($admin as $v){
            $id=$v->admin_id;
            $info[0]=$id;
            $info[1]=$v->admin_name;
            $info[2]=$v->status;
            $group=Admin::find($id);
            $roles=$group->role;

            foreach ($roles as $v2){
                $info[3]=$v2->role_name;
            }
            $arr[$id]=$info;
        }

        $count=$admin->count();

        return view('admin.admin.list',compact('arr','request','count'));
    }

    //返回添加管理员页面
    public function create()
    {
        $role=DB::select("select * from law_role");
        return view('admin.admin.add',compact('role'));
    }

    //添加管理员逻辑处理
    public function store(Request $request)
    {
        $pass=$request->input('password');
        $cryptPass=Crypt::encrypt($pass);
        $role=$request->input('role');
        $admin_name=$request->input('username');
        $res=Admin::where('admin_name',$admin_name)->first();
        if ($res){
            $data=[
                'status'=>1,
                'message'=>'已存在此管理员'
            ];
        }
        else{
            //创建新管理员
            Admin::create(['admin_name'=>$admin_name,'admin_pass'=>$cryptPass]);
            //给管理员赋予角色
            $admin=Admin::where('admin_name',$admin_name)->first();
            $id=$admin->admin_id;
            DB::table('admin_role')->insert(['admin_id'=>$id,'role_id'=>$role]);
            $data=[
                    'status'=>2,
                    'message'=>'添加成功！'
                    ];
            }
        return $data;
    }

    //返回管理员编辑表单
    public function edit($id)
    {
        $admin=Admin::find($id);
        $role=Role::get();
        $own_roles=$admin->role;
        $own_role=[];
        foreach ($own_roles as $v){
            $own_role[]=$v->id;
        }
        $pass=Crypt::decrypt($admin->admin_pass);
        return view('admin.admin.edit',compact('admin','own_role','role','pass'));
    }

    //处理管理员编辑逻辑
    public function update(Request $request, $id)
    {
//        获取传入的登录名、密码、角色id
        $admin_name=$request->input('username');
        $password=$request->input('password');
        $role=$request->input('role');
        //密码加密
        $cryptPass=Crypt::encrypt($password);
        $admin=Admin::where('admin_id',$id);
        $admin2=$admin->get();
        foreach ($admin2 as $v){
            $name=$v->admin_name;
        }
        if ($admin&&$name!=$admin_name){
            $data=[
                'status'=>1,
                'message'=>'已存在此管理员'
            ];
        }
        else{
            $res=$admin->update(['admin_name'=>$admin_name,'admin_pass'=>$cryptPass]);
            //删除当前管理员角色
            DB::table('admin_role')->where('admin_id',$id)->delete();
            //添加新角色
            DB::table('admin_role')->insert(['admin_id'=>$id,'role_id'=>$role]);

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
        }
        return $data;
    }

    //删除管理员
    public function destroy($id)
    {
        //在管理员表中删除
        Admin::where('admin_id',$id)->delete();
        //在管理员-角色表中删除
        DB::table('admin_role')->where('admin_id',$id)->delete();
        $data=[
                'status'=>0,
                'message'=>'删除成功',
            ];

        return $data;
    }

    //批量删除管理员
    public function delAll(Request $request){
        $ids = explode(',', $request->get('id'));
        $res=Admin::whereIn('admin_id',$ids)->delete();
        \DB::table('admin_role')->whereIn('admin_id',$ids)->delete();
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


    //停用管理员账户
    public function adminStop(Request $request){
        $id=$request->input('id');
        $admin=Admin::where('admin_id',$id);
        $res=$admin->update(['status'=>0]);
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

    //启用管理员账户
    public function adminRun(Request $request){
        $id=$request->input('id');
        $admin=Admin::where('admin_id',$id);
        $res=$admin->update(['status'=>1]);
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
