<?php

use App\Http\Controllers\API\Delivery\BaggageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\Supervisor\BranchController;
use App\Http\Controllers\API\Supervisor\CompanyController;
use App\Http\Controllers\API\UserController as APIUserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Delivery\DeliveryBaggageController;
use App\Http\Controllers\API\Delivery\DeliveryStatusController;
use App\Http\Controllers\API\User\DeliverandUserController;
use App\Http\Controllers\API\User\FeedbackController;
use App\Models\DelivererAndUser;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');



// Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');

// log in and register routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register/user', [AuthController::class, 'user_register']);
Route::post('/register/deliverer', [AuthController::class, 'deliverer_register']);


Route::get('/get_users', [AuthController::class, 'get_users']);



Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [AuthController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/change_password', [AuthController::class, 'change_password']);
    

    Route::prefix('users')->group(function (){
        Route::get('/list',[APIUserController::class, 'index']);
    });

    // Company 
    Route::prefix('companies')->group(function () {
        Route::get('/list', [CompanyController::class, 'index']);
        Route::post('/create', [CompanyController::class, 'store']);
        Route::get('/show/{company}', [CompanyController::class, 'show']);
        Route::put('/edit/{company}', [CompanyController::class, 'update']);
        Route::delete('delete/{company}', [CompanyController::class, 'destroy']);
    });
    
     // Branch
     Route::prefix('branches')->group(function () {
        Route::get('/list', [BranchController::class, 'index']);
        Route::post('/create', [BranchController::class, 'store']);
        Route::get('show/{branch}', [BranchController::class, 'show']);
        Route::put('edit/{branch}', [BranchController::class, 'update']);
        Route::delete('delete/{branch}', [BranchController::class, 'destroy']);
    });

});
// user post

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/list_post', [PostController::class, 'index']);
    Route::get('/post/{id}', [PostController::class, 'get_post']);
    Route::post('/post', [PostController::class, 'store']);
});

//Delivery baggage

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/delivery_baggage', [DeliveryBaggageController::class, 'PostDelivery']);
    Route::get('/delivery_baggage', [DeliveryBaggageController::class, 'GetPost']);
    Route::get('/delivery_baggage/{id}', [DeliveryBaggageController::class, 'GetDelivery']);
});

//Baggage

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/baggage_post', [BaggageController::class, 'BaggagePost']);
    Route::get('/baggage_list', [BaggageController::class, 'BaggageList']);
    Route::get('/baggage_list/{id}', [BaggageController::class, 'GetBaggageById']);
    Route::delete('/baggage_delete/{id}', [BaggageController::class, 'DeleteBaggage']);
});

// Delivery status

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/delivery_status_post', [DeliveryStatusController::class, 'DeliveryStatusPost']);
    Route::get('/delivery_status_list', [DeliveryStatusController::class, 'ListStatus']);
    Route::get('/delivery_status_list/{id}', [DeliveryStatusController::class, 'DeliverStatusListByid']);
});

// Company
// Route::middleware('auth:sanctum')->group(function(){

// Feedback routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/feedback_post', [FeedbackController::class, 'FeedbackPost']);
    Route::get('/feedback_list', [FeedbackController::class, 'FeedbackList']);
    Route::get('/feedback_list/{id}', [FeedbackController::class, 'GetFeedbackById']);
});

// Deliverer and User 

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/DeliverersAndUser/last', [DeliverandUserController::class, 'lastDelivererId']);
});

// Route::post('/feedback_post', [FeedbackController::class, 'store']);



// Company
// Route::middleware('auth:sanctum')->group(function(){

//     Route::prefix('company')->group(function () {
//         Route::get('/list', [CompanyController::class, 'index']);
//         Route::post('/create', [CompanyController::class, 'store']);
//         Route::get('/{company}', [CompanyController::class, 'show']);
//         Route::put('/{company}', [CompanyController::class, 'update']);
//         Route::delete('/{company}', [CompanyController::class, 'destroy']);
//     });
// });
    // Company 


   
