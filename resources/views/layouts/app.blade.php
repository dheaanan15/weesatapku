<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @include('frontend.partials.style')

</head>

<body style="background-color: #F7FAFD">

    @include('frontend.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')

    @include('frontend.partials.script')
</body>

</html>