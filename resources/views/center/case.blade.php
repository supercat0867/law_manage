<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,viewport-fit=cover" />
    @include('public.title')
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
        height: 100vh;
        margin: -0.25rem auto 0;
        background-color: #f6f6f6;
    }
    .name{
        text-align: center;
        font-family: cursive;
        font-weight: bold;
        font-size: 30px;
        margin: 14px auto;
    }
    .list{
        width: 88%;
        height: auto;
        margin: 0 auto;
    }
    .list li{
        height: 70px;
        /* background: skyblue; */
        border-radius: 5px;
        padding: 10px 12px;
        box-sizing: border-box;
        position: relative;
        overflow: hidden;
        margin-bottom: 16px;
        display: flex;
        flex-direction:column ;
        align-items: baseline;
        justify-content: space-between;
        box-shadow: 0 1px 3px 1px rgba(0,0,0,.1);
        position: relative;
        margin-bottom: 28px;
        border: 1px dashed skyblue;
    }
    .list li img{
        width: 50px;
        height: 50px;
    }
    .list li p{
        font-size: 16px;
        font-weight: bold;
        /* padding-left: 15px; */
    }
    .dianji{
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 999;
        cursor: pointer;
    }
    .inp1{
        width: 7rem;
        height: 0.6rem;
        border: 2px solid #FEBF00;
        /*text-align: center;*/
        font-size: 0.3rem;
        border-radius: 11px;
        outline: none;
    }
    @keyframes rotate-hue {
        to {
            filter: hue-rotate(1turn);
        }
    }
    .fom{
        margin: -14px auto 21px;
        width: 6.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 0;
    }
    .SignContainer-tip {
        bottom: 0;
        left: 0;
        right: 0;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 12px 24px;
        color: grey;
        font-size: 13px;
        text-align: center;
    }
</style>
<body>
<div class="wrap">
    <div class="content">
        <p class="name">个案查询中心</p>
        <form class="fom" action="" method="post">
            <input class="inp1" type="text" name="searchInfo" placeholder="输入案号、时间、当事人姓名">
        </form>
        <ul class="list">
            <?php
            include "../lib/database.php";
            if($_SESSION['power']==1){
                if (isset($_POST['searchInfo'])&&$_POST['searchInfo']!=null){
                    if(is_numeric($_POST['searchInfo'])){
                        $sql="select caseid,casetitle,lawyer,caseclient from caseinfo where lawyerphone='{$_COOKIE['phone']}'and caseid like '%{$_POST['searchInfo']}%' order by caseid DESC ";
                    }
                    else{
                        $sql="select caseid,casetitle,lawyer,caseclient from caseinfo where lawyerphone='{$_COOKIE['phone']}'and caseclient like '%{$_POST['searchInfo']}%' order by caseid DESC ";
                    }
                }
                else{
                    $sql="select caseid,casetitle,lawyer,caseclient from caseinfo where lawyerphone='{$_COOKIE['phone']}' order by caseid DESC ";
                }
            }
            else{
                if (isset($_POST['search'])){
                    if(is_numeric($_POST['searchInfo'])){
                        $sql="select caseid,casetitle,lawyer,caseclient from caseinfo where clientphone='{$_COOKIE['phone']}'and caseid like '%{$_POST['searchInfo']}%' order by caseid DESC ";
                    }
                    else{
                        $sql="select caseid,casetitle,lawyer,caseclient from caseinfo where clientphone='{$_COOKIE['phone']}'and caseclient like '%{$_POST['searchInfo']}%' order by caseid DESC ";
                    }
                }
                else{
                    $sql="select * from caseinfo where clientphone='{$_COOKIE['phone']}' order by caseid DESC";
                }
            }
            $conn=ConnMySQL();
            $result=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($result)){
                echo "<li>";
                echo '<a class="dianji" href="case_content?caseid='.$row['caseid'].'&title='.$row['casetitle'].'&lawyer='.$row['lawyer'].'"></a>';
                echo '<p><span>'.$row['casetitle'].' 当事人：'.$row['caseclient'].'</span>';
                echo '<p><span>案号：'.$row['caseid'].'</span>';
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</div>

</body>
</html>



