<style>
body {
    background: linear-gradient(to right, #c04848, #480048);
    min-height: 100vh
}

.text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}
a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
<div class="container py-5">
    <div class="row float-right">
            <a href = "{{ url('viewcart') }}" target="_blank">
            <i class="fa" style="font-size:24px; color:white; margin-right: 5px">&#xf07a;</i>
            <span class='badge badge-light' id='lblCartCount'> {{ Session::has('carts') ? count(Session::get('carts')) : "0"}} </span>
            </a>
    </div>
    <div class="row text-center text-white mb-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4">Product List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
            @foreach($data as $products)
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">{{$products['name'] }}</h5>
                            <p class="font-italic text-muted mb-0 small">SIZE: {{$products['size']}}</p>
                            <p class="font-italic text-muted mb-0 small">STOCK: {{strtoupper($products['stock'])}}</p>
                            <h6 class="font-weight-bold my-2">PRICE: {{$products['price']}} &#8377;</h6>
                            <a href="{{url('products').'/'.$products['id']}}" class="btn btn-info" target="_blank">View</a>
                            <a href="{{url('addtocart').'/'.$products['id'].'/1'}}" class="btn btn-warning {{$products['stock'] == 'out' ? 'disabled': ''}}">Add to Cart</a>
                        </div><img src="{{$products['imageurl']}}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
            @endforeach
            </ul> <!-- End -->
            <br>
            <br>
            {{ $data->render() }}
        </div>
    </div>
</div>  
</body> 