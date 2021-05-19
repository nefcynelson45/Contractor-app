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

    Route::get('/profile/{id}/edit', [CustomerController::class,'profile']); 
    Route::post('/profileeditprocess/{id}',[CustomerController::class,'profileupdate']);

    
    Route::get('/auth/login',[LoginController::class,'create'])->name('auth.login');
    Route::get('/auth/reg', [LoginController::class,'create1'])->name('auth.register');

    Route::get('/admin', [CustomerController::class,'create1']); 
    Route::get('/addlabor', [LaborController::class,'create']);
    Route::get('/addmaterial', [MaterialController::class,'create']);
    Route::get('/addconst', [ConstructionController::class,'create']);
    Route::post('/laborread',[LaborController::class,'store']);
    Route::post('/matread',[MaterialController::class,'store']);
    Route::post('/consread',[ConstructionController::class,'store']);
    Route::get('/viewallcustomers',[RegistrationController::class,'index']);
    Route::get('/viewallbooking',[BookingController::class,'index']);
    Route::get('/viewfball',[FeedbackController::class,'index']);
    Route::get('/workview',[BookingController::class,'show']);
    
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

    Route::middleware(['AuthCheck'])->group(function () { 


});

Route::middleware(['CustCheck'])->group(function () { 


    
});

