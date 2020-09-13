<?php

use Illuminate\Support\Facades\Route;

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

// testpage route - delete after project is finished!!!
Route::get('/test', function () {
    /*these can be processed trough controller but since they are only simple arrays
    and we don't wanna place them directly into views */
    
    return view('smaltestpage');
});

Route::get('/', function () {
    return view('index');
});
Route::get('/locirani', function () {
    return view('located');
});
// Route::get('/rezultati-pretrage', function () {
//     return view('search-results');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//all select data routes
Route::get('/vidjeni', 'SelectOptionsController@seenPetsPageSelectOptions');
Route::get('/locirani', 'SelectOptionsController@locatedPageSelectOptions');
Route::get('/', 'SelectOptionsController@indexPageSelectOptions');
Route::get('/rezultati-pretrage', 'SelectOptionsController@searchResultPageSelectOptions');


Route::post('/vidjeni', 'UploadController@uploadSeenPet')->name('uploadSeenPet');

Route::get('/locirani', 'DisplayController@displaySeenPets')->name('displaySeenPets');

// Route::get('/', 'DisplayController@searchLocatedPets')->name('searchLocatedPets');

Route::post('/rezultati-pretrage', 'DisplayController@searchLocatedPets')->name('searchLocatedPets');




