<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Category;







/**
 * Summary of AdminController
 */
class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['showAdminLoginForm','adminLogin']);
        
    }
    public function index()
    {
        return view('admin.index')->with([
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);
    }
      public function create(){
        return view('admin.create')->with([
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);

      }
      public function store(){
        return view('admin.store')->with([
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);

      }
      public function edit($id){
       
        $product = Product::find($id);
        
        return view('admin.edit')->with([
            'product' => $product,
       
            'categories' => Category::all(),
        ]);

      }
        public function update(Request $request, $id){
            // echo $id;
            // die;

            $product = Product::find($id);
            $product->title = $request->input('title');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->old_price = $request->input('old_price');
            $product->inStock = $request->input('inStock');
            $product->category_id = $request->input('category_id');
            $product->qty = $request->input('qty');
            $product->save();

            
            return view('admin.index')
            ->with([
              
                'products' => Product::all(),
           


            ]);
    
        }

    public function showAdminLoginForm(){
        
        return view('login');
    }

     
  
    /**
     * Summary of adminLogout
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function adminLogout(Request $request){
        Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'));
        return redirect()->route('login');    

    }













    

}