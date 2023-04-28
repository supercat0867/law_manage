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

    <!-- App Header -->
    <div class="appHeader bg-primary scrolled">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">

        </div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search...">
                <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->

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
                        会务记录上传
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


        <!-- app footer -->
        <div class="appFooter">
<!--            <img src="assets/img/logo.png" alt="icon" class="footer-logo mb-2">-->
            <div class="footer-title">
                Copyright © 2023 四川律冠法律咨询有限公司 All rights reserved.
            </div>
        </div>
        <!-- * app footer -->

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

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
                            <img src="{{asset("$lawyer->perimgpath")}}" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong>{{$lawyer->lawyer_name}}</strong>
                            <div class="text-muted">
                                <ion-icon name="location"></ion-icon>
                                四川成都
                            </div>
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
<!--                        <li>-->
<!--                            <a href="index.html" class="item">-->
<!--                                <div class="icon-box bg-primary">-->
<!--                                    <ion-icon name="home-outline"></ion-icon>-->
<!--                                </div>-->
<!--                                <div class="in">-->
<!--                                    Discover-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="app-components.html" class="item">-->
<!--                                <div class="icon-box bg-primary">-->
<!--                                    <ion-icon name="cube-outline"></ion-icon>-->
<!--                                </div>-->
<!--                                <div class="in">-->
<!--                                    Components-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </li>-->
                        <li>
                            <a href="/lvguan/lawyer" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="layers-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>律师专栏</div>
                                </div>
                            </a>
                        </li>
<!--                        <li>-->
<!--                            <a href="page-chat.html" class="item">-->
<!--                                <div class="icon-box bg-primary">-->
<!--                                    <ion-icon name="chatbubble-ellipses-outline"></ion-icon>-->
<!--                                </div>-->
<!--                                <div class="in">-->
<!--                                    <div>Chat</div>-->
<!--                                    <span class="badge badge-danger">5</span>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </li>-->
                        <li>
                            <div class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>夜间模式</div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input dark-mode-switch"
                                            id="darkmodesidebar">
                                        <label class="custom-control-label" for="darkmodesidebar"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

{{--                    <div class="listview-title mt-2 mb-1">--}}
{{--                        <span>Friends</span>--}}
{{--                    </div>--}}
{{--                    <ul class="listview image-listview flush transparent no-line">--}}
{{--                        <li>--}}
{{--                            <a href="page-chat.html" class="item">--}}
{{--                                <img src="assets/img/sample/avatar/avatar7.jpg" alt="image" class="image">--}}
{{--                                <div class="in">--}}
{{--                                    <div>Sophie Asveld</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="page-chat.html" class="item">--}}
{{--                                <img src="assets/img/sample/avatar/avatar3.jpg" alt="image" class="image">--}}
{{--                                <div class="in">--}}
{{--                                    <div>Sebastian Bennett</div>--}}
{{--                                    <span class="badge badge-danger">6</span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="page-chat.html" class="item">--}}
{{--                                <img src="assets/img/sample/avatar/avatar10.jpg" alt="image" class="image">--}}
{{--                                <div class="in">--}}
{{--                                    <div>Beth Murphy</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="page-chat.html" class="item">--}}
{{--                                <img src="assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">--}}
{{--                                <div class="in">--}}
{{--                                    <div>Amelia Cabal</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="page-chat.html" class="item">--}}
{{--                                <img src="assets/img/sample/avatar/avatar5.jpg" alt="image" class="image">--}}
{{--                                <div class="in">--}}
{{--                                    <div>Henry Doe</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                </div>

                <!-- sidebar buttons -->
                <div class="sidebar-buttons">
{{--                    <a href="javascript:;" class="button">--}}
{{--                        <ion-icon name="person-outline"></ion-icon>--}}
{{--                    </a>--}}
{{--                    <a href="javascript:;" class="button">--}}
{{--                        <ion-icon name="archive-outline"></ion-icon>--}}
{{--                    </a>--}}
{{--                    <a href="javascript:;" class="button">--}}
{{--                        <ion-icon name="settings-outline"></ion-icon>--}}
{{--                    </a>--}}
                    <a href="/lvguan/lawyer/logout" class="button">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div>
                <!-- * sidebar buttons -->
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

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