<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Http\Controllers\AdminController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();


Route::get('/about', function () {
    return view('about');
});



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products/show', [App\Http\Controllers\CartController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('indexproduct');
Route::resource('products', App\Http\Controllers\ProductController::class);
Route::get('products/category/{category}', [App\Http\Controllers\HomeController::class, 'getProductByCategory'])->name('category.products'); 

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/add/cart/{product}', [App\Http\Controllers\CartController::class, 'addProductToCart'])->name('add.cart')->middleware('auth');
Route::put('/update/{product}/cart', [App\Http\Controllers\CartController::class, 'updateProductFromCart'])->name('update.cart');
Route::delete('/remove/cart/{productId}', [CartController::class, 'removeProductFromCart']);
//admin routes
Route::get('admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
Route::post('admin/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/edit/{product}', [AdminController::class, 'edit']);
Route::put('/admin/update/{product}', [AdminController::class, 'update']);
Route::get('admin/products', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.products');
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
// Route::get('/login', [App\Http\Controllers\AdminController::class,'showAdminLoginForm'])->name('login');
Route::get('/logout', [App\Http\Controllers\AdminController::class, 'adminLogout'])->name('admin.logout');

}
);

