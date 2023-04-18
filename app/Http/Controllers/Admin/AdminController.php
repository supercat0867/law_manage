<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use App\Model\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
//        dd($arr);
        $count=$admin->count();

        return view('admin.admin.list',compact('arr','request','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
