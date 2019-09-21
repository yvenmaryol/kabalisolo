<?php


Route::get('annonces/offres', 'AnnonceController@offres');
Route::get('annonces/demandes', 'AnnonceController@demandes');
Route::get('annonce/details/{annonce}', 'AnnonceController@show');
Route::post('annonce/post', 'AnnonceController@store');


// Route::get('images', 'ImageController@index');

Route::group([

    // 'middleware' => 'api',
    // 'prefix' => 'auth'

], function ($router) {

    Route::patch('annonce/update/{annonce}', 'AnnonceController@update');
    Route::DELETE('annonce/delete/{annonce}', 'AnnonceController@destroy');

    // Route::resource ('annonce/update', 'AnnonceController', [
    //     'only' => ['destroy', 'update']
    // ]);

});

Route::group([

    // 'middleware' => 'api',
    // 'prefix' => 'auth'

], function ($router) {
    Route::get('mes-annonces/offres', 'UserController@offres');
    Route::get('mes-annonces/demandes', 'UserController@demandes');
    Route::get('mes-annonces/disabled', 'UserController@disabled');
    Route::get('mes-annonces/details/{annonce}', 'UserController@show');
    Route::get('auth/mon-profil', 'UserController@profil');
    Route::post('auth/mon-profil/update', 'UserController@update');
    Route::post('auth/mon-profil/update-password', 'UserController@updatePassword');
    Route::post('auth/mon-profil/update-profil-picture', 'UserController@profilPicture');
    Route::post('annonce/like/{id}', 'LikeController@likeIt');
    Route::delete('annonce/like/{id}', 'LikeController@unLike');
    Route::get('subcategory', 'SubcategoryController@index');
    Route::get('cities', 'CityController@index');
});



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('signup', 'AuthController@signup');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    

});
