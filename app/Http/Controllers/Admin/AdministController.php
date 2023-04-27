<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdministController extends Controller
{

    //行政人员列表
    public function index(Request $request)
    {
        $admins=Admins::orderBy('id','asc')
            ->where(function ($query) use ($request){
                $name=$request->input('name');
                if(!empty($name)){
                    $query->where('name','like','%'.$name.'%');
                }
            })
            ->paginate($request->input('paging')?$request->input('paging'):5);//默认5页
        $count=$admins->count();
        return view('admin.admins.list',compact('admins','request','count'));
    }

    //添加行政人员表单
    public function create()
    {
        return view('admin.admins.add');
    }

    //添加行政人员接口
    public function store(Request $request)
    {
        $input=$request->all();
        $res=Admins::where('phone',$input['phone'])->first();
        if ($res){
            $data=[
                'status'=>1,
                'message'=>'存在相同手机号的客户'
            ];
        }
        else{
            $res= Admins::create(['name'=>$input['adminname'],'phone'=>$input['phone'],'duty'=>$input['duty'],'education'=>$input['education'],'intro'=>$input['intro']]);
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


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function hidden(Request $request)
    {
        $id=$request->input('id');
        $admins=Admins::where('id',$id);
        $res=$admins->update(['show_status'=>0]);
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
    public function show(Request $request)
    {
        $id=$request->input('id');
        $admins=Admins::where('id',$id);
        $res=$admins->update(['show_status'=>1]);
        if($res){
            $data=[
                'status'=>0,
                'message'=>'已展示',
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

    //修改头像表单
    public function header($id)
    {
        $admins=Admins::find($id);
        return view('admin.admins.image',compact('admins'));
    }

    //上传头像
    public function upload(Request $request)
    {
        //获取上传文件
        $file=$request->file('photo');
        //判断上传文件是否成功
        if(!$file->isValid()){
            return response()->json(['ServerNo'=>'400','ResultData'=>'无效上传']);
        }
        else{
            $ext=$file->getClientOriginalExtension();
            $newfile=time().rand(1000,9000).'.'.$ext;
            $path=public_path('uploads');
            $res=Image::make($file)->save($path.'/'.$newfile);
            if ($res){
                return response()->json(['ServerNo'=>'200','ResultData'=>$newfile]);
            }
            else{
                return response()->json(['ServerNo'=>'500','ResultData'=>'上传文件失败']);
            }
        }
    }

    //更换头像
    public function change(Request $request,$id)
    {
        $source=public_path($request->input('path'));
        $path='adminImage/'.time().rand(1000,9000).'.jpg';
        Admins::where('id',$id)->update(['head'=>$path]);
        $dest=public_path($path);
        if(copy($source,$dest)){
            $data=[
                'status'=>0,
                'message'=>'更换成功',
            ];
        }
        else{
            $data=[
                'status'=>1,
                'message'=>'更换失败',
            ];
        }
        return $data;
    }


}
