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
    return view('welcome');
});

Route::get('top/', function () {
    return view('top');
});

Route::get('new/', function () {
    return view('newuser');
});

Route::get('my/', function () {
    return view('mypage');
});

Route::get('bonus/', function () {
    return view('death');
});

Route::get('sitepolicy/', function () {
    return view('sitepolicy');
});

Route::get('caution/', function () {
    return view('caution');
});

Route::get('details/', function () {
    return view('details');
});

Route::get('test/', 'TestController@test');

Route::post('test/',[
	'uses'=>'TestController@getNumber',
	'as'=>'test/']);

//form送信された場合にControllerを経由してからTopページを表示するルート
Route::post('top/',[
	'uses'=>'topController@search',
	'as'=>'top/']);
	
//ルートが選択された際に詳細ページを表示するルート
Route::get('details',[
	'uses'=>'DetailController@result',
	'as'=>'details/']);
