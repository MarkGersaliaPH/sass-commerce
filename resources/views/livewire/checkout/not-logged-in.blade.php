<div class="container">
    <div class="text-center mb-5"> 
        <h1>Guest Checkout</h1>
        <p>Would you like to continue as a guest or log in?</p> 
    </div>
    
    <div class="h-10 ">
        <div class="row ">
            <div class="col-md-6 border-end text-center py-5">
                <h4>
                    <a href="{{route('checkout.guest')}}" class="text-warning ">Continue as Guest</a>
                </h4>
            </div>
            <div class="col-md-6 py-5">
                @livewire('login')
            </div>
        </div>
    </div>
    <div class="my-5">

    </div>
 

</div>
