<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Session\Session;












class CartController extends Controller
{
//    public function index(){
    // $products = Product::all();
    // return view('cart.index', compact('products'));
//     $products = Product::all();
//     $items = [$products];
//     return view('cart.index', compact('products', 'items'));
//    }


   public function addProductToCart(Request $request,Product  $product)
   {
    // session()->forget('cart');
    // die;
    $cart = session()->get('cart');
    // si  le panier n'existe pas, on le crée

    if(!$cart) {
        $cart = [
            $product->id => [
                "title" => $product->title,
                "id" => $product->id,
                "quantity" => $request->qty,
                "price" => $product->price,
                "image" => $product->image
            ]
        ];
        //  return redirect()->route("cart.index");
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }
    // si le produit existe déjà dans le panier, on augmente la quantité
    if(isset($cart[$product->id])) {
        $cart[$product->id]['quantity']+=$request->qty;

        // return redirect()->route("cart.index");
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }
    // sinon , on ajouter le produit au panier
    $cart[$product->id] = [

        "title" => $product->title,
        "id" => $product->id,
        "quantity" => $request->qty,
        "price" => $product->price,
        "image" => $product->image
        
    ];
    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Produit ajouté au panier');

   }


    public function updateProductFromCart(Request $request, $productId)
    {
        $cart = session()->get('cart');
        // dd(print($cart[$productId]['quantity']+$request->qty));
        $cart[$productId]['quantity']=$cart[$productId]['quantity']+$request->qty;
        session()->put('cart', $cart);
    
        return redirect()->back();
    }

    public function removeProductFromCart($productId)
    {
        $cart = session()->get('cart');
        unset($cart[$productId]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit supprimé du panier');
    }
    
    // public function showproducts(){
    //     $products = Product::all();
    //     $items = []; // déclarer une variable d'items vide pour le moment
    //     $total = 0; // initialize the $total variable to 0
    //     return view('cart.index')->with([
    //         'products' => $products, // clé 'products' => variable $products
    //         'items' => $items, // clé 'items' => variable $items
    //         'total' => $total // clé 'total' => variable $total
    //     ]);
    // }
    
    
    
}
