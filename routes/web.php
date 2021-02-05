<?php

use App\Http\Controllers\ProductsFrontController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/', 'MainController@index')->name('admin.index')->middleware(['role:superadmin|helper|seo|analytic']);
    Route::resource('/categories', 'CategoryController')->middleware(['role:superadmin|helper']);
    Route::resource('/subcategories', 'SubcategoryController')->middleware(['role:superadmin|helper']);
    Route::resource('/products', 'ProductController')->middleware(['role:superadmin|helper']);
    Route::resource('/users', 'UserController')->middleware(['role:superadmin']);
    Route::resource('/rubrics', 'RubricController')->middleware(['role:superadmin|seo|helper|analytic']);
    Route::resource('/posts', 'PostController')->middleware(['role:superadmin|seo|helper|analytic']);
    Route::resource('/options', 'OptionsController')->middleware(['role:superadmin|helper']);
    Route::resource('/branch', 'BranchController')->middleware(['role:superadmin|helper']);
    Route::resource('/banners', 'BannerController')->middleware(['role:superadmin|helper']);
    Route::resource('/coupons', 'CouponController')->middleware(['role:superadmin']);
    Route::resource('/import', 'ImportController')->middleware(['role:superadmin|helper']);
    Route::resource('/orders', 'OrderController')->middleware(['role:superadmin']);
    Route::resource('/profile', 'ProfileController')->middleware(['role:superadmin|helper|seo|analytic']);;
    Route::post('/getbranch', 'ProductOptionController@getoption')->name('getbranch')->middleware(['role:superadmin|helper']);
    Route::get('/role/{current}/{role}/{id}', 'UserController@role')->name('users.role')->middleware(['role:superadmin']);
});








Route::group(['middleware' => 'guest'], function (){
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::get('/login', 'UserController@loginform')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});



Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', 'UserController@logout')->name('logout');
    Route::post('/user/change/{id}', 'UserController@update')->name('user.data.edit');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::resource('/checkout', 'CheckoutController');
    Route::resource('/order', 'OrderController');
    Route::resource('/wishlist', 'WishlistController');
    Route::post('/wishlist/delete', 'WishlistController@delete')->name('wishlist.delete');
    Route::get('/cart-clear', 'CartController@clear')->name('cart.clear');
    Route::post('/wishlists/switch-to-cart/{product}', 'WishlistController@switchtocart')->name('wishlists.switchtocart');
});



Route::get('/', 'ProductsFrontController@index')->name('index.page');


Route::get('/product/show/{id}', 'ProductsFrontController@show')->name('product.show');
Route::get('/products/list/{id}', 'ProductsFrontController@list')->name('product.list');
Route::get('/products/filter/{id}', 'ProductsFrontController@filter')->name('product.filter');

Route::resource('/carts', 'CartController');
Route::post('/carts/add-to-wishlist/{product}', 'CartController@wishlist')->name('carts.wishlist');
Route::post('/carts/updateqty', 'CartController@updateqty')->name('update.qty');




Route::post('/comment/save/{id}', 'CommentController@store')->name('comment.save');
Route::post('/coupon', 'CouponController@check')->name('coupon.check');

Route::get('/search', 'SearchController@index')->name('search');


