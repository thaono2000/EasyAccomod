<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ $title ?? '' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('admin/js/toastr.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/toastr.min.css') }}">

</head>
<body class="sidebar-mini sidebar-collapse sidebar-closed">
    <div class="wrapper">
        @include('admin::layouts.navbar')
        @include('admin::layouts.sidebar')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <h3 class="py-3 ml-2">{{ $title ?? '' }}</h3>
                </div>
                @yield('content')
            </section>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('admin/js/toastr.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('script')
    </div>
</body>
</html>

