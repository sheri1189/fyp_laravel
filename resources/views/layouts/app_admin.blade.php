<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    {{-- =========admin header includes=========== --}}
    <x-admin-header />
    {{-- =========admin header includes=========== --}}
</head>

<body>
    <div id="layout-wrapper">
        {{-- =========admin navbar includes=========== --}}
        <x-admin-navbar />
        {{-- =========admin navbar includes=========== --}}
        {{-- =========admin sidebar includes=========== --}}
        <x-admin-sidebar />
        {{-- =========admin sidebar includes=========== --}}
        <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">
                @yield('main-content')
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © thenestacademy.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Developed By:
                                    Shaharyar Ahmad <br>
                                    Abdul Manan Ejaz
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        {{-- =========admin footer includes=========== --}}
        <x-admin-footer />
        {{-- =========admin footer includes=========== --}}
    </div>
</body>

</html>
