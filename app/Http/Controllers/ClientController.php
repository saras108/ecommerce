<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Item;
use App\Cart;
use App\User;
use App\BroughtItem;
use DB;
use Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('display', 1)->inRandomOrder()->get();
        // dd($items);
        // $photo = $items->id;
        // dd($photo);
        return view('user.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function myproduct($id)
    {

        $product = DB::table('items')
           ->join('stores', 'items.store_id', '=', 'stores.id')
           ->where('items.id','=', $id)
           ->select('items.*', 'stores.store_name')
           ->first();

        $related = Item::where(['store_id'=> $product->store_id, 'status'=>1 ])->take(3)->get();

        $img = json_decode($product->images);

        return view('user.pages.product_details', compact('product','img', 'related'));
    }


    public function size($size)
    {
        $items = Item::where(['display'=> 1, 'size'=>$size])->get();
         return view('user.pages.selection', compact('items'));
    }


    public function cost($cost)
    {
        if($cost == '< 500'){
          $items = Item::where(['display'=> 1, 'cost'<500])->get();
        }elseif($cost == '1000 >= 500'){
            $items = Item::where('display' , 1)->whereBetween('cost',[500,1000])->get();
        }else{
            $items = Item::where(['display'=> 1, 'cost' >= 1000])->get();
        }
        
         return view('user.pages.selection', compact('items'));
    }


    public function color($color)
    {
        $items = Item::where(['display'=> 1, 'color'=>$color])->get();
         return view('user.pages.selection', compact('items'));
    }


    public function checkout()
    {
        return view('user.pages.checkout');
    }


    public function cart()
    {
        if(!Session::get('cart'))
            {
                return view('user.pages.cart', ['products' =>null]);
            }

        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        return view('user.pages.cart', ['products' => $cart->items , 'totalPrice' => $cart->totalPrice]);
    }


    public function contact()
    {
        return view('user.pages.contact');
    }

    public function mission()
    {
        return view('user.pages.mission');
    }


    public function policy()
    {
        return view('user.pages.policy');
    }


    public function brand()
    {
        return view('user.pages.brand');
    }

    public function  getAddToCart(Request $request ,$id)
    {
        $item = Item::find($id);
        // dd($item);
        $oldcart = Session::has('cart') ? Session::get('cart'):null;

         // dd($oldcart);

        $cart = new Cart($oldcart);
        // dd($cart);
        $cart->add($item , $item->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('home');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function moveon(Request $request)
    {
        // dd($request);
        $items = array(
            'brand_name'=> $request->brand_name,
            'color'=> $request->color,
            'print'=> $request->print,
            'qty'=> $request->qty,
            'cost'=> $request->cost,
        );
        $items = json_encode($items);
        $total = $request->total;
        $vat = $request->vat;
        $sumtotal = $request->sumtotal;

        return view('user.pages.checkout', compact('items', 'total' , 'vat' , 'sumtotal'));

        // dd($items, $total , $vat , $sumtotal);
    }

    public function store(Request $request)
    {
        $items = $request->validate([
            'items' => 'required',
            'total' => 'required',
            'vat' => 'required',
            'sumtotal' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
        ]);

        $buy = new BroughtItem;

        // $buy->name = 
        // return view('user.pages.checkout');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }


}
