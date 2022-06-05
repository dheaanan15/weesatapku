<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @include('backend.partials.style')

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('backend.partials.navbar')

        @include('backend.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header Page header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">@yield('title')</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

        </div>
        <!-- /.content-wrapper -->

        @include('backend.partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- SCRIPTS -->
    @include('backend.partials.script')
</body>

</html>