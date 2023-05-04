<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    @include('public.title')
{{--    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">--}}
{{--    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">--}}
    <link rel="stylesheet" href="{{asset('lawyer/css/style.css')}}">
{{--    <link rel="manifest" href="__manifest.json">--}}
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- 头部 -->
    <div class="appHeader bg-primary scrolled">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * 头部 -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="header-large-title">
            <h1 class="title">律师专栏</h1>
        </div>

        <ul class="listview image-listview flush transparent mt-3 mb-2">
            <li>
                <a href="/lvguan/lawyer/form/caseinfo" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="folder-outline"></ion-icon>
                    </div>
                    <div class="in">
                        案件信息上传
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/lawyer/1/select/case" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="arrow-up-outline"></ion-icon>
                    </div>
                    <div class="in">
                        案件进度汇报
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/lawyer/2/select/case" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="push-outline"></ion-icon>
                    </div>
                    <div class="in">
                        案件材料上传
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/lawyer/form/custo" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="person-add-outline"></ion-icon>
                    </div>
                    <div class="in">
                        服务单位上传
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/lawyer/form/meeting" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="refresh-outline"></ion-icon>
                    </div>
                    <div class="in">
                        工作记录上传
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/daily/contract" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="document-outline"></ion-icon>
                    </div>
                    <div class="in">
                        合同修改
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/lawyer/form/wxgroup" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="logo-wechat"></ion-icon>
                    </div>
                    <div class="in">
                        微信沟通群上传/更新
                    </div>
                </a>
            </li>
        </ul>

        <!-- 底部 -->
        @include('lawyer.public.footer')
        <!-- * 底部 -->
    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
<!--    <div class="appBottomMenu">-->
<!--        <a href="" class="item">-->
<!--            <div class="col">-->
<!--                <ion-icon name="home-outline"></ion-icon>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a href="" class="item">-->
<!--            <div class="col">-->
<!--                <ion-icon name="cube-outline"></ion-icon>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a href="" class="item">-->
<!--            <div class="col">-->
<!--                <ion-icon name="chatbubble-ellipses-outline"></ion-icon>-->
<!--                <span class="badge badge-danger">5</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a href="" class="item active">-->
<!--            <div class="col">-->
<!--                <ion-icon name="layers-outline"></ion-icon>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">-->
<!--            <div class="col">-->
<!--                <ion-icon name="menu-outline"></ion-icon>-->
<!--            </div>-->
<!--        </a>-->
<!--    </div>-->
    <!-- * App Bottom Menu -->

    <!-- 侧边栏 -->
    @include('lawyer.public.aside',['img'=>$lawyer->perimgpath,'name'=>$lawyer->lawyer_name])
    <!-- * 侧边栏 -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="{{asset('lawyer/js/lib/jquery-3.4.1.min.js')}}"></script>
    <!-- Bootstrap-->
    <script src="{{asset('lawyer/js/lib/popper.min.js')}}"></script>
    <script src="{{asset('lawyer/js/lib/bootstrap.min.js')}}"></script>
    <!-- Ionicons -->
<!--    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="{{asset('lawyer/js/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <!-- jQuery Circle Progress -->
    <script src="{{asset('lawyer/js/plugins/jquery-circle-progress/circle-progress.min.js')}}"></script>
    <!-- Base Js File -->
    <script src="{{asset('lawyer/js/base.js')}}"></script>

</body>

</html>