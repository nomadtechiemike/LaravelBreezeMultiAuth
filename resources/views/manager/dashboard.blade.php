@include('layouts.header')

<body>
    <div class="main-wrapper">

        <!-- sidebar -->
        @include('layouts.sidebar')

        <!-- partial -->

        <div class="page-wrapper">

            @include('layouts.navbar')

            @yield('manager')

     @include('layouts.footer')
