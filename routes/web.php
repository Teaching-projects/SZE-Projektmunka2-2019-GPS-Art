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
Route::get('/my',['as' => 'my', 'uses' => 'LoginController@my'] );
Route::post('/checklogin', ['as' => 'checklogin', 'uses' => 'LoginController@checklogin']);
Route::get('/successlogin', ['as' => 'successlogin', 'uses' => 'LoginController@successlogin'] );
Route::get('/logout',['as' => 'logout', 'uses' => 'LoginController@logout'] );
Route::get('/reg',['as' => 'reg', 'uses' => 'RegistrationController@index'] );
Route::post('/reg/store', ['as' => 'regstore', 'uses' => 'RegistrationController@store']);
Route::get('/userlist', ['as' => 'userlist', 'uses' => 'UserlistController@list']);
Route::post('/delete', ['as' => 'deleteuser', 'uses' => 'UserlistController@delete']);
Route::get('/delete/verify', ['as' => 'deleteverify', 'uses' => 'UserlistController@verify']);
Route::post('/modify/mod', ['as' => 'modifyuser', 'uses' => 'UserlistController@modify']);
Route::get('/modify/show', ['as' => 'modifyusershow', 'uses' => 'UserlistController@show']);
Route::get('/drawfigure', ['as' => 'drawfigure', 'uses' => 'UploaddrawingController@index']);
Route::post('/drawfigure', ['as' => 'drawfigure', 'uses' => 'UploaddrawingController@upload'] );
Route::get('/uploadtrack', ['as' => 'uploadtrack', 'uses' => 'UploadtrackController@index']);
Route::post('/uploadtrack', ['as' => 'uploadtrack', 'uses' => 'UploadtrackController@upload']);
Route::get('/competitionlist', ['as' => 'lezaras', 'uses' => 'UserlistController@show']);
Route::get('/drawinglist', ['as' => 'drawinglist', 'uses' => 'DrawinglistController@showUsersDrawings']);
Route::get('/deletedrawing', ['as' => 'deletedrawing', 'uses' => 'DrawinglistController@deleteDrawing']);
Route::get('/viewdrawing', ['as' => 'viewdrawing', 'uses' => 'DrawinglistController@viewDrawing']);
Route::get('/renamedrawing', ['as' => 'renamedrawing', 'uses' => 'DrawinglistController@showRenameDrawing']);
Route::post('/renamedrawing', ['as' => 'renamedrawing', 'uses' => 'DrawinglistController@renameDrawing']);
Route::get('/tracklist', ['as' => 'tracklist', 'uses' => 'TracklistController@showUsersTracks']);
Route::get('/deletetrack', ['as' => 'deletetrack', 'uses' => 'TracklistController@deleteTrack']);
Route::get('/viewtrack', ['as' => 'viewtrack', 'uses' => 'TracklistController@viewTrack']);
Route::get('/renametrack', ['as' => 'renametrack', 'uses' => 'TracklistController@showRenameTrack']);
Route::post('/renametrack', ['as' => 'renametrack', 'uses' => 'TracklistController@renameTrack']);
Route::post('/savetoserver', ['as' => 'savetoserver', 'uses' => 'UploaddrawingController@saveToServer'] );
Route::get('/showdifference', ['as' => 'showdifference', 'uses' => 'ShowDifference@show'] );

Route::get('/synctrack', ['as' => 'synctrack', 'uses' => 'DatabaseController@szabitbiral'] );
Route::get('/figuretrack', ['as' => 'figuretrack', 'uses' => 'DatabaseController@szabikatmegjelenit']);
Route::get('/competitionlist', ['as' => 'competitionlist', 'uses' => 'DatabaseController@szabikatmegjelenit']);


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('view:clear');
    return $exitCode;
});