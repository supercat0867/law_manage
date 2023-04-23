$(function () {
    //失去焦点;获得焦点
    Focuss($(".msgInput"), "输入 5 位短信验证码");
    Focuss($(".phoneInput"), "手机号");
    Blurr($(".phoneInput"), "请输入手机号");
    Blurr($(".msgInput"), "请输入短信验证码");
    function Focuss(ele, content) {
        ele.focus(function (e) {
            e.preventDefault();
            let _this = $(this);
            _this.parent().removeClass('isShow');
            _this.attr("placeholder", content);
        })
    }
    function Blurr(eleb, contentb) {
        eleb.blur(function (e) {
            e.preventDefault();
            let _this = $(this);
            if (_this.val() == null || _this.val() == "" || _this.val() == undefined) {
                // let content = "请输入短信验证码"
                _this.parent().addClass('isShow').attr('data-content', contentb);
                _this.attr("placeholder", " ");
            } else {
                _this.parent().removeClass('isShow');
            }
        })
    }
    // 60s倒计时
    $(".msgBtn").click(function () {
        let pval = $(".phoneInput").val();
        if (pval == "" || pval == null || pval == undefined ||pval.length!=11) {

            $(".msgBtn").text("重新发送短信验证码");
            let content = "请输入正确的手机号";
            $(".phoneInput").parent().addClass('isShow').attr('data-content', content);
            $(".phoneInput").attr("placeholder", " ");
        }
        else {
            $(".msgBtn").css("color", "#b7b7b7");
            $(".msgBtn").attr("disabled", true);
            $.ajax({
                url:"/code",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data:{
                    phone:pval,
                },
                dataType:'json',
                success:function(data){
                    if (data.status==1){
                        alert(data.message);
                    }
                    else {
                        alert(data.message);
                    }
                }
            });
            getRandom();
        }
    })
    var time = 60;
    function getRandom() {
        if (time === 0) {
            $(".msgBtn").text("发送短信验证码");
            $(".msgBtn").css("color", "#175199");
            $(".msgBtn").attr("disabled", false);
            return
        } else {
            time--;

            $(".msgBtn").text(time + " 秒后可重发");
        }
        setTimeout(function () {
            getRandom();
        }, 1000)

    }
});
function login(){
    var searchURL = window.location.search;
    searchURL = searchURL.substring(1, searchURL.length);
    var targetPage = searchURL.split("&")[0].split("=")[1];
    var phone=$("#phoneInput").val();
    var code=$("#msgInput").val();
    if (phone.length<11 || code.length!==5){
        alert("请输入正确的手机号或验证码！");
    }
    else{
        $.ajax({
            url:"./controller/Validator.php",
            type: "POST",
            data:"phone2="+phone+"&code="+code+"&targetPage="+targetPage,
            dataType:'text',
            success:function (data){
                window.location.href=data;
            }
        });
    }
}
