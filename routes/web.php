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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','MessagesController@index');

/*
// CRUD
// メッセージの個別詳細ページ表示
Route::get('messages/{id}', 'MessagesController@show');
// メッセージの新規登録を処理（新規登録画面を表示するためのものではありません）
Route::post('messages', 'MessagesController@store');
// メッセージの更新処理（編集画面を表示するためのものではありません）
Route::put('messages/{id}', 'MessagesController@update');
// メッセージを削除
Route::delete('messages/{id}', 'MessagesController@destroy');

//name: 「名前付きルート」=特定のルートへのURLの生成や、リダイレクトに使う
//今回は、レコードを入力する専用のフォームページに飛ばして、そこからPOSTされた内容をcreateやeditする

// index: showの補助ページ
Route::get('messages', 'MessagesController@index')->name('messages.index');

//create: 新規作成用のフォームページ
Route::get('messages/create','MessagesController@create')->name('messages.create');

//edit: 更新用のフォームページ
Route::get('messages/{id}/edit','MessagesController@edit')->name('messages.edit');
*/

///なんと、これらは以下ルーティング設定1つで出来る様準備されている//////
///しかし、上記のような記述すればオリジナルなルーティングももちろん可能///

Route::resource('messages','MessagesController');