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

Route::get('/', function () {
	if(Auth::user()){
		return view('welcome');
	}
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/questionairs/create', 'QuestionairController@create')->name('create-questionar');
Route::post('/store-questionair','QuestionairController@store')->name('store-questionair');
Route::get('/questionairs','QuestionairController@index')->name('questionairs-view');
Route::get('/questionair-edit/{id}','QuestionairController@edit')->name('edit');
Route::post('/questionair-update','QuestionairController@update')->name('update');
Route::get('/questionair-delete/{id}','QuestionairController@destroy')->name('delete-questionair');

/** 
 * Questions Routes
 */
Route::get('/questionairs/create/{id}','QuestionsController@create')->name('create-question');
Route::post('/add-new-question','QuestionsController@addNewQuestion')->name('add-new-question');
Route::post('/store-questions','QuestionsController@store')->name('store-questions');