<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

	Route::middleware('auth:api')->get('/user', function (Request $request) {
    	return $request->user();
	});

	Route::any('/datafetch','API\MachineController@datafetch'); 

  	Route::any('app-login', 'API\LoginController@login');
  	Route::any('app-registration', 'API\LoginController@registration');
  	Route::any('category-list', 'API\CategoryController@category_listing');
  	Route::any('sub-category-list', 'API\SubcategoryController@subcategory_listing');
	Route::any('sub-category-list-filter', 'API\SubcategoryController@subcategory_listing_category_filter');
	Route::any('brand-listing', 'API\BrandController@brand_listing');
	Route::any('all/catalogue/listing', 'API\CatalogueController@catalogue_listing');
	Route::any('subcategory/category/listing', 'API\CatalogueController@catalogue_listing_with_subcategory');
	Route::any('filter/catalogue/listing', 'API\CatalogueController@catalogue_listing_filter');
	Route::any('search/product', 'API\ProductController@search_product');

	Route::any('customer/profile', 'API\UsersController@user_profile');
	Route::any('edit/customer/profile', 'API\UsersController@edit_customer_profile');
	Route::any('edit/user/password', 'API\UsersController@edit_user_password');

	/* product variant API Route*/
	Route::any('product/details', 'API\CatalogueController@productvariant');
	/* product Type API Route */
	Route::any('product/type', 'API\CatalogueController@product_type');
	/* product Attribute API Route */
	Route::any('product_attribute', 'API\CatalogueController@product_attribute');
	/* product Value API Route */
	Route::any('product/value', 'API\CatalogueController@product_value');

	/* Customers API Route */
	Route::any('add/customer', 'API\CustomerController@add_customer');
	Route::any('otp_verify', 'API\CustomerController@otp_verify');
	Route::any('delete/customer', 'API\CustomerController@delete_customer');

	/* Order API Route */
	Route::any('order/list', 'API\OrderController@index');
	Route::any('order/book', 'API\OrderController@order_book');
	Route::any('pincode/check', 'API\OrderController@pincode_check');
	Route::any('banner/listing', 'API\BannerController@banner_listing');
	Route::any('bulk/waybill/api', 'API\OrderController@bulk_waybill_api');
	Route::any('fetch/waybill', 'API\OrderController@waybill_fetch');
	Route::any('order/tracking', 'API\OrderController@order_tracking');



