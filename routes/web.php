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

    Route::resource('departments',App\Http\Controllers\admin\departmentController::class);
    Route::resource('emps',App\Http\Controllers\admin\empController::class);


    Route::resource('follow_up',App\Http\Controllers\admin\follow_upController::class);






    Route::get('/user_follow_up_logs/{id}', [App\Http\Controllers\admin\follow_upController::class, 'index_id'])->name('user_follow_up_logs');
    Route::get('/leads_report', [App\Http\Controllers\admin\PersonController::class, 'index_reports'])->name('leads_report');
    Route::get('/persons_search_with_filter', [App\Http\Controllers\admin\PersonController::class, 'persons_search_with_filter'])->name('persons_search_with_filter');
    Route::get('/person_make_excel', [App\Http\Controllers\admin\PersonController::class, 'make_excel'])->name('person_make_excel');



    Route::resource('complain',App\Http\Controllers\admin\complain_Controller::class);
    Route::resource('complain2',App\Http\Controllers\admin\complain_Controller2::class);
    Route::get('/complaint_report', [App\Http\Controllers\admin\complain_Controller::class, 'index_reports'])->name('complaint_report');



    Route::get('/complain_logs/{id}', [App\Http\Controllers\admin\complain_Controller::class, 'index_id'])->name('complain_logs');
 
    
   // Route::get('/complain_logs/{id}', [App\Http\Controllers\admin\complain_Controller::class, 'index_id'])->name('complain_logs');



   Route::get('/rmm', function() {
    \Artisan::call('optimize:clear');
    return 'Application cache cleared';
});




    


});
