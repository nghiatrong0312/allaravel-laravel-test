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
Route::get('/welcome', 'WelcomeController@index', function () {
    return controller('welcome');
});
Route::get('/', 'MainController@index',function () {
    return controller('main');
});

// Categories Page
Route::get('/categories/{id}', 'CategoriesController@index', function(){
	return controller('categories', ['id' => $id]);
});

// Product Page
Route::get('/product/{id}', 'ProductController@index', function(){
	return controller('product');
});

Route::get('/getproduct/{id}', 'ProductController@getproduct', function(){
	return controller('product', ['id' => $id]);
});

// Product Sale Page __________________________________________________

Route::get('/productsale', 'ProductSaleController@detail', function(){
	return controller('product');
});

Route::post('/productsale/addcart', 'ProductSaleController@addcart', function(){
	return controller('product');
});
Route::get('/productsale/setquantity', 'ProductSaleController@getquantity', function(){
	return controller('product');
});

// Cart page


Route::get('cart/view/{id}', 'CartController@index', function(){
	return controller('cart', ['id' => $id]);
});
Route::get('cart/viewdetail', 'CartController@viewdetail', function(){
	return controller('cart');
});
Route::get('cart/view', 'CartController@view', function(){
	return controller('cart');
});
Route::get('cart/destroy/{id}', 'CartController@destroy', function(){
	return controller('cart', ['id' => $id]);
});
Route::get('cart/getquantity', 'CartController@getquantity', function(){
	return controller('cart');
});
Route::get('cart/setotalbill', 'CartController@setotalbill', function(){
	return controller('cart');
});
Route::get('cart/setquantity', 'CartController@setquantity', function(){
	return controller('cart');
});


//  Order___________________________________________

Route::post('/order', [
	'uses' => 'OrderController@store',
	'as' => 'order.store',
]);


Route::get('/cart/order', 'OrderController@view', function(){
	return controller('order');
});

Route::get('/cart/orderdetail/{id}', 'OrderController@index', function(){
	return controller('order', ['id' => $id]);
});

Route::get('/cart/order/destroy', 'OrderController@index', function(){
	return controller('order');
});

Route::get('/cart/checkout', 'OrderController@checkout_view', function(){
	return controller('order');
});


// Blogs Page
Route::get('/blogs', 'BlogsController@index', function(){
	return controller('blogs');
});
Route::get('/blogs/getview/{id}', 'BlogsController@getview', function(){
	return controller('blogs');
});
Route::get('/blogs/getview1/{id}', 'BlogsController@getview1', function(){
	return controller('blogs');
});
Route::get('/blogs/{id}', 'BlogsController@view', function(){
	return controller('blogs', ['id' => $id]);
});
Route::get('/blogs/categories/{id}', 'BlogsController@view_categories', function(){
	return controller('blogs', ['id' => $id]);
});

Route::post('/blogs/comment', 'CommentController@view', function(){
	return controller('comment');
});
Route::get('/blogs/comment/show/{id}', 'CommentController@show', function(){
	return controller('comment');
});


Route::get('/blogs/reply/{id}', 'ReplyController@view', function(){
	return controller('blogs', ['id' => $id]);
});

Route::post('/blogs/reply/{id}', [
	'uses' => 'ReplyController@store',
	'as' => 'reply.store',
]);


// LOGIN PAGE ________________________________________________

Route::get('/login', 'LoginController@index', function(){
	return controller('login');
});

Route::get('/login/logout', 'LoginController@logout', function(){
	return controller('login');
});

Route::post('/login', 'LoginController@check', function(){
	return controller('login');
});

// Create Acccount ____________________________________________

Route::get('/register', 'RegisterController@index', function(){
	return controller('register');
});

Route::post('/register', [
	'uses' => 'RegisterController@store',
	'as' => 'register.store',
]);


/// Search_____________________________________________________

Route::get('/search', [
	'uses' => 'SearchController@search',
	'as' => 'search',
]);


// Profile Customer_____________________________________________

Route::get('/profile/{id}', 'ProfileController@index', function(){
	return controller('profile');
});


// Get Email Customer

Route::get('feedback', 'FeedbackControlller@index', function(){
	return controller('feedback');
});

Route::post('feedback', 'FeedbackController@savefeedback', function(){
	return controller('feedback');
});




Route::get('auth/facebook', 'FacebookAuthController@redirectToProvider')->name('facebook.login') ;
Route::get('auth/facebook/callback', 'FacebookAuthController@handleProviderCallback');


// About And Contact Page ____________________________________________________________

Route::get('about', 'AboutController@index', function(){
	return controller('about');
});

Route::get('contact', 'ContactController@index', function(){
	return controller('contact');
});

Route::get('testslider', function(){
	return view('test');
});