<?php
use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('/cart', 'CartController');
Route::post('/cart/update', 'CartController@updateCart');

Route::get('/book/{id}', ['as'=>'home.book', 'uses'=>'HomeController@showBook']);
Route::get('/writer/{id}', ['as'=>'home.writer', 'uses'=>'HomeController@showWriter']);
Route::get('/category/{id}', ['as'=>'home.category', 'uses'=>'HomeController@showCategory']);

Route::get('/new-releases/books', ['as'=>'new.releases.books', 'uses'=>'HomeController@newReleasesBooks']);
Route::get('/best-sellers/books', ['as'=>'best.sellers.books', 'uses'=>'HomeController@bestSellersBooks']);

Route::get('/search/{id}', ['as'=>'search', 'uses'=>'HomeController@singleSearch']);
Route::get('/search', 'HomeController@showSearchResult');

Route::get('/pdf-generator/{id}', 'OrderController@pdfGenerator')->name('pdf');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/profile/{id}', ['as'=>'profile', 'uses'=>'ProfileController@index']);
	Route::get('/profile/{id}/edit', ['as'=>'profile.edit', 'uses'=>'ProfileController@edit']);
	Route::patch('/profile/update/{id}', ['as'=>'profile.update', 'uses'=>'ProfileController@update']);

	Route::get('/checkout', 'OrderController@index')->name('checkout');
	Route::post('/checkout', 'OrderController@store');
	Route::get('/order/details/{id}', 'OrderController@order_details')->name('order-details');

	Route::get('/myorder', 'OrderController@myorder')->name('myorder');
	Route::post('/comment', 'CommentController@postComent');
	Route::post('/reply', 'CommentController@postReply');

});


Route::group(['middleware' => 'backend', 'prefix' => 'admin'], function(){
	Route::get('/', 'Admin\AdminController@index')->name('admin.index');
	Route::resource('/book', 'Admin\AdminBooksController');
	Route::resource('/writer', 'Admin\AdminWritersController');
	Route::resource('/category', 'Admin\AdminCategoriesController');
	Route::resource('/slider', 'Admin\AdminSlidersController');
	Route::post('/delete/slider', 'Admin\AdminSlidersController@deleteSlider');
	Route::get('/order', 'Admin\AdminOrderController@index')->name('admin-orders');
	Route::get('/order/{id}', 'Admin\AdminOrderController@delete')->name('order-delete');
	Route::get('/order/details/{id}', 'Admin\AdminOrderController@details')->name('admin-order-details');
	Route::get('/order/aprove/{id}', 'Admin\AdminOrderController@approve')->name('approve');

	Route::get('/users', 'Admin\AdminUserController@users')->name('users-control');
	Route::post('/delete/users', 'Admin\AdminUserController@delete');

	Route::get('/comment', 'Admin\AdminUserController@comment')->name('comments');
	Route::post('/delete/comment', 'Admin\AdminUserController@deleteComment');


	//ChartJS
	Route::get('/books-ratio', 'Admin\AdminController@getBooksRation')->name('books-ratio');
	Route::get('/orders-ratio', 'Admin\AdminController@getOrdersRation')->name('orders-ratio');
});


Route::group(['prefix' => 'admin'], function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

