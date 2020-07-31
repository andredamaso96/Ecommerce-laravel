<?php

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

//frontend site........................
Route::get('/', 'HomeController@index');


//mostrar os produtos da categoria selecionada

Route::get('/product_by_category/{category_id}', 'HomeController@show_product_by_category');
Route::get('/product_by_subcategory/{category_id}{subcategories_id}', 'HomeController@show_product_by_subcategory');
Route::get('/product_by_subcategory_b/{category_id}{subcategories_id}', 'HomeController@show_product_by_subcategory_b');
Route::get('/product_by_brand/{category_id}{brands_id}', 'HomeController@product_by_brand');
Route::get('/view_product/{product_id}', 'HomeController@product_details_by_id');
Route::get('/price_by_1/{category_id}', 'HomeController@price_by_1');
Route::get('/price_by_2/{category_id}', 'HomeController@price_by_2');
Route::get('/price_by_3/{category_id}', 'HomeController@price_by_3');

//carrinho routes
Route::post('/add-to-cart', 'CartController@add_to_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::post('/update-cart', 'CartController@update_cart');

//checkout routes
Route::get('/login-check', 'CheckoutController@login_check');
Route::get('/register', 'CheckoutController@register_check');
Route::post('/customer_registration', 'CheckoutController@customer_registration');
Route::get('/checkout', 'CheckoutController@checkout');
Route::post('/save-shipping-details', 'CheckoutController@save_shipping_details');

//login e logout
Route::get('/customer_logout', 'CheckoutController@customer_logout');
Route::post('/customer_login', 'CheckoutController@customer_login');

//payment
Route::get('/payment', 'CheckoutController@payment');
Route::post('/order-place', 'CheckoutController@order_place');


//backend routes......................................................................................................................
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');


//categoria relacionada
Route::get('/add-category', 'CategoryController@index');
Route::get('/all-category', 'CategoryController@all_category');
Route::post('/save-category', 'CategoryController@save_category');
Route::get('/edit-category/{category_id}', 'CategoryController@edit_category');
Route::post('/update-category/{category_id}', 'CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'CategoryController@delete_category');
Route::get('/unactive_category/{category_id}', 'CategoryController@unactive_category');
Route::get('/active_category/{category_id}', 'CategoryController@active_category');

//marcas relacionadas
Route::get('/add-brand', 'BrandController@index');
Route::post('/save-brand', 'BrandController@save_brand');
Route::get('/all-brand', 'BrandController@all_brand');
Route::get('/delete-brand/{brands_id}', 'BrandController@delete_brand');
Route::get('/edit-brand/{brands_id}', 'BrandController@edit_brand');
Route::post('/update-brand/{brands_id}', 'BrandController@update_brand');
Route::get('/unactive_brand/{brands_id}', 'BrandController@unactive_brand');
Route::get('/active_brand/{brands_id}', 'BrandController@active_brand');

//subcategoria relacionada
Route::get('/add-subcategory', 'SubcategoryController@index');
Route::post('/save-subcategory', 'SubcategoryController@save_subcategory');
Route::get('/all-subcategory', 'SubcategoryController@all_subcategory');
Route::get('/delete-subcategory/{subcategories_id}', 'SubcategoryController@delete_subcategory');
Route::get('/edit-subcategory/{subcategories_id}', 'SubcategoryController@edit_subcategory');
Route::post('/update-subcategory/{subcategories_id}', 'SubcategoryController@update_subcategory');
Route::get('/unactive_subcategory/{subcategories_id}', 'SubcategoryController@unactive_subcategory');
Route::get('/active_subcategory/{subcategories_id}', 'SubcategoryController@active_subcategory');

//produtos relacionados
Route::get('/add-product', 'ProductController@index');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/all-product', 'ProductController@all_product');
Route::get('/unactive_product/{product_id}', 'ProductController@unactive_product');
Route::get('/active_product/{product_id}', 'ProductController@active_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');