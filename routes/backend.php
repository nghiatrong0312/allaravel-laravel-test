<?php 


Route::get('/', 'HomeController@index', function(){
	return controller('home');
});

//Login Page
Route::get('/login', 'LoginController@index', function(){
	return controller('login');
});

Route::post('/login', [
	'uses' => 'LoginController@check',
	'as' => 'login.check',
]);
Route::get('/logout', [
	'uses' => 'LoginController@logout',
	'as' => 'logout',
]);

//Admin Page

Route::get('/info', 'AdminController@viewall', function(){
	return controller('admin');
});
Route::get('/profile', 'AdminController@index', function(){
	return controller('admin');
});

//Categories Page

Route::get('/categories', 'CategoriesController@index', function(){
	return controller('categories');
});

Route::get('/categories/create', 'CategoriesController@create', function(){
	return controller('categories');
});

Route::post('/categories/create', [
	'uses' => 'CategoriesController@store',
	'as' => 'categories.store',
]);
Route::get('/categories/delete/{id}', 'CategoriesController@delete', function(){
	return controller('categories', ['id' => $id]);
});

Route::get('/categories/view/{id}', 'CategoriesController@view', function(){
	return controller('categories', ['id' => $id]);
});

Route::post('/categories/update/{id}', 'CategoriesController@update', function(){
	return controller('categories', ['id' => $id]);
});

//Product page

Route::get('/product/viewall', 'ProductsController@viewall', function()
{
	return controller('products');
});

Route::get('/product/create', 'ProductsController@create', function()
{
	return controller('products');
});

Route::get('/product/sold', 'ProductsController@sold', function()
{
	return controller('products');
});

Route::get('/product/view/{id}', 'ProductsController@view', function()
{
	return controller('products', ['id' => $id]);
});

Route::get('/product/viewdetail/{id}', 'ProductsController@viewdetail', function()
{
	return controller('products', ['id' => $id]);
});

Route::get('/product/editview/{id}', 'ProductsController@editview', function()
{
	return controller('products', ['id' => $id]);
});

Route::post('/product/update/{id}', 'ProductsController@update', function(){
	return controller('products', ['id' => $id]);
});

Route::post('/product/store', [
	'uses' => 'ProductsController@store',
	'as' => 'products.store',
]);

Route::get('/product/destroy/{id}', 'ProductsController@destroy', function(){
	return controller('products', ['id' => $id]);
});

// Status Product_____________________________________________________________ 

Route::get('/statusproduct', 'StatusProductController@index', function(){
	return controller('statusproduct');
});
Route::get('/statusproduct/viewdetail/{id}/{id_customer}', 'StatusProductController@viewdetail', function(){
	return controller('statusproduct', ['id' => $id, 'id_customer' => $id_customer]);
});
Route::get('/statusproduct/update/{id}', 'StatusProductController@update', function(){
	return controller('statusproduct', ['id' => $id]);
});
Route::get('/statusproduct/delivered/{id}', 'StatusProductController@delivered', function(){
	return controller('statusproduct', ['id' => $id]);
});
Route::get('/statusproduct/sold/{id}', 'StatusProductController@sold', function(){
	return controller('statusproduct', ['id' => $id]);
});

// Size Page

Route::get('/size/create', 'SizeController@create', function()
{
	return controller('size');
});

Route::get('/size/destroy/{id}/{id_pro}', 'SizeController@destroy', function()
{
	return controller('size', ['id' => $id, 'id_pro' => $id_product]);
});

Route::post('/size/create', [
	'uses' => 'SizeController@store',
	'as' => 'size.store',
]);

// Color Page

Route::get('/color/destroy/{id}/{id_pro}', 'ColorController@destroy', function()
{
	return controller('color', ['id' => $id, 'id_pro' => $id_product]);
});


// Blogs Page____________________________________________________________

Route::get('/blogcategories/view', 'BlogCategoriesController@index', function()
{
	return controller('blogcategories');
});
Route::get('/blogcategories/destroy/{id}', 'BlogCategoriesController@destroy', function()
{
	return controller('blogcategories', ['id' => $id]);
});
Route::post('/blogcategories/create', [
	'uses' => 'BlogCategoriesController@store',
	'as' => 'blogcategories.store',
]);

