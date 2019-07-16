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

// ユーザー登録
Route::get('signup', 'SignupController@index')->name('signup.index');
Route::post('signup', 'SignupController@postIndex');
Route::get('signup/confirm', 'SignupController@confirm')->name('signup.confirm');
Route::post('signup/confirm', 'SignupController@postConfirm');
Route::get('signup/thanks', 'SignupController@thanks')->name('signup.thanks');

// 管理者
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function () {

  // ユーザーが認証している時にアクセスできなくなる
  Route::middleware('guest:admin')->group(function (){
    // ログイン画面
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
  });

  Route::middleware('auth:admin')->group(function (){
    // ログアウト
    Route::get('logout', 'LoginController@logout')->name('logout');
    // 管理者画面TOP
    Route::get('', 'IndexController@index')->name('top');

    // メッセージ管理
    Route::get('message', 'MessageController@index')->name('message.index');
    Route::get('message/create', 'MessageController@create')->name('message.create');
    Route::post('message/create', 'MessageController@store');
    Route::get('message/edit/{message}', 'MessageController@edit')->name('message.edit'); // モデル・ルート・バインディング
    Route::post('message/edit/{message}', 'MessageController@update'); // モデル・ルート・バインディング
    
    // ユーザー管理
    Route::get('user', 'UserController@index')->name('user.index');
    Route::delete('user/destroy/{user}', 'UserController@destroy')->name('user.destroy');  
  });
});
