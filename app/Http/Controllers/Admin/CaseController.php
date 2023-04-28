<?php

namespace App\Http\Controllers\Admin;

use App\Model\CaseInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller{

    //案件列表
    public function index(Request $request)
    {
        $case=CaseInfo::orderBy('caseid','asc')
            ->where(function ($query) use ($request){
                $key=$request->input('key');
                if(!empty($key)){
                    if(is_numeric($key)){
                        $query->where('caseid','like','%'.$key.'%');
                    }
                    else{
                        $query->where('title','like','%'.$key.'%');
                    }
                }
            })
            ->paginate($request->input('paging')?$request->input('paging'):5);//默认5页
        $count=$case->count();
        return view('admin.case.list',compact('case','request','count'));
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