Route::get('/blogpost/viewpost/{id}', 'BlogPostController@viewpost', function()
{
	return controller('blogpost', ['id' => $id]);
});

Route::get('/blogpost/viewall', 'BlogPostController@create', function()
{
	return controller('blogpost');
});


Route::get('/blogpost/create', 'BlogPostController@create', function()
{
	return controller('blogpost');
});

Route::get('/blogpost/view/{id}', 'BlogPostController@viewfollowcategories', function()
{
	return controller('blogpost');
});
Route::post('/blogpost/create', [
	'uses' => 'BlogPostController@store',
	'as' => 'post.store',
]);


// Address Page & Social Network __________________________________________________

Route::get('/network', 'SocialNetworkController@index', function()
{
	return controller('network');
});

Route::post('/network/store', [
	'uses' => 'SocialNetworkController@store',
	'as' => 'network.store',
]);
Route::get('/network/delete/{id}', 'SocialNetworkController@destroy', function()
{
	return controller('network');
});

Route::get('/address', 'AddressController@index', function()
{
	return controller('address');
});
Route::post('/address/store', [
	'uses' => 'AddressController@store',
	'as' => 'address.store',
]);
Route::get('/address/destroy/{id}', 'AddressController@destroy', function()
{
	return controller('address');
});

// Setting Theme___________________________________________________________

Route::get('/setting/header', 'HeaderBarController@index', function()
{
	return controller('header');
});

Route::post('/setting/header/store', [
	'uses' => 'HeaderBarController@store',
	'as' => 'header.store',
]);

Route::get('/setting/header/destroy/{id}', 'HeaderBarController@destroy', function()
{
	return controller('header');
});

Route::get('/setting/slide', 'SlideController@index', function()
{
	return controller('slide');
});
Route::post('/setting/slide/store', [
	'uses' => 'SlideController@store',
	'as' => 'slide.store',
]);
Route::get('/setting/slide/destroy/{id}', 'SlideController@destroy', function()
{
	return controller('slide');
});

Route::get('/setting/about', 'AboutController@index', function()
{
	return controller('about');
});

Route::post('/setting/about/store', [
	'uses' => 'AboutController@store',
	'as' => 'about.store',
]);

Route::get('/setting/about/view/{id}', 'AboutController@show', function()
{
	return controller('about');
});
Route::post('/setting/about/update/{id}', 'AboutController@update', function()
{
	return controller('about');
});
Route::post('/setting/about/service/{id}', 'ServiceController@update', function()
{
	return controller('service');
});

Route::get('/setting/home', 'HomeFrontendController@index', function()
{
	return controller('homefrontend');
});

Route::get('/setting/home/categories_block', 'HomeFrontendController@viewcategoriesblock', function()
{
	return controller('homefrontend');
});
Route::post('/setting/home/categories_block/updatebackground', [
	'uses' => 'HomeFrontendController@update_background',
	'as' => 'background.update',
]);
Route::post('/setting/home/categories_block/update/{id}', 'HomeFrontendController@update_categories', function()
{
	return controller('homefrontend');
});
Route::post('/setting/home/incentives/update/{id}', 'HomeFrontendController@update_incentives', function()
{
	return controller('homefrontend');
});

Route::get('/setting/productsale', 'ProductSaleController@index', function()
{
	return controller('productsale');
});
Route::post('/setting/productsale/update/{id}', 'ProductSaleController@update', function()
{
	return controller('productsale');
});

// Gift Code Page ______________________________________________

Route::get('giftcode', 'GiftCodeController@index', function(){
	return controller('giftcode');
});

Route::post('giftcode/store', 'GiftCodeController@store', function(){
	return controller('giftcode');
});
Route::get('giftcode/update/{id}', 'GiftCodeController@update', function(){
	return controller('giftcode');
});
Route::get('giftcode/destroy', 'GiftCodeController@destroy', function(){
	return controller('giftcode');
});