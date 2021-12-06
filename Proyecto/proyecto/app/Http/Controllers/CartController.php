<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        ($products);
        return view('shop')->withTitle('E-TEC | SHOP')->with(['products' => $products]);
    }
    public function cart()
    {
        $cartCollection = \Cart::getContent();
        ($cartCollection);
        return view('cart')->withTitle('E-TEC | CART')->with(['cartCollection' => $cartCollection]);
    }
    
    public function add(Request$request){
        Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item agregado a carrito!');
    }
    public function remove(Request $request){
        Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item eliminado!');
    }

    public function update(Request $request){
        Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'EL Carrito esa al dia!');
    }
    public function clear(){
        Cart::clear();
        return redirect()->route('cart')->with('success_msg', 'El carrito esta Vacio!');
    }

}
