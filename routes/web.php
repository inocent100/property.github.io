<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->middleware(['auth:web','Check.role:Admin'])->group(function(){
    Route::view('/','dashboard.admin');
    Route::resource('users','UserController');
    Route::resource('posts','PostController');
    // Route::resource('posts','PostController@upload');
    // Route::get('/getAjaxData/{id}','PostController@getAjaxData');
    Route::resource('roles','UserController');
    Route::resource('images','ImageController');
    Route::resource('catagories','CatagoryController');
    Route::resource('pages','PageController');
    // Route::post('/storedata', 'PostController@storeData')->name('form.data');
    // Route::post('/storeimgae', 'PostController@storeImage');


});

Route::prefix('/')->group(function(){

    Route::get('/','ClientLoginController@mainPage')->name('/');

    Route::resource('prop_search','UkpostcodeController');
    Route::post('/prop_search','UkpostcodeController@searchProp')->name('prop_search');

    Route::post('signlePreview','UkpostcodeController@signlePreview')->name('signlePreview');


    Route::resource('/userregister','RegistrationController');
    Route::get('userregister','RegistrationController@register')->name('userregister');

    Route::resource('adListing','AdController');

    Route::get('publishAd','AdController@adsList')->name('publishAd');

    Route::post('preview','AdController@preview')->name('preview');

    Route::get('userlogin', 'ClientLoginController@index')->name('userlogin');
    Route::post('/userlogin/checklogin', 'ClientLoginController@checklogin')->name('users.checklogin');
    Route::get('userlogin/successlogin', 'ClientLoginController@successlogin');
    Route::get('userlogin/logout', 'ClientLoginController@logout');


    // Route::post('gpList/{val?}','UkpostcodeController@getPostcodeList');
    Route::post('/verifyPostcode/{val?}','UkpostcodeController@verifyPostcode')->name('verifyPostcode');
    
    Route::post('gpList/{val?}','UkpostcodeController@getPostcodeList')->name('gpList');


    // Route::post('verifyPostcode',function($data){

    //     return "hello jee";

    // })->name('verifyPostcode');

});



// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('ajaxRequestFile/{val}','AdController@fileSessionUpdate');
Route::get('ajaxRequestVideo/{val}','AdController@videoSessionUpdate');
Route::get('ajaxReq/{val?}/{dist?}','UkpostcodeController@ajaxReq');

Route::post('getPostcodeList/{val?}','UkpostcodeController@getPostcodeList');


Route::get('get_ajax_data', 'UkpostcodeController@get_ajax_data');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
