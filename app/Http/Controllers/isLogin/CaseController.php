<?php

namespace App\Http\Controllers\isLogin;
use App\Model\CaseInfo;
use App\Model\CaseProgress;
use App\Model\Lawyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    //个人案件列表
    public function case(Request $request)
    {
        $power=session()->get('~__~');
        $phone=session()->get('phone');
        $key=$request->input('key');
        if ($power=='0526'){
            if ($key){
                if (is_numeric($key)){
                    $case=CaseInfo::orderBy('caseid','asc')->where('party_phone',$phone)->where('caseid','like','%'.$key.'%')->get();
                }
                else{
                    $case=CaseInfo::orderBy('caseid','asc')->where('party_phone',$phone)->where('title','like','%'.$key.'%')->get();
                }
            }
            else{
                $case=CaseInfo::orderBy('caseid','asc')->where('party_phone',$phone)->get();
            }
        }
        elseif($power=='0710'){
            if ($key){
                if (is_numeric($key)){
                    $case=CaseInfo::orderBy('caseid','asc')->where('lawyer_phone',$phone)->where('caseid','like','%'.$key.'%')->get();
                }
                else{
                    $case=CaseInfo::orderBy('caseid','asc')->where('lawyer_phone',$phone)->where('title','like','%'.$key.'%')->get();
                }
            }
            else{
                $case=CaseInfo::orderBy('caseid','asc')->where('lawyer_phone',$phone)->get();
            }
        }
        else{
            $case=[];
        }
        return view("center.case",compact("case","key"));
    }

    //查看案件信息
    public function caseInfo($id)
    {
        $case=CaseInfo::find($id);
        $title=$case->title;
        $lawyer=Lawyer::where('lawyer_phone',$case->lawyer_phone)->get();
        foreach ($lawyer as $v){
           $lawyer_name = $v->lawyer_name;
        }
        $progress=CaseProgress::where('caseid',$id)->get();

        return view('center.caseContent',compact("id","title","lawyer_name","progress"));
    }

    //返回案件材料信息
    public function caseData(Request $request)
    {
        //获取案件id、案件材料类型
        $caseId=$request->input('id');
        $dataType=$request->input('type');
        switch ($dataType){
            case 1:
                $type="证据材料";
                break;
            case 2:
                $type="庭审笔录";
                break;
            case 3:
                $type="辩护词";
                break;
            case 4:
                $type="答辩状";
                break;
            case 5:
                $type="判决书";
                break;
            case 6:
                $type="上诉状";
                break;
            default:
                $type="证据材料";
        }
        //获取与id、案件类型对应的目录
        $reactive=public_path('caseData').'/'.$caseId.'/'.$dataType.'/*';
        $path=[];
        $dir=glob($reactive, GLOB_ONLYDIR);
        foreach ($dir as $v){
            $result=explode('public\\',$v);
            $title=explode('/',$result[1]);
            $path[$title[3]]=$result[1];
        }
        //返回文件信息
        return view('center.caseData',compact("type","path"));
    }

    //预览文件
    public function preview(Request $request)
    {
        $path=$request->input('path');
        $filepath=$path.'/*';
        $images=glob($filepath);
        natsort($images);
        return view('center.casePreview',compact("images"));
    }
}
