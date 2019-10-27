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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/my', function () {
//     return "HELLOKA";
// });

Route::get('/', 'LoginController@index');
Route::get('/my', 'LoginController@my');
Route::post('/checklogin', 'LoginController@checklogin');
Route::get('/successlogin', 'LoginController@successlogin');
Route::get('/logout', 'LoginController@logout');
Route::get('/reg', 'RegistrationController@index');
Route::post('/reg/store', 'RegistrationController@store');
Route::get('/userlist', 'UserlistController@list');
Route::post('/delete', ['as' => 'deleteuser', 'uses' => 'UserlistController@delete']);
Route::get('/delete/verify', ['as' => 'deleteverify', 'uses' => 'UserlistController@verify']);
Route::post('/modify/mod', ['as' => 'modifyuser', 'uses' => 'UserlistController@modify']);
Route::get('/modify/show', ['as' => 'modifyusershow', 'uses' => 'UserlistController@show']);
Route::get('/drawfigure', 'UploaddrawingController@index');
Route::post('/drawfigure', 'UploaddrawingController@upload');
Route::get('/uploadtrack', 'UploadtrackController@index');
Route::post('/uploadtrack', 'UploadtrackController@upload');
Route::post('/synctrack', 'DatabaseController@szabitbiral');
Route::get('/figuretrack', 'DatabaseController@szabikatmegjelenit');
Route::get('/competitionlist', ['as' => 'lezaras', 'uses' => 'UserlistController@show']);
Route::get('/tracklist', ['as' => 'tracklist', 'uses' => 'TracklistController@showUsersTracks']);
Route::get('/deletetrack', ['as' => 'deletetrack', 'uses' => 'TracklistController@deleteTrack']);
Route::get('/viewtrack', ['as' => 'viewtrack', 'uses' => 'TracklistController@viewTrack']);
Route::get('/renametrack', ['as' => 'renametrack', 'uses' => 'TracklistController@showRenameTrack']);
Route::post('/renametrack', ['as' => 'renametrack', 'uses' => 'TracklistController@renameTrack']);

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('view:clear');
    return $exitCode;
});