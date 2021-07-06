@include('layout.client.header')

    <title>
        @yield('title')
    </title>
</head>
<body>
@include('layout.client.navbar')
<div class="">
    @include('layout.client.nav-bottom')
</div>


@yield('main-content')

<div class="mb-5 pb-5"></div>
@include('layout.client.footer')
@stack('js')
@include('sweetalert::alert')