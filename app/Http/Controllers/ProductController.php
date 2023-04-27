<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('home')->with([
            'products' => Product::latest()->paginate(12),
            'categories' => Category::has('products')->get(),
            // 'categories' => Category::all(),
        

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::all();
        // return view('admin.index')->with('categories', $categories);

        return view('admin.products.create')->with([
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' => 'required|min:3',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'inStock' => 'required',
            'qty' => 'required',
        ]);


        
      
        //add data to database

        if($request->hasFile('image')){
            $file = $request->image;
            $imageName ='images/products/' . time() . $file->getClientOriginalName();
            $file->move(public_path('images/products'), $imageName);
            $title = $request->title;
           
            Product::create([
                'id' => $request->id,
                'title' => $title,
                'slug' => str::slug($title),
                'description' => $request->description,
                'price' => $request->price,
                'old_price' => $request->old_price,
                'inStock' => $request->inStock,
                'qty' => $request->qty,
                'image' => $imageName,
                'category_id' => $request->category_id,
                // 'image' => $imageName,
                
            ]);
            
            return redirect()->route('admin.products')->with('success', 'Product created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('products.show')->with([
            'product' => $product,
            // 'categories' => Category::has('products')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        
        return view('admin.edit')->with([
            'product' => $product,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        //validation
        $this->validate($request,[
            'title' => 'required|min:3',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'category_id' => 'required',
        ]);
        if($request->has('image')){
            $image_path = public_path('images/products/' . $product->image);
            if(File::exists($image_path)){
                unlink($image_path);
            }
            $file = $request->image;
            $imageName ='images/products/' . time() . $file->getClientOriginalName();
            $file->move(public_path('images/products'), $imageName);
            $product->image = $imageName;

        }
        $title = $request->title;
        $product->update([
            'title' => $title,
            'slug' => str::slug($title),
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'inStock' => $request->inStock,
            'qty' => $request->qty,
            'image' => $product->image,
            'category_id' => $request->category_id,

        ]);
        return redirect()->route('admin.products')->with('Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $product)
    {
        //
        // $image_path = public_path('images/products/' . $product->image);
        // if(File::exists($image_path)){
        //     unlink($image_path);
        // }
        // die;
         Product::find($product)->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully');

    }
}
