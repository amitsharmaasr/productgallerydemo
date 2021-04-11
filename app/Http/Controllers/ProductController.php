<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\products;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Session::forget("carts");
        $productsimages = products::with("productsimages")->orderBy('stock')->get();

        $productsvariants = products::with("productsvariants")->orderBy('stock')->get();

        $modified_products = [];

        foreach ($productsimages as $index => $value)
        {
            if($value->id ==  $productsvariants[$index]->id){
                array_push($modified_products, array(
                    "id" => $value->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "stock" => $value->stock,
                    "imageurl" => $value["productsimages"][0]->source,
                    "size" => $productsvariants[$index]["productsvariants"]->size,
                ));
            }
        }
       $data = $this->paginate($modified_products);
       
       return view('products.index', compact("data"));
        
    }

    public function paginate($items, $perPage =  15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ? : 1);
        $options["path"] = url("products");
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productsimages = products::where('id', $id)->with("productsimages")->get();

        $productsvariants = products::where('id', $id)->with("productsvariants")->get();

        $modified_products = [];

        foreach ($productsimages as $index => $value)
        {
                array_push($modified_products, array(
                    "id" => $value->id,
                    "name" => $value->name,
                    "price" => $value->price,
                    "stock" => $value->stock,
                    "imageurl" => $value["productsimages"],
                    "variants" => $productsvariants[$index]["productsvariants"],
                ));
        }

        $modified_products = $modified_products[0];
        
        return view('products.view', compact("modified_products"));
    }

    public function addtocart($id, $quantity){
        $productsimages = products::where('id', $id)->with("productsimages")->first();
        $datatobesaved =  [
            "id" => $id,
            "name" => $productsimages->name,
            "price" => $productsimages->price,
            "imageurl" => $productsimages["productsimages"][0]->source,
            "quantity" => $quantity
        ];
        $cartproducts = Session::has('carts') ? Session::get('carts') : [];
        //if(array_search($id, array_column($cartproducts, "id")) === false){
            if(count($cartproducts) >= 1){
                $cartproducts[count($cartproducts)] = $datatobesaved;
            }else{
                $cartproducts[0] = $datatobesaved;
            }
            Session::forget('carts');
            Session::put('carts', $cartproducts);
        //}
        return redirect('/viewcart');  
    }

    public function removefromcart($id){
        $cartproducts = Session::has('carts') ? Session::get('carts') : [];
        $datatobesaved = [];
        foreach($cartproducts as $index => $value){
            if($index != $id){
                array_push($datatobesaved, $value);
            }
        }
        Session::forget('carts');
        Session::put('carts', $datatobesaved);
        return redirect('/viewcart'); 
    }

    public function viewcart(){
        $cartproducts = Session::has('carts') ? Session::get('carts') : [];
        return view('products.cart', compact("cartproducts"));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
