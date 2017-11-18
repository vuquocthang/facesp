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

use App\Cl0ne;

Route::get('/', function () {
    //return view('welcome');

    return redirect('login');
});

Auth::routes();

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::namespace('Admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('/admin/5AWUi+QlHQ56i8f7j8InIQj22ujYnhsWqarST2mDoi8=', 'HomeController@index');
});



//profile
Route::get('/profile', 'HomeController@profile');

Route::get('/add-profile', 'HomeController@addProfile');

Route::post('/add-profile', 'HomeController@postAddProfile');

Route::get('/profile/view/{id}', 'HomeController@viewProfile');

Route::get('/profile/edit/{id}', 'HomeController@editProfile');

Route::get('/profile/del/{id}', 'HomeController@delProfile');

//spam
Route::get('/spam', 'SpamController@index');

Route::post('/spam/add', 'SpamController@add');

//billing
Route::get('/billing', 'BillingController@index');

//price
Route::get('/price', 'PriceController@index');

//report
Route::get('/report', 'ReportController@index');

//log
Route::get('/log', 'LogController@index');



//clone
Route::get('/clone/read', 'CloneProcessController@readFileByLine');

//api

/**
 * clone
 * /api-v1/clone/doupdate?uid={uid}&status={status}
 */

Route::get('/api-v1/clone/doupdate', 'ApiController@cloneUpdate' );

/*
 * doresult
 */
Route::get('/api-v1/doresult', 'ApiController@doResult' );

Route::get('/api-v1/doaction', 'ApiController@joinGroup');

Route::get('/api-v1/share-post', 'ApiController@sharePost');




