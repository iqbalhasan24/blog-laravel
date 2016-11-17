<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', [
    'as' => 'home',
    'uses' => 'WelcomeController@getWecomePage'
]);
Route::get('/page/home', [
    'as' => 'home',
    'uses' => 'WelcomeController@getWecomePage'
]);
Route::get('/admin/login', [
    "as" => "user.admin.login",
    "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getAdminLogin'
]);

Route::group(['middleware'=>['logged','can_see']], function()
{
    Route::get('/page/{slug}', 'WelcomeController@getPage');    
});  
Route::get('/pages/{slug}', 'WelcomeController@getFooterPage');


Route::get('/admin/contact-us', [
    'middleware' => array('logged', 'can_see'),
    'as' => 'contact.form',
    'uses' => 'ContactController@create']);
Route::post('/admin/contact-us', [
    'middleware' => array('logged', 'can_see'),
    'as' => 'contact.store',
    'uses' => 'ContactController@store']);

Route::post('/media/getAllMedia', [
    'as' => 'media.getAllMedia',
    'uses' => 'TemplateController@getAllMedia'
]);

Route::post('/media/search', [
    'as' => 'media.search',
    'uses' => 'TemplateController@mediaPagination'
]);
Route::get('/media/mediaPagination', [
    'as' => 'media.search',
    'uses' => 'TemplateController@mediaPagination'
]);
Route::get('/media/userPagination', [
    'as' => 'media.user-wise-pagination',
    'uses' => 'TemplateController@search'
]);

/* User log Activities START */
Route::get('/admin/snippetlog', [
    'as' => 'admin.logactivity',
    'uses' => 'LogActivityController@postSnippetLogActivity'
]);

/* not in use */
Route::get('/admin/userUpload', [
    'as' => 'admin.userupload',
    'uses' => 'LogActivityController@postUserUpload'
]);
/*User log Activities END */
