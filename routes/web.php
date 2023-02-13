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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::resource('demo',App\Http\Controllers\DemoController::class);




Route::group(['middleware' => ['auth']], function () { 


    Route::get('/', function () {
        return view('home');
    });

    
    Route::resource('persons',App\Http\Controllers\admin\PersonController::class);
    Route::get('/persons_search', [App\Http\Controllers\admin\PersonController::class, 'persons_search'])->name('persons_search');

});
