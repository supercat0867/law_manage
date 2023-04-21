<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministController extends Controller
{

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

    public function create()
    {
        //
    }


    public function store(Request $request)
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

}
