<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    @include('public.title')
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel='stylesheet' href="{{asset('center/css/bootstrap.min.css')}}">
    <link rel='stylesheet' href="{{asset('center/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('center/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('center/layui/css/layui.css')}}">
    <script src="{{asset('center/layui/layui.js')}}"></script>
</head>
<body>

<section class="pt-80 pb-70">
    <div class="text-center mb-60 position-relative">
        <h5 style="font-size: 45px" class="font__family-montserrat font__weight-light text-uppercase font__size-18 text-blue brk-library-rendered" data-brk-library="component__title">{{$type}}</h5>

        <hr class="divider wow zoomIn brk-library-rendered" data-brk-library="component__title" style="visibility: visible; animation-name: zoomIn;">
    </div>
    <div class="container">
        <div class="panel__wrapper-icon mb-100 brk-library-rendered" data-brk-library="component__panel">
            <ul class="panel__list">
                @if($path)
                    @foreach($path as $k=>$v)
                        <a href="/lvguan/case/preview?path={{$v}}" style="height: 100px;width: 100px"><li style="font-size: 30px">
                                <span class="line"></span>
                                <i class="icon fab fa-gg"></i>{{$k}}
                            </li></a>
                    @endforeach
                @else
                    <li style=" font-size: 30px">
                        <span class="line"></span>
                        <i class="icon fab fa-gg"></i>暂无{{$type}}
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <p style="font-size: 25px;text-align: center;color: red">格式要求pdf</p>
    <form class="layui-form" empty="multipart/form-data" id="form">
        <div class="layui-btn-container">
            <button type="button" class="layui-btn" id="contract" style="display:block;margin:0 auto;width:200px;height:80px;font-size: 29px">
                <i class="layui-icon"></i>上传材料</button>
            <input type="file" name="casedata" id="upload" style="visibility: hidden;">
            <input type="hidden" id="type" class="hidden" name="type" value="{{$dataType}}">
            <input type="hidden" id="caseid" class="hidden" name="caseid" value="{{$caseId}}">
        </div>
    </form>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
            $('#contract').on('click',function (){
                $('#upload').trigger('click')
                $('#upload').on('change',function (){
                    var obj=this;
                    var formData=new FormData($('#form')[0]);
                    $.ajax({
                            url:'/lvguan/lawyer/post/data',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type:'post',
                            data:formData,
                            processData:false,
                            contentType:false,
                            success:function (data){
                                if(data['ServerNo']=='200'){
                                    alert(data['ResultData'])
                                    location.reload();
                                }
                                else{
                                    alert(data['ResultData'])
                                }
                            }
                        }
                    )
                })
            })
        });
    </script>
</section>
</body>
</html>