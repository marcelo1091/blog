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
Route::get('/users/{id}', function ($id) {
return 'this is users '.$id;
});
 */

Route::get('/home', 'PagesController@index')->name('home');
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/services', 'PagesController@services')->name('services');
Route::get('/logout1', 'PagesController@index')->name('logout1');
Route::get('/create', 'PostControler@create')->name('create');
Route::get('/edit/{id}', 'PostControler@edit')->name('edit');

Route::resource('posts', 'PostControler', [
    'names' => [
        'index' => 'posts',
    ],
]);

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
