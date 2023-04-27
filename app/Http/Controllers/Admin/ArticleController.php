<?php

namespace App\Http\Controllers\Admin;

use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    //文章列表
    public function index(Request $request)
    {
        $article=Article::orderBy('id','asc')
            ->where(function ($query) use ($request){
                $title=$request->input('title');
                if(!empty($title)){
                    $query->where('title','like','%'.$title.'%');
                }
            })
            ->paginate($request->input('paging')?$request->input('paging'):5);//默认5页
        $count=$article->count();
        return view('admin.article.list',compact('article','request','count'));
    }

    //文章添加表单
    public function create()
    {
        return view('admin.article.add');
    }

    //文章添加接口
    public function store(Request $request)
    {
        $input=$request->all();
        $res=Article::where('link',$input['link'])->first();
        if ($res){
            $data=[
                'status'=>1,
                'message'=>'存在此链接文章'
            ];
        }
        else{
            $res= Article::create(['title'=>$input['title'],'link'=>$input['link']]);
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

    //编辑文章表单
    public function edit($id)
    {
        $article=Article::find($id);
        return view('admin.article.edit',compact('article'));
    }
    //编辑文章接口
    public function update(Request $request, $id)
    {
        $article=Article::where('id',$id);
        $title=$request->input('title');
        $link=$request->input('link');
        $res=$article->update(['title'=>$title,'link'=>$link]);
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

    //删除文章接口
    public function destroy($id)
    {
        $article=Article::where('id',$id);
        $res=$article->delete();
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
        $res=Article::whereIn('id',$ids)->delete();
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

    //隐藏文章
    public function stop(Request $request){
        $id=$request->input('id');
        $article=Article::where('id',$id);
        $res=$article->update(['status'=>0]);
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

    //展示文章
    public function run(Request $request){
        $id=$request->input('id');
        $article=Article::where('id',$id);
        $res=$article->update(['status'=>1]);
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
    //更换封面表单
    public function cover($id){
        $article=Article::find($id);
        return view('admin.article.image',compact('article'));
    }

    //封面上传
    public function upload(Request $request)
    {
        $file=$request->file('photo');
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

    //更换封面
    public function change(Request $request,$id)
    {
        $source=public_path($request->input('path'));
        $path='cover/'.time().rand(1000,9000).'.jpg';
        Article::where('id',$id)->update(['cover'=>$path]);
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
