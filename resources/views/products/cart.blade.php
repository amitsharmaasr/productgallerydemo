<style>
body {
    background-color: #eeeeee
}

.footer-background {
    background-color: rgb(204, 199, 199)
}

@media(max-width:991px) {
    #heading {
        padding-left: 50px
    }

    #prc {
        margin-left: 70px;
        padding-left: 110px
    }

    #quantity {
        padding-left: 48px
    }

    #produc {
        padding-left: 40px
    }

    #total {
        padding-left: 54px
    }
}

@media(max-width:767px) {
    .mobile {
        font-size: 10px
    }

    h5 {
        font-size: 14px
    }

    h6 {
        font-size: 9px
    }

    #mobile-font {
        font-size: 11px
    }

    #prc {
        font-weight: 700;
        margin-left: -45px;
        padding-left: 105px
    }

    #quantity {
        font-weight: 700;
        padding-left: 6px
    }

    #produc {
        font-weight: 700;
        padding-left: 0px
    }

    #total {
        font-weight: 700;
        padding-left: 9px
    }

    #image {
        width: 60px;
        height: 60px
    }

    .col {
        width: 100%
    }

    #zero-pad {
        padding: 2%;
        margin-left: 10px
    }

    #footer-font {
        font-size: 12px
    }

    #heading {
        padding-top: 15px
    }
}
</style>


<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<body>
<div class="container bg-white rounded-top mt-5" id="zero-pad">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12 pt-3">
            <div class="d-flex flex-column pt-4">
                <div>
                    <h5 class="text-uppercase font-weight-normal">Shopping Cart</h5>
                </div>
                <div class="font-weight-normal">{{ Session::has('carts') ? count(Session::get('carts')) : "0"}} items</div>
            </div>
            <div class="d-flex flex-row px-lg-5 mx-lg-5 mobile" id="heading">
                <div class="px-lg-5 mr-lg-5" id="produc">PRODUCTS</div>
                <div class="px-lg-5 ml-lg-5" id="prc">PRICE</div>
                <div class="px-lg-5 ml-lg-1" id="quantity">QUANTITY</div>
                <div class="px-lg-5 ml-lg-3" id="total">TOTAL</div>
            </div>
            <?php $total = 0; 
            foreach($cartproducts as $index => $products){ ?>
            <div class="d-flex flex-row justify-content-between align-items-center pt-lg-4 pt-2 pb-3 border-bottom mobile">
                <div class="d-flex flex-row align-items-center">
                    <div><img src="{{$products['imageurl']}}" width="150" height="150" alt="" id="image"></div>
                    <div class="d-flex flex-column pl-md-3 pl-1">
                        <div>
                            <h6>{{$products['name']}}</h6>
                        </div>
                    </div>
                </div>
                <div class="pl-md-0 pl-1"><b>&#8377; {{$products['price']}}</b></div>
                <div class="pl-md-0 pl-2"> <span class="px-md-3 px-1">{{$products['quantity']}}</span></div>
                <div class="pl-md-0 pl-1"><b>{{$products['price'] * $products['quantity']}}</b></div>
                <div class="close"><a href="{{url('removefromcart').'/'.$index}}" class="btn btn-info float-left" data-abc="true"> &times; </a></div>
            </div>
            <?php $total += $products['price']*$products['quantity']; }?>
        </div>
    </div>
</div>
<div class="container bg-light rounded-bottom py-4" id="zero-pad">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>  <a href="{{url('products')}}" class="btn btn-info float-left" data-abc="true"> Go Back </a>  </div>
                <div class="px-md-0 px-1" id="footer-font"> <b class="pl-md-4">SUBTOTAL<span class="pl-md-4">&#8377; {{$total}}</span></b> </div>
            </div>
        </div>
    </div>
</div>
</body>