<?php

namespace App\Http\Controllers\isLogin;

use App\Model\CaseInfo;
use App\Model\CaseProgress;
use App\Model\Customer;
use App\Model\Lawyer;
use App\Model\Meeting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Element;
use function Symfony\Component\VarDumper\Dumper\esc;

class LawyerController extends Controller
{
    //律师专栏
    public function index()
    {
        $phone=session()->get('phone');
        $lawyer=Lawyer::where('lawyer_phone',$phone)->first();
        return view('lawyer.index',compact('lawyer'));
    }
    //退出登录
    public function logout()
    {
        //清空session中的用户信息
        session()->flush();
        //跳转到登陆页面
        return redirect('/login');
    }
    //案件信息上传表单
    public function caseform()
    {
        return view('lawyer.caseform');
    }
    //案件信息上传接口
    public function case(Request $request)
    {
        $caseid=date('YmdHis',time());
        $lawyerphone=session()->get('phone');
        $cusPhone=$request->input('userphone');
        $name=$request->input('customer');
        $title=$request->input('title');
        $type=$request->input('type');
        $res=Customer::where('customer_phone',$cusPhone)->first();
        $lawyerid=Lawyer::where('lawyer_phone',$lawyerphone)->first()->lawyer_id;
        if (!$res){
            Customer::create(['customer_name'=>$name,'customer_phone'=>$cusPhone,'lawyer_id'=>$lawyerid,'type'=>1]);
        }
        $case=CaseInfo::create(['title'=>$title,'party_phone'=>$cusPhone,'caseid'=>$caseid,'lawyer_phone'=>$lawyerphone,'type'=>$type]);
        $progress=CaseProgress::create(['caseid'=>$caseid]);
        if ($case&&$progress){
            $data=[
                'status'=>1,
                'message'=>"案件上传成功"
            ];
        }
        else{
            $data=[
                'status'=>2,
                'message'=>"案件上传失败"
            ];
        }
        return $data;
    }
    //服务单位上传表单
    public function custoform()
    {
        return view('lawyer.custoform');
    }
    //服务单位上传接口
    public function custo(Request $request)
    {
        $name=$request->input('customer');
        $cusPhone=$request->input('userphone');
        $lawyerphone=session()->get('phone');
        $lawyerid=Lawyer::where('lawyer_phone',$lawyerphone)->first()->lawyer_id;
        $customer=Customer::create(['customer_name'=>$name,'customer_phone'=>$cusPhone,'lawyer_id'=>$lawyerid,'type'=>2]);
        if ($customer){
            $data=[
                'status'=>1,
                'message'=>"服务单位上传成功"
            ];
        }
        else{
            $data=[
                'status'=>2,
                'message'=>"服务单位上传失败"
            ];
        }
        return $data;
    }
    //案件进度上传选择界面
    public function selectcase(Request $request,$op)
    {
        $phone = session()->get('phone');
        $key = $request->input('key');
        if ($key) {
            if (is_numeric($key)) {
                $case = CaseInfo::orderBy('caseid', 'asc')->where('lawyer_phone', $phone)->where('caseid', 'like', '%' . $key . '%')->get();
            }
            else {
                $case = CaseInfo::orderBy('caseid', 'asc')->where('lawyer_phone', $phone)->where('title', 'like', '%' . $key . '%')->get();
            }
        }
        else{
                $case = CaseInfo::orderBy('caseid', 'asc')->where('lawyer_phone', $phone)->get();
            }
        return view("lawyer.selectcase", compact("case", "key",'op'));
    }
    //进度上传表单
    public function progressform($id)
    {
        $progress=CaseProgress::where('caseid',$id)->get();
        return view('lawyer.progress',compact('progress','id'));
    }
    //进度上传接口
    public function progress(Request $request)
    {
        $id=$request->input('id');
        $state=$request->input('state');
        $time=date("Y-m-d H:i:s",time());
        $value1=array("progress1","progress2","progress3","progress4","progress5","progress6","progress7","progress8","progress9","progress10");
        $value2=array("time1","time2","time3","time4","time5","time6","time7","time8","time9","time10");
        $progress=CaseProgress::where('caseid',$id);
        $data=$progress->get();
        foreach ($data as $v){
           foreach ($value1 as $v1){
                if($v->$v1==null){
                    $res1=$progress->update([$v1=>$state]);
                    break;
                }
            }
            foreach ($value2 as $v2){
                if($v->$v2==null){
                    $res2=$progress->update([$v2=>$time]);
                    break;
                }
            }
        }
        if ($res1&&$res2){
            $data=[
                'status'=>1,
                'message'=>"进度更新成功"
            ];
        }
        else{
            $data=[
                'status'=>2,
                'message'=>"进度更新失败"
            ];
        }
        return $data;

    }

