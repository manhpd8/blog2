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
// Route::get('/', function () {
//     return view('welcome');
// });

#Route::get('login','LoginController@getLogin');
#Route::get('login','LoginController@getLogin');
Route::get('people','People@getName');
Route::get('users', 'User@lan_people');
#Route::post('login','LoginController@postLogin');
Route::group(['prefix'=>'login','middleware'=>'checkLogin'], function(){
    Route::post('/','LoginController@postLogin');
    Route::get('/','LoginController@getLogin');
});
Route::group(['middleware'=>'checkAdmin'], function(){
    Route::get('logout','LoginController@getLogout');
    Route::get('home','HomeController@getHome');
});
#Route::get('category','Category@menuCategory');
Route::get('addnews','NewsController@getAdd');
Route::post('addnews','NewsController@postAdd');

Route::group(['prefix'=>'editnews'], function(){
    Route::get('/','NewsController@getEdit');
	Route::post('/','NewsController@postEdit')->name('postEdit');;
});


Route::get('news/catid/{cat_id}', 'NewsController@getNewsByCatId');
Route::get('post','NewsController@getPost');
Route::get('news/newsid/{news_id}', 'NewsController@getNewsById');