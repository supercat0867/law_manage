<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,viewport-fit=cover" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    @include('public.title')
    <script>
        //屏幕适应
        (function (win, doc) {
            if (!win.addEventListener) return;
            var html = document.documentElement;

            function setFont () {
                var html = document.documentElement;
                var k = 750;
                html.style.fontSize = html.clientWidth / k * 100 + "px";
            }
            setFont();
            setTimeout(function () {
                setFont();
            }, 300);
            doc.addEventListener('DOMContentLoaded', setFont, false);
            win.addEventListener('resize', setFont, false);
            win.addEventListener('load', setFont, false);
        })(window, document);
    </script>
</head>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }

    .wrap {
        width: 7.5rem;
        height: 100vh;
        overflow-x: hidden;
        margin: 0 auto;
        background-color: #f6f6f6;
    }

    .box1 {
        width: 100%;
        height: auto;
        background: #012c61;
        position: relative;
    }

    .ppp {
        padding: 0.05rem 0.3rem;
        color: white;
        font-size: 0.3rem;
    }

    .ccon {
        width: 100%;
        color: #acc6eb;
        font-size: 0.3rem;
        margin: -0.46rem 4rem;
        position: relative;
    }

    .ccon span {
        width: 0.1rem;
        height: 0.1rem;
        display: inline-block;
        background: yellow;
        border-radius: 50%;
        padding: 2px;
    }

    .lsi {
        width: 5rem;
        display: flex;
        position: absolute;
        top: -6px;
        left: 126px;
        justify-content: space-around;


    }

    .lsi li {
        width: 1.90rem;
        height: 0.6rem;
        background: #3b669b;
        border-radius: 15px;
        display: block;
        position: relative;
    }

    .eemm {
        font-style: normal;
        margin: -17px -3px;
        position: absolute;
        top: 25px;
    }

    .ulul {
        width: 7rem;
        margin: 1.1rem auto 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding-bottom: 0.2rem;
    }

    .ulul li {
        width: 1.8rem;
        height: 0.8rem;
        background: #3b669b;
        border-radius: 5px;
        display: block;
        position: relative;
        margin-bottom: 17px;
    }

    .ulul .icon {
        position: absolute;
        top: 0.255rem;
        right: 0.1rem;
        margin: 0;
        transform: scale(1.5);
    }

    .eemms {
        font-style: normal;
        font-size: 0.3rem;
        color: #b7d7fd;
        position: absolute;
        top: 0.17rem;
        left: 0.1rem;
    }

    .jdt {
        width: 7rem;
        height: auto;
        border-radius: 5px;
        background-color: white;
        margin: 0 auto;
        padding: 0.2rem 0;
    }

    .jdt_con {
        width: 6.4rem;
        height: 1.6rem;
        margin: 0rem auto;
        position: relative;
    }

    .qiuqiu {
        width: 0.3rem;
        height: 0.3rem;
        background: sandybrown;
        border-radius: 50%;
    }

    .line {
        width: 0.05rem;
        height: 1.3rem;
        background-color: #555;
        margin-left: 0.12rem;
    }
</style>

<body>

<div class="wrap">
    <div class="content">
        <p style="font-size: 0.4rem;
    padding: 0.2rem 0.2rem;
    font-weight: bold;text-align: center;">案件进度</p>
        <form style="width: 6rem;display: flex;justify-content: space-around;margin: 0.2rem auto;">
            <input type='text' id="state" placeholder='案件进度更新' style="width: 4rem;height: 0.5rem;border: 1px solid black;border-radius: 13px;outline: none;">
            <input type='hidden' value='{{$id}}' id="caseid">
            <input type='button' value='更新'  onclick="progresss()">
        </form>
        @php
            function checkprogress($value){
                if($value!=null){
                    echo '<div class="jdt_con"><div class="qiuqiu"></div><div class="line"></div><p style="font-size: 0.3rem; position: absolute; left: 0.6rem; top: 0.3rem;">';
                    echo $value."<br>";
                        }
                    }
            function checktime($value){
                if($value!=null){
                    echo $value;
                    echo '</p></div>';
                }
            }
        @endphp
        <div class="jdt">
            @foreach($progress as $v)
                {{checkprogress($v->progress1)}}
                {{checktime($v->time1)}}
                {{checkprogress($v->progress2)}}
                {{checktime($v->time2)}}
                {{checkprogress($v->progress3)}}
                {{checktime($v->time3)}}
                {{checkprogress($v->progress4)}}
                {{checktime($v->time4)}}
                {{checkprogress($v->progress5)}}
                {{checktime($v->time5)}}
                {{checkprogress($v->progress6)}}
                {{checktime($v->time6)}}
                {{checkprogress($v->progress7)}}
                {{checktime($v->time7)}}
                {{checkprogress($v->progress8)}}
                {{checktime($v->time8)}}
                {{checkprogress($v->progress9)}}
                {{checktime($v->time9)}}
                {{checkprogress($v->progress10)}}
                {{checktime($v->time10)}}
            @endforeach
        </div>
    </div>
</div>
<script src="{{asset('center/js/jquery.min.js')}}"></script>
<script type="text/javascript">
    function progresss(){
        var id=$("#caseid").val();
        var state=$("#state").val();
        $.ajax({
                url:"/lvguan/lawyer/post/progress",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data:{
                    id:id,
                    state:state,
                },
                dataType:'json',
                success:function (data){
                    if (data.status==1){
                        alert(data.message);
                        location.reload();
                    }
                    else{
                        alert(data.message);
                    }
                }
            });
    }
</script>
</body>

</html>