    //材料选择页面
    public function data($id)
    {
        $title=CaseInfo::where('caseid',$id)->first()->title;
        return view('lawyer.casedata',compact('id','title'));
    }

    //材料上传表单
    public function casedata(Request $request)
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
        return view('lawyer.data',compact("type","path","caseId","dataType"));
    }

    //材料上传接口
    public function postdata(Request $request)
    {
        $type=$request->input('type');
        $file=$request->file('casedata');
        $caseid=$request->input('caseid');
        if(!$file->isValid()){
            return response()->json(['ServerNo'=>'400','ResultData'=>'无效上传']);
        }
        else{
            $ext=$file->getClientOriginalExtension();
            if ($ext!='pdf'){
                return response()->json(['ServerNo'=>'401','ResultData'=>'文件格式只能为PDF，请转换后再上传']);
            }
            else{
                $name=$file->getClientOriginalName();
                $path=public_path('caseData').'/'.$caseid.'/'.$type.'/';
                $file->move($path,$name);
                $file_path=$path.$name;
                $script_path=public_path('script').'/PDFtoImg.py';
                $re = exec("python $script_path $file_path $path");
                if($re == 'success'){
                    return response()->json(['ServerNo'=>'200','ResultData'=>"材料上传成功"]);
                }
                return response()->json(['ServerNo'=>'500','ResultData'=>$re]);
            }

        }
    }
    //工作记录表单
    public function meetform()
    {
        $customer=customer::where('type',2)->get();
        return view('lawyer.meeting',compact('customer'));
    }
    //工作记录上传接口
    public function meeting(Request $request)
    {
        $title=$request->input('title');
        $type=$request->input('type');
        $member=$request->input('member');
        $date=$request->input('date');
        $customer_id=$request->input('customer_id');
        $content=$request->input('content');
        $lawyerphone=session()->get('phone');
        $lawyerid=Lawyer::where('lawyer_phone',$lawyerphone)->first()->lawyer_id;
        $res=Meeting::create(['title'=>$title,'content'=>$content,'party_id'=>$customer_id,'lawyer_id'=>$lawyerid,'member'=>$member,'time'=>$date,'type'=>$type]);
        if ($res){
            $data=[
                'status'=>1,
                'message'=>"工作记录上传成功"
            ];
        }
        else{
            $data=[
                'status'=>2,
                'message'=>"工作记录上传失败"
            ];
        }
        return $data;
    }
    //微信沟通群上传/更新表单
    public function wxgroup()
    {
        $phone = session()->get('phone');
        $laywer_id=Lawyer::where('lawyer_phone',$phone)->first()->lawyer_id;
        $customer=customer::where('lawyer_id',$laywer_id)->get();
        return view('lawyer.wxgroup',compact('customer'));
    }
    //上传二维码
    public function ercode(Request $request)
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
            $imgs=array('jpg','png','jpeg');
            if (!in_array($ext,$imgs)){
                return response()->json(['ServerNo'=>'300','ResultData'=>"文件格式只能为jpg,png,jpeg"]);
            }
            //新文件名
            $newfile=time().rand(1000,9000).'.'.$ext;
            //文件上传路径
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
    //微信群二维码上传
    public function change(Request $request,$id)
    {
        $source=public_path($request->input('path'));
        $wxpath='wxgroup/'.$id.'.jpg';
        customer::where('customer_id',$id)->update(['wxgroup'=>$wxpath]);
        $dest=public_path($wxpath);
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
