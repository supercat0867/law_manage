<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //获取授权页面
    public function auth(){
        return view('admin.role.auth');
    }

    //返回列表首页
    public function index(Request $request)
    {
        $role=Role::orderBy('id','asc')
            ->where(function ($query) use ($request){
                $rolename=$request->input('rolename');
                if(!empty($lawyername)){
                    $query->where('role_name','like','%'.$rolename.'%');
                }
            })
            ->paginate($request->input('paging')?$request->input('num'):5);//默认5页
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
