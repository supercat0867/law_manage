<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,viewport-fit=cover" />
  @include("public.title")
  <script>
    (function(win, doc) {
      if (!win.addEventListener) return;
      var html = document.documentElement;
      function setFont() {
        var html = document.documentElement;
        var k = 750;
        html.style.fontSize = html.clientWidth / k * 100 + "px";
      }
      setFont();
      setTimeout(function() {
        setFont();
      }, 300);
      doc.addEventListener('DOMContentLoaded', setFont, false);
      win.addEventListener('resize', setFont, false);
      win.addEventListener('load', setFont, false);
    })(window, document);
  </script>
</head>
<style type="text/css">
  *{
    margin: 0 ;
    padding: 0;
  }
  .wrap {
    width: 7.5rem;
    height: auto;
    overflow: hidden;
    margin: 0 auto;
    background-color: #f6f6f6;
  }
  .inp{
    margin: 13px auto;
    position: relative;
  }
  .inpt {
    width: 77%;
    height: 35px;
    background: #fff;
    border-radius: 35px;
    display: flex;
    align-items: center;
    padding: 5px 20px;
    outline: none;
    border: none;
    margin-left: 29px;
  }
  .list{
    width: 88%;
    height: auto;
    margin: 0 auto;
  }
  .list li{
    height: 70px;
    background: #fff;
    border-radius: 5px;
    padding: 10px 12px;
    box-sizing: border-box;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: row;
    align-items: center;
    box-shadow: 0 1px 3px 1px rgba(0,0,0,.1);
    margin-bottom: 10px;
  }
  .list li img{
    width: 50px;
    height: 50px;
  }
  .list li span{
    font-size: 16px;
    font-weight: bold;
    padding-left: 15px;
  }
</style>
<body>
<div class="wrap">
  <div class="content">
    <div class="inp"><form method="get">
      <input class="inpt" placeholder="请输入服务单位" type="text" name="name">
        </form>
    </div>
    <ul class="list">
      @foreach($unit as $v)
        @if($v->status==1)
          <li><img src="{{asset('visitor/images/icon3.png')}}" alt="">
            <span>{{$v->name}}</span>
          </li>
        @endif
      @endforeach
    </ul>
  </div>
</div>
</body>
</html>
