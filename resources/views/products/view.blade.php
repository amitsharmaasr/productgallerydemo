<style>
 body {
     background-color: #EEEEEE
 }

 a {
     text-decoration: none !important
 }

 a.disabled1 {
  pointer-events: none;
  cursor: default;
}

 .card-product-list,
 .card-product-grid {
     margin-bottom: 0
 }

 .card {
     width: 500px;
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 23px;
     margin-top: 50px
 }

 .card-product-grid:hover {
     -webkit-box-shadow: 0 4px 15px rgba(153, 153, 153, 0.3);
     box-shadow: 0 4px 15px rgba(153, 153, 153, 0.3);
     -webkit-transition: .3s;
     transition: .3s
 }

 .card-product-grid .img-wrap {
     border-radius: 0.2rem 0.2rem 0 0;
     height: 220px
 }

 .card .img-wrap {
     overflow: hidden
 }

 .card-lg .img-wrap {
     height: 280px
 }

 .card-product-grid .img-wrap {
     border-radius: 0.2rem 0.2rem 0 0;
     height: 275px;
     padding: 16px
 }

 [class*='card-product'] .img-wrap img {
     height: 100%;
     max-width: 100%;
     width: auto;
     display: inline-block;
     -o-object-fit: cover;
     object-fit: cover
 }

 .img-wrap {
     text-align: center;
     display: block
 }

 .card-product-grid .info-wrap {
     overflow: hidden;
     padding: 18px 20px
 }

 [class*='card-product'] a.title {
     color: #212529;
     display: block
 }

 .rating-stars {
     display: inline-block;
     vertical-align: middle;
     list-style: none;
     margin: 0;
     padding: 0;
     position: relative;
     white-space: nowrap;
     clear: both
 }

 .rating-stars li.stars-active {
     z-index: 2;
     position: absolute;
     top: 0;
     left: 0;
     overflow: hidden
 }

 .rating-stars li {
     display: block;
     text-overflow: clip;
     white-space: nowrap;
     z-index: 1
 }

 .card-product-grid .bottom-wrap {
     padding: 18px;
     border-top: 1px solid #e4e4e4
 }

 .bottom-wrap-payment {
     padding: 0px;
     border-top: 1px solid #e4e4e4
 }

 .rated {
     font-size: 10px;
     color: #b3b4b6
 }

 .btn {
     display: inline-block;
     font-weight: 600;
     color: #343a40;
     text-align: center;
     vertical-align: middle;
     -webkit-user-select: none;
     -moz-user-select: none;
     -ms-user-select: none;
     user-select: none;
     background-color: transparent;
     border: 1px solid transparent;
     padding: 0.45rem 0.85rem;
     font-size: 1rem;
     line-height: 1.5;
     border-radius: 0.2rem
 }

 .btn-primary {
     color: #fff;
     background-color: #3167eb;
     border-color: #3167eb
 }

 .fa {
     color: #FF5722
 }


.imgcontainer {
  display: flex;
  justify-content: space-between;
}
</style>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div class="container d-flex justify-content-center">
    <div class="row float-right">
                <a href = "{{ url('viewcart') }}" target="_blank">
                <i class="fa" style="font-size:24px; color:black;">&#xf07a;</i>
                <span class='badge badge-light' id='lblCartCount'> {{ Session::has('carts') ? count(Session::get('carts')) : "0"}} </span>
                </a>
    </div>
     <figure class="card card-product-grid card-lg"> <a href="#" class="img-wrap" data-abc="true"> <img src="{{$modified_products['imageurl'][0]['source']}}"> </a>
         <figcaption class="info-wrap">
             <div class="row">
                 <div class="col-md-9 col-xs-9"> <a href="#" class="title disabled1" data-abc="true">{{$modified_products["name"]}}</a> <span class="rated">{{$modified_products['stock'] == "out" ? "out of the stock" : $modified_products['variants']['quantity']. " items in the stock"}}</span> </div>
                 <div class="col-md-3 col-xs-3">
                     <div class="rating text-right"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="rated">Rated 4.0/5</span> </div>
                 </div>
             </div>
         </figcaption>
         <div class="bottom-wrap-payment">
             <figcaption class="info-wrap">
                 <div class="row">
                     <div class="col-md-3 col-xs-3"> <a href="#" class="title disabled1" data-abc="true">&#8377; {{$modified_products['price']}} </a> <span class="rated"></span> </div>
                     <div class="col-md-9 col-xs-9">
                        <div class="rating text-left"> 
                            <?php $size = explode(', ', $modified_products['variants']['size']); foreach($size as $s){?>
                                <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="size" id="size" value="{{$s}}">
                                                <label class="form-check-label" for="size">{{$s}}</label>
                                </div>
                            <?php } ?>
                        </div>
                     </div>
                 </div>
             </figcaption>
         </div>
         <div class="bottom-wrap-payment">
             <figcaption class="info-wrap">
                 <div class="row">
                     <div class="col-md-3 col-xs-3"> <a href="#" class="title disabled1" data-abc="true">Color</a> <span class="rated"></span> </div>
                     <div class="col-md-9 col-xs-9">
                        <div class="rating text-left"> 
                            <?php $color = explode(', ', $modified_products['variants']['color']); foreach($color as $s){?>
                                <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="color" id="color" value="{{$s}}">
                                                <label class="form-check-label" for="color">{{$s}}</label>
                                </div>
                            <?php } ?>
                        </div>
                     </div>
                 </div>
             </figcaption>
         </div>
         <div class="bottom-wrap-payment">
             <figcaption class="info-wrap">
                 <div class="row">
                     <div class="col-md-3 col-xs-3"> <a href="#" class="title disabled1" data-abc="true">Quantity</a> <span class="rated"></span> </div>
                     <div class="col-md-9 col-xs-9">
                        <div class="rating text-left"> 
                                <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="number" name="quantity" id="quantity" value="1" min=1 max=10 {{$modified_products['stock'] == 'out' ? 'disabled': ''}}>
                                </div>
                        </div>
                     </div>
                 </div>
             </figcaption>
         </div>
         <div class="bottom-wrap"> <button id="addtocart" class="btn btn-warning float-right" data-abc="true" {{$modified_products['stock'] == 'out' ? 'disabled': ''}}> Add to Cart </button>
         <!--<div class="bottom-wrap"> <a href="{{url('addtocart').'/'.$modified_products['id'].'/1'}}" class="btn btn-warning float-right {{$modified_products['stock'] == 'out' ? 'disabled': ''}}" data-abc="true" >Add to Cart</a>-->
             <div class="price-wrap"> <a href="{{url('products')}}" class="btn btn-info float-left" data-abc="true"> Cancel </a> </div>
         </div>
     </figure>
</div>
<hr>
<h4> Product Images </h4>
<br>
<div class="imgcontainer">
@foreach($modified_products['imageurl'] as $img)
    <img src="{{$img['source']}}" alt="test" style="width:18%" onclick="myFunction(this);">
@endforeach
</div>
<br>
<br>
 <script>
        
        $("#addtocart").click( function()
           {
               var quantity = $("#quantity").val();
               var id= <?php echo $modified_products['id']; ?>;
               window.location.href = '<?php echo env('APP_URL'); ?>'+'/addtocart/'+id+'/'+quantity;
           }
        );
 </script>