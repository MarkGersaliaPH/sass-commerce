<!DOCTYPE html>
<html lang="en-US" dir="ltr">
@include('layouts.header')

<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        @include('layouts.navbar')


        @yield('content')

        @include('layouts.footer')

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    @include('layouts.javascripts')

</body>

</html>
