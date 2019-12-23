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

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::group( [ 'middleware' => 'auth' ], function ()
{
    Route::get( '/', function () {
        return view( 'index' );
    });

    Route::get( '/initiation-handler', function() {
        return view( 'initiationHandle' );
    } )->name( 'initiationHandle' );

    Route::get( '/document', function () {
        return view( 'documents' );
    })->name( 'documents' );

    Route::get( '/kläder', 'FetchClothes' )->name( 'clothes' );
    Route::patch( 'updateOveralls', 'UpdateOverallCount' );
    Route::patch( 'updateShirts', 'UpdateInitiationShirtsCount' );

    Route::resources([
        'song' => 'SongController',
        'board' => 'BoardController',
        'member' => 'MemberController',
        'partner' => 'PartnerController',
        'initiation' => 'InitiationController',
        'day' => 'InitiationDaysController',
        'person' => 'InitiationKeyPeopleController',

    ]);
});
