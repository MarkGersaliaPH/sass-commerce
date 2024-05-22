<!DOCTYPE html>
<html lang="en-US" dir="ltr">
@include('layouts.header')

@livewireStyles 
@laravelPWA

<body>

    @include('layouts.navbar')

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top" style="margin-top: 100px;margin-bottom:100px"> 
        
      <!-- ============================================-->
      <!-- <section> begin ============================--> 
        {{$slot}} 

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    @include('layouts.javascripts')

    {{-- Custom scripts --}}
    @stack('scripts')
    @include('layouts.footer')
    @livewireScripts
</body>

</html>
