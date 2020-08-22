<?php




Auth::routes(['verify'=>true]);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('redirect/{service}','SocialiteController@redirect');
Route::get('callback/{service}','SocialiteController@callback');



Route::get('offre','CrudController@offre');


Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function()
{

    Route::group(['prefix' => 'offres'],function()
    {
        Route::get('create','CrudController@create');
        Route::post('store','CrudController@store');

    });
});