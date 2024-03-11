<!DOCTYPE html>
<html lang="en-US" dir="ltr">
@include('layouts.header')

@livewireStyles
@livewire('wire-elements-modal')

<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top"> 
        
      <!-- ============================================-->
      <!-- <section> begin ============================--> 
        {{$slot}} 

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
 

    @include('layouts.javascripts')
    @livewireScripts
</body>

</html>
