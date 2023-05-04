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
    <link rel="stylesheet" href="{{asset('lawyer/css/style.css')}}">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="header-large-title">
            <h1 class="title">{{$title}}材料</h1>
        </div>

        <ul class="listview image-listview flush transparent mt-3 mb-2">
            <li>
                <a href="/lvguan/lawyer/data/case?id={{$id}}&type=1" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="folder-outline"></ion-icon>
                    </div>
                    <div class="in">
                        证据材料
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/lawyer/data/case?id={{$id}}&type=2" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="arrow-up-outline"></ion-icon>
                    </div>
                    <div class="in">
                        庭审笔录
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/lawyer/data/case?id={{$id}}&type=3" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="push-outline"></ion-icon>
                    </div>
                    <div class="in">
                        辩护词
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/lawyer/data/case?id={{$id}}&type=4" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="person-add-outline"></ion-icon>
                    </div>
                    <div class="in">
                        答辩状
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/lawyer/data/case?id={{$id}}&type=5" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="refresh-outline"></ion-icon>
                    </div>
                    <div class="in">
                        判决书
                    </div>
                </a>
            </li>
            <li>
                <a href="/lvguan/lawyer/data/case?id={{$id}}&type=6" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="document-outline"></ion-icon>
                    </div>
                    <div class="in">
                        上诉状
                    </div>
                </a>
            </li>
        </ul>

        <!-- app footer -->
        @include('lawyer.public.footer')
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->

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