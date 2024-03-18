<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"> Cart</li>
            <li class="breadcrumb-item active" aria-current="page"> Checkout</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-xl-8">

            <div class="card">
                <div class="card-body">
                    <ol class="activity-checkout mb-0 px-4 mt-3">
                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-receipt text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Billing Info</h5>
                                    <p class="text-muted text-truncate mb-4">Sed ut perspiciatis unde omnis iste</p>
                                    <div class="mb-3">
                                        <form>
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-name">Name</label>
                                                            <input type="text" class="form-control" id="billing-name" placeholder="Enter name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-email-address">Email Address</label>
                                                            <input type="email" class="form-control" id="billing-email-address" placeholder="Enter email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-phone">Phone</label>
                                                            <input type="text" class="form-control" id="billing-phone" placeholder="Enter Phone no.">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="billing-address">Address</label>
                                                    <textarea class="form-control" id="billing-address" rows="3" placeholder="Enter full address"></textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label">Country</label>
                                                            <select class="form-control form-select" title="Country">
                                                                <option value="0">Select Country</option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AL">Albania</option>
                                                                <option value="DZ">Algeria</option>
                                                                <option value="AS">American Samoa</option>
                                                                <option value="AD">Andorra</option>
                                                                <option value="AO">Angola</option>
                                                                <option value="AI">Anguilla</option>                                   
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label" for="billing-city">City</label>
                                                            <input type="text" class="form-control" id="billing-city" placeholder="Enter City">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-0">
                                                            <label class="form-label" for="zip-code">Zip / Postal code</label>
                                                            <input type="text" class="form-control" id="zip-code" placeholder="Enter Postal code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-truck text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Shipping Info</h5>
                                    <p class="text-muted text-truncate mb-4">Neque porro quisquam est</p>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div data-bs-toggle="collapse">
                                                    <label class="card-radio-label mb-0">
                                                        <input type="radio" name="address" id="info-address1" class="card-radio-input" checked="">
                                                        <div class="card-radio text-truncate p-3">
                                                            <span class="fs-14 mb-4 d-block">Address 1</span>
                                                            <span class="fs-14 mb-2 d-block">Bradley McMillian</span>
                                                            <span class="text-muted fw-normal text-wrap mb-1 d-block">109 Clarksburg Park Road Show Low, AZ 85901</span>
                                                           
                                                            <span class="text-muted fw-normal d-block">Mo. 012-345-6789</span>
                                                        </div>
                                                    </label>
                                                    <div class="edit-btn bg-light  rounded">
                                                        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                            <i class="bx bx-pencil font-size-16"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div>
                                                    <label class="card-radio-label mb-0">
                                                        <input type="radio" name="address" id="info-address2" class="card-radio-input">
                                                        <div class="card-radio text-truncate p-3">
                                                            <span class="fs-14 mb-4 d-block">Address 2</span>
                                                            <span class="fs-14 mb-2 d-block">Bradley McMillian</span>
                                                            <span class="text-muted fw-normal text-wrap mb-1 d-block">109 Clarksburg Park Road Show Low, AZ 85901</span>
                                                            <span class="text-muted fw-normal d-block">Mo. 012-345-6789</span>
                                                        </div>
                                                    </label>
                                                    <div class="edit-btn bg-light  rounded">
                                                        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                            <i class="bx bx-pencil font-size-16"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="checkout-item">
                            <div class="avatar checkout-icon p-1">
                                <div class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                </div>
                            </div>
                            <div class="feed-item-list">
                                <div>
                                    <h5 class="font-size-16 mb-1">Payment Info</h5>
                                    <p class="text-muted text-truncate mb-4">Duis arcu tortor, suscipit eget</p>
                                </div>
                                <div>
                                    <h5 class="font-size-14 mb-3">Payment method :</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div data-bs-toggle="collapse">
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay-method" id="pay-methodoption1" class="card-radio-input">
                                                    <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="bx bx-credit-card d-block h2 mb-3"></i>
                                                        Credit / Debit Card
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-sm-6">
                                            <div>
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay-method" id="pay-methodoption2" class="card-radio-input">
                                                    <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="bx bxl-paypal d-block h2 mb-3"></i>
                                                        Paypal
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <div>
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked="">

                                                    <span class="card-radio py-3 text-center text-truncate">
                                                        <i class="bx bx-money d-block h2 mb-3"></i>
                                                        <span>Cash on Delivery</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row my-4">
                <div class="col">
                    <a href="ecommerce-products.html" class="btn btn-link text-muted">
                        <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                </div> <!-- end col -->
                <div class="col">
                    <div class="text-end mt-2 mt-sm-0">
                        <a href="#" class="btn btn-success">
                            <i class="mdi mdi-cart-outline me-1"></i> Procced </a>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>
        <div class="col-xl-4">
            @livewire('checkout.cart-content')
        </div>
    </div>
    <!-- end row -->
    
</div>