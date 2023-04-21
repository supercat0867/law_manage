<?php

namespace App\Http\Controllers\Admin;

use App\Model\Lawyer;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

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
            ->paginate($request->input('paging')?$request->input('paging'):5);//默认5页
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
            ->paginate($request->input('paging')?$request->input('paging'):5);//默认5页
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
    //返回律师展示页编辑表单
    public function editShow($id)
    {
        $lawyer=Lawyer::find($id);
        return view('admin.lawyer.editShow',compact('lawyer'));
    }

    //编辑律师展示页信息
    public function updateShow(Request $request,$id)
    {
        $lawyer=Lawyer::where('lawyer_id',$id);
        $lawyer_name=$request->input('name');
        $education=$request->input('education');
        $organization=$request->input('organization');
        $introduction=$request->input('introduction');
        $connectlink=$request->input('connectlink');
        $res=$lawyer->update(['lawyer_name'=>$lawyer_name,'education'=>$education,'organization'=>$organization,'perintroduction'=>$introduction,'connectlink'=>$connectlink]);
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
    //更换头像表单
    public function uploadshow($id)
    {
        $lawyer=Lawyer::find($id);
        return view('admin.lawyer.image',compact('lawyer'));
    }
    //文件上传
    public function upload(Request $request)
    {
        //获取上传文件
        $file=$request->file('photo');
        //判断上传文件是否成功
        if(!$file->isValid()){
            return response()->json(['ServerNo'=>'400','ResultData'=>'无效上传']);
        }
        else{
            //获取源文件扩展名
            $ext=$file->getClientOriginalExtension();
            //新文件名
            $newfile=time().rand(1000,9000).'.'.$ext;
            //文件上传路径
            $path=public_path('uploads');
            //将源文件从临时目录移动到指定目录
//            if(!$file->move($path,$newfile)){
//                return response()->json(['ServerNo'=>'500','ResultData'=>'保存文件失败']);
//            }
            $res=Image::make($file)->save($path.'/'.$newfile);
            if ($res){
                return response()->json(['ServerNo'=>'200','ResultData'=>$newfile]);
            }
            else{
                return response()->json(['ServerNo'=>'500','ResultData'=>'上传文件失败']);
            }
        }
    }

    public function change(Request $request,$id){
        $source=public_path($request->input('path'));
        $lawyer=Lawyer::find($id);
        $dest=public_path($lawyer->perimgpath);
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
