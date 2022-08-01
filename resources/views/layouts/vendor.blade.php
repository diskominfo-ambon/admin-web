<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Page Title  -->
    <title>@yield('title', 'Dashboard')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('/vendor/css/dashlite.css?ver=2.2.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('/vendor/css/theme.css?ver=2.2.0') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @yield('head')
</head>

<body class="nk-body bg-white npc-default has-aside ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-lg wide-xl">
                        <div class="nk-header-wrap">
                            <div class="nk-header-brand">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ asset('img/kominfo.png') }}" srcset="{{ asset('img/kominfo.png') }} 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="{{ asset('img/kominfo.png') }}" srcset="{{ asset('img/kominfo.png') }} 2x" alt="logo-dark">
                                    <span class="logo-text">Dinas komunikasi informatika dan persandian kota Ambon</span>
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-menu"></div><!-- .nk-header-menu -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown">
                                        <span class="current-user">Azman Abdullah</span>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="mr-lg-n1">
                                            <div class="user-toggle">
                                                <div class="user-avatar bg-white text-dark sm">
                                                    {{-- <em class="icon ni ni-user-fill"></em> --}}
                                                    <em class="icon ni ni-signout" style="font-size: 14px;"></em>
                                                </div>
                                            </div>
                                        </a>

                                    </li><!-- .dropdown -->
                                    <li class="d-lg-none">
                                        <a href="#" class="toggle nk-quick-nav-icon mr-n1" data-target="sideNav"><em class="icon ni ni-menu"></em></a>
                                    </li>
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->

                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">
                            <x-sidebar/>
                            <div class="nk-content-body">
                                @if (session('message.flash'))
                                <div class="alert alert-secondary">{{ session('message.flash') }}</div>
                                @endif
                                @yield('content')
                                <!-- footer @s -->
                                <div class="nk-footer">
                                    <div class="container wide-xl">
                                        <div class="nk-footer-wrap g-2">
                                            <div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="#">Softnio</a>
                                            </div>
                                            <div class="nk-footer-links">
                                                <ul class="nav nav-sm">
                                                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer @e -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('/vendor/js/bundle.js?ver=2.2.0') }}"></script>
    <script src="{{ asset('/vendor/js/scripts.js?ver=2.2.0') }}"></script>
    @yield('script')
    {{-- <script src="./assets/js/charts/gd-default.js?ver=2.2.0"></script> --}}
</body>

</html>
