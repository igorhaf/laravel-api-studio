<html>
<head>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}" />
</head>
<body id="app">
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
