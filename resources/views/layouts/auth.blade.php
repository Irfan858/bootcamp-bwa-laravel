<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.frontsite.meta')
        <title>@yield('title') | Meet Doctor</title>

        @stack('before-style')
            @include('includes.frontsite.style')
        @stack('after-style')
    </head>
    <body>
        @yield('content')

        @stack('before-script')
            @include('includes.frontsite.script')
        @stack('after-script')

        {{-- modals --}}
    </body>
</html>
