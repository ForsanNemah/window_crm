<?php






 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;




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










Route::get('/se', function () {
    echo "wwe";


    $mailData = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp.'
    ];




    Mail::to('myproeng@gmail.com')->send(new HelloMail($mailData));


});









Route::group(['middleware' => ['auth']], function () { 


    Route::get('/', function () {
        return view('home');
    }


);
















    
    Route::resource('persons',App\Http\Controllers\admin\PersonController::class);
    Route::get('/persons_search', [App\Http\Controllers\admin\PersonController::class, 'persons_search'])->name('persons_search');


    Route::get('/persons_search_by_name', [App\Http\Controllers\admin\PersonController::class, 'persons_search_by_name'])->name('persons_search_by_name');



    Route::resource('departments',App\Http\Controllers\admin\departmentController::class);
    Route::resource('emps',App\Http\Controllers\admin\empController::class);


    Route::resource('follow_up',App\Http\Controllers\admin\follow_upController::class);


 
    Route::resource('UsersReport',App\Http\Controllers\admin\UsersReportController::class);
    Route::get('/UsersReport_id/{id}', [App\Http\Controllers\admin\UsersReportController::class, 'index_id'])->name('UsersReport_id');


    Route::post('/users_report_filter', [App\Http\Controllers\admin\UsersReportController::class, 'users_report_filter'])->name('users_report_filter');





    Route::get('/user_follow_up_logs/{id}', [App\Http\Controllers\admin\follow_upController::class, 'index_id'])->name('user_follow_up_logs');
    Route::get('/leads_report', [App\Http\Controllers\admin\PersonController::class, 'index_reports'])->name('leads_report');
    Route::get('/persons_search_with_filter', [App\Http\Controllers\admin\PersonController::class, 'persons_search_with_filter'])->name('persons_search_with_filter');
    Route::get('/person_make_excel', [App\Http\Controllers\admin\PersonController::class, 'make_excel'])->name('person_make_excel');



    Route::resource('complain',App\Http\Controllers\admin\complain_Controller::class);
    Route::resource('complain2',App\Http\Controllers\admin\complain_Controller2::class);
    Route::get('/complaint_report', [App\Http\Controllers\admin\complain_Controller::class, 'index_reports'])->name('complaint_report');

    Route::resource('quotation',App\Http\Controllers\admin\quotationController::class);

    Route::resource('invoice',App\Http\Controllers\admin\invoiceController::class);
    

    Route::get('/complain_logs/{id}', [App\Http\Controllers\admin\complain_Controller::class, 'index_id'])->name('complain_logs');
 
    
    Route::get('/quotation_create/{id}', [App\Http\Controllers\admin\complain_Controller::class, 'create_with_id'])->name('quotation_create_with_id');
    Route::get('/quotation_index_id/{id}', [App\Http\Controllers\admin\quotationController::class, 'index_id'])->name('quotation_index_id');

    Route::get('/create_sales_order/{id}', [App\Http\Controllers\admin\quotationController::class, 'create_sales_order'])->name('create_sales_order');


    Route::get('/show_invoices/{id}', [App\Http\Controllers\admin\invoiceController::class, 'show_invoices'])->name('show_invoices');


    Route::get('/make_invoice_excel/{id}', [App\Http\Controllers\admin\excel_make_Controller::class, 'make_invoice_excel'])->name('make_invoice_excel');

    Route::get('/make_quotation_excel/{id}', [App\Http\Controllers\admin\excel_make_Controller::class, 'make_quotation_excel'])->name('make_quotation_excel');



 
    Route::get('/make_sells_order_excel/{id}', [App\Http\Controllers\admin\excel_make_Controller::class, 'make_sells_order_excel'])->name('make_sells_order_excel');








    Route::get('/create_invoice_order/{id}', [App\Http\Controllers\admin\quotationController::class, 'create_invoice_order'])->name('create_invoice_order');








    Route::get('/create_invoice_order/{id}', [App\Http\Controllers\admin\invoiceController::class, 'create_invoice_order'])->name('create_invoice_order');










    Route::get('/show_all_sells_orders', [App\Http\Controllers\admin\quotationController::class, 'show_all_sells_orders'])->name('show_all_sells_orders');



   Route::get('/rmm', function() {
    \Artisan::call('optimize:clear');
    return 'Application cache cleared';
});




    


});
