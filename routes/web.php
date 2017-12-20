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
//wechat
Route::any('/wechat', 'WeChatController@serve');

Route::any('/wechat/course', 'WeChatController@course')->name('wechatcourse');
Route::any('/wechat/chapter/{course}', 'WeChatController@chapter')->name('wechatchapter');
Route::any('/wechat/section/{chapter}', 'WeChatController@section')->name('wechatsection');

Route::get('/wechat/act/{section}', 'WeChatController@act')->name('wechatact');


Route::any('/weixinmini', 'WeChatController@weixinmini')->name('weixinmini');
Route::any('/jssdk', 'WeChatController@jssdk')->name('jssdk');
Route::any('/getsource', 'WeChatController@getsource')->name('getsource');
Route::any('/getsourcetwo', 'WeChatController@getsourcetwo')->name('getsourcetwo');

//wechat
//phrase

Route::resource('phrase', 'PhraseController');

Route::post('/phrase/query', 'PhraseController@query')->name('phrasequery');

Route::resource('course', 'CourseController');

Route::get('/section/{chapter}', 'SectionController@index')->name('sectionindex');

Route::get('/section/additem/{section}', 'SectionController@additem')->name('sectionadditem');
Route::post('/section/additemsave', 'SectionController@additemsave')->name('sectionadditemsave');

Route::any('/section/additemremove/{phrasesection}', 'SectionController@additemremove')->name('sectionadditemremove');

Route::any('/section/{section}', 'SectionController@update')->name('sectionupdate');

Route::get('/section/edit/{section}', 'SectionController@edit')->name('sectionedit');
Route::any('/section/destroy/{section}', 'SectionController@destroy')->name('sectiondestroy');
Route::get('/section/create/{chapter}', 'SectionController@create')->name('sectioncreate');
Route::post('/section', 'SectionController@store')->name('sectionstore');

Route::get('/chapter/{course}', 'ChapterController@index')->name('chapterindex');

Route::get('/chapter/edit/{course}', 'ChapterController@edit')->name('chapteredit');

Route::any('/chapter/destroy/{chapter}', 'ChapterController@destroy')->name('chapterdestroy');

Route::get('/chapter/create/{course}', 'ChapterController@create')->name('chaptercreate');

Route::post('/chapter/store', 'ChapterController@store')->name('chapterstore');

//ciba
Route::get('/query/{word}', 'WordController@query')->name('query');
Route::get('/googlespeech', 'WordController@googlespeech')->name('googlespeech');
Route::get('/baiduspeech', 'WordController@baiduspeech')->name('baiduspeech');

Route::post('/search', 'WordController@search')->name('search');

Route::get('/word/index', 'WordController@index')->name('wordindex');

Route::get('/ciba', 'PaChongController@ciba')->name('ciba');

Route::get('/ciba/list', 'PaChongController@list')->name('cibalist');
//Route::get('/cibadb', 'PaChongController@cibadb')->name('cibadb');
Route::get('/crawl/{word}', 'PaChongController@crawl')->name('crawl');

//endciba
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
