<?php

Route::get('/index','FrontController@index');
Route::get('/categories','FrontController@getCategory');
Route::get('/category-products/{id}','FrontController@getCategoryProduct');
Route::get('/product-details/{id}','FrontController@productDetails');
Route::post('/add-to-cart','FrontController@addToCart');
Route::get('/show-cart','FrontController@showCart');
Route::get('/delete-cart/{rowid}','FrontController@deleteCart');
Route::post('/update-cart/{rowId}','FrontController@updateCart');

Route::get('/checkout','FrontController@checkout');
Route::post('/checkout/registration','CustomerController@checkoutReg');
Route::post('/checkout/login','CustomerController@checkoutLogin');
Route::get('/logout','CustomerController@checkoutLogout');

Route::get('/shipping','CustomerController@shippingForm');
Route::post('/shipping/save','CustomerController@shippingSave');
Route::get('/payment','CustomerController@paymentForm');

Route::get('/email-check/{email}','CustomerController@emailCheck');

Route::post('/order-confirm','CustomerController@confirmOrder');
Route::get('/order-received','CustomerController@confirmReceive');

Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');


//Route::get('/{anypath}', 'FrontController@index')->where('any', '.*');
//Route::get('/category/{id}','FrontController@category')->name('category');
//Route::get('/products/{id}/{name}','FrontController@products')->name('products');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin-category','CategoryController@index')->name('admin-category');
Route::get('/add-category','CategoryController@addCategory')->name('add-category');
Route::post('/save-category','CategoryController@saveCategory')->name('save-category');
Route::get('/unpublished-category/{id}','CategoryController@unpublishCategory')->name('unpublished-category');
Route::get('/published-category/{id}','CategoryController@publishCategory')->name('published-category');
Route::get('/edit-category/{id}','CategoryController@editCategory')->name('edit-category');
Route::post('/update-category','CategoryController@updateCategory')->name('update-category');
Route::get('/delete-category/{id}','CategoryController@deleteCategory')->name('delete-category')->middleware('superAdmin');

Route::resource('brand','BrandController');

Route::resource('product','ProductController');

//Route::group(['middleware' => 'superAdmin'], function()
//{
//    Route::get('product','ProductController@index');
//    Route::get('product/{id}/delete', 'ProductController@destroy');
//});


Route::resource('user','UserController')->middleware('superAdmin');

Route::get('manage-order','OrderController@index');
Route::get('/excel-export','OrderController@export');
Route::post('/import','OrderController@import');
Route::get('manage-order-details/{id}','OrderController@orderDetails');
Route::get('/invoice/{id}','OrderController@invoice');
Route::get('/invoice-pdf/{id}','OrderController@invoicePdf');










