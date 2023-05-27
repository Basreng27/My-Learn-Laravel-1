<!DOCTYPE html>
<html lang="en">

@include('Layouts.Partials.header')

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('Layouts.Partials.preloader')

        @include('Layouts.Partials.navbar')

        @include('Layouts.Partials.sidebar')

        @yield('content')

        @include('Layouts.Partials.controllSidebar')

        @include('Layouts.Partials.mainFooter')
    </div>

</body>

@include('Layouts.Partials.footer')

</html>
