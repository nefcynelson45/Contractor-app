<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LaborController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MailController;
use App\Models\WorkModel;



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

Route::get('/', function () {
    $work=WorkModel::all();
    return view('index',compact('work'));
}); 

    //Auth::routes();
    Route::auth();

    Route::post('auth/loginread',[LoginController::class,'login'])->name('auth.log');
    Route::post('auth/customerread',[LoginController::class,'reg'])->name('auth.regist');  
    Route::get('auth/logout',[LoginController::class,'logout'])->name('auth.logout'); 


    
    Route::get('/auth/login',[LoginController::class,'create'])->name('auth.login');
    Route::get('/auth/reg', [LoginController::class,'create1'])->name('auth.register');

    Route::get('/admin', [CustomerController::class,'create1']); 
    //Route::post('/adminsearch',[CustomerController::class,'adminsearch']);
    Route::get('/addlabor', [LaborController::class,'create']);
    Route::post('/laborsearch',[LaborController::class,'search']);
    Route::get('/addmaterial', [MaterialController::class,'create']);
    Route::post('/matsearch',[MaterialController::class,'search']);
    Route::get('/addconst', [ConstructionController::class,'create']);
    Route::post('/consearch',[ConstructionController::class,'search']);
    Route::post('/laborread',[LaborController::class,'store']);
    Route::post('/matread',[MaterialController::class,'store']);
    Route::post('/consread',[ConstructionController::class,'store']);
    Route::get('/viewallcustomers',[RegistrationController::class,'index']);
    Route::post('/custsearch',[RegistrationController::class,'search']);
    Route::get('/viewallbooking',[BookingController::class,'index']);
    Route::post('/booksearch',[BookingController::class,'bsearch']);
    Route::get('/viewfball',[FeedbackController::class,'index']);
    Route::post('/fbsearch',[FeedbackController::class,'search']);
    Route::get('/workview',[BookingController::class,'show']);
    Route::post('/worksearch',[BookingController::class,'search']);

    Route::get('/labor/{id}/edit',[LaborController::class,'edit']);
    Route::post('/laboreditprocess/{id}',[LaborController::class,'update']);
    Route::get('/labor/{id}/delete',[LaborController::class,'delete']);
    
    Route::get('/mat/{id}/edit',[MaterialController::class,'edit']);
    Route::post('/mateditprocess/{id}',[MaterialController::class,'update']);
    Route::get('/mat/{id}/delete',[MaterialController::class,'delete']);
    
    Route::get('/cons/{id}/edit',[ConstructionController::class,'edit']);
    Route::post('/conseditprocess/{id}',[ConstructionController::class,'update']);
    Route::get('/cons/{id}/delete',[ConstructionController::class,'delete']);
    
    Route::get('/book/{id}/accept',[BookingController::class,'accept']);
    Route::get('/book/{id}/reject',[BookingController::class,'reject']);
    
    
    Route::get('/works', [BookingController::class,'viewwork']);
    Route::get('/work/{id}/edit',[BookingController::class,'work']);
    Route::post('/workeditprocess/{id}',[BookingController::class,'workupdate']);
    Route::get('/work/{id}/delete',[BookingController::class,'workdelete']);
    
    Route::get('/breport',[BookingController::class,'print']);
    Route::get('/creport',[CustomerController::class,'print']);

    //customer
    Route::get('/auth/login',[LoginController::class,'create'])->name('auth.login');
    Route::get('/auth/reg', [LoginController::class,'create1'])->name('auth.register');

    Route::get('/cust', [CustomerController::class,'create']); 
    Route::get('/booking', [BookingController::class,'create']);
    Route::post('/fb/{id}', [FeedbackController::class,'create']);
    Route::post('/fbread/{id}',[FeedbackController::class,'store']);
    Route::post('/bookread',[BookingController::class,'store']);
        
    Route::get('/feedback/{id}/edit',[FeedbackController::class,'edit']);
    Route::post('/feedbackeditprocess/{id}',[FeedbackController::class,'update']);
    Route::get('/feedback/{id}/delete',[FeedbackController::class,'delete']);
    

    Route::get('/viewbooking',[BookingController::class,'indexcust']);
    Route::get('/viewfb',[FeedbackController::class,'indexcust']);

    Route::get('/profile/{id}/edit', [CustomerController::class,'profile']); 
    Route::post('/profileeditprocess/{id}',[CustomerController::class,'profileupdate']);


    Route::middleware(['AuthCheck'])->group(function () { 


});

Route::middleware(['CustCheck'])->group(function () { 


    
});

