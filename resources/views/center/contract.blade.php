<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    @include('public.title')
    <link rel='stylesheet' href="{{asset('center/css/bootstrap.min.css')}}">
    <link rel='stylesheet' href="{{asset('center/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('center/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('center/layui/css/layui.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="{{asset('center/layui/layui.js')}}"></script>
</head>
<body>

<section class="pt-80 pb-70">
    <div class="text-center mb-60 position-relative">
        <h5 style="font-size: 45px" class="font__family-montserrat font__weight-light text-uppercase font__size-18 text-blue brk-library-rendered" data-brk-library="component__title">原稿版合同</h5>
        <hr class="divider wow zoomIn brk-library-rendered" data-brk-library="component__title" style="visibility: visible; animation-name: zoomIn;">
    </div>
    <div class="container">
        <div class="panel__wrapper-icon mb-100 brk-library-rendered" data-brk-library="component__panel">
            @php($op=2)
            <ul class="panel__list">
                @if($path1)
                    @foreach($path1 as $k=>$v)
                        <a href="/lvguan/case/preview?path={{$v}}" style="height: 100px;width: 100px"><li style="font-size: 30px">
                                <span class="line"></span>
                                <i class="icon fab fa-gg"></i>{{$k}}
                            </li></a>
                    @endforeach
                @else
                    @php($op=1)
                    <li style="font-size: 30px">
                        <span class="line"></span>
                        <i class="icon fab fa-gg"></i>暂无原稿版
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="text-center mb-60 position-relative">
        <h5 style="font-size: 45px" class="font__family-montserrat font__weight-light text-uppercase font__size-18 text-blue brk-library-rendered" data-brk-library="component__title">修改版合同</h5>
        <hr class="divider wow zoomIn brk-library-rendered" data-brk-library="component__title" style="visibility: visible; animation-name: zoomIn;">
    </div>
    <div class="container">
        <div class="panel__wrapper-icon mb-100 brk-library-rendered" data-brk-library="component__panel">
            <ul class="panel__list">
                @if($path2)
                    @foreach($path2 as $k=>$v)
                        <a href="/lvguan/case/preview?path={{$v}}" style="height: 100px;width: 100px"><li style="font-size: 30px">
                                <span class="line"></span>
                                <i class="icon fab fa-gg"></i>{{$k}}
                            </li></a>
                    @endforeach
                @else
                    <li style="font-size: 30px">
                        <span class="line"></span>
                        <i class="icon fab fa-gg"></i>暂无修改版合同
                    </li>
                @endif
            </ul>
        </div>
    </div>
</section>
<p style="font-size: 25px;text-align: center;color: red">格式要求pdf</p>
<form class="layui-form" empty="multipart/form-data" id="form">
    <div class="layui-btn-container">
        <button type="button" class="layui-btn" id="contract" style="display:block;margin:0 auto;width:200px;height:80px;font-size: 29px">
        <i class="layui-icon"></i>上传合同</button>
        <input type="file" name="contract" id="upload" style="visibility: hidden;">
        <input type="hidden" id="phone" class="hidden" name="phone" value="{{$phone}}">
        <input type="hidden" id="op" class="hidden" name="op" value="{{$op}}">
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
                // formData.append('phone',);
                // formData.append('a', 1);
                $.ajax({
                        url:'/lvguan/daily/contract/uploads',
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

</body>
</html>