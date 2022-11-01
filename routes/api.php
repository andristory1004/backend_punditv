<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BallanceController;
use App\Http\Controllers\API\CampaignController;
use App\Http\Controllers\API\PriceListController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\MaxProgressController;
use App\Http\Controllers\API\ViewProgressController;
use App\Http\Controllers\API\SubscribeProgressController;
use App\Http\Controllers\API\BallanceTransactionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    
    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/profile', 'profile');
        Route::post('/profile/update', 'update');
        // Route::prefix('/profile')->group(function () {
        //     Route::get('/', 'profile');
        //     Route::post('/', 'update');
        // });

        Route::post('/logout', 'logout');
    });

});

Route::get('categories', [CategoriesController::class, 'index']);

Route::controller(CampaignController::class)->group(function () {
    Route::get('public/campaign', 'campaign');
    Route::get('public/campaign/{id}', 'showCampaign');
    Route::middleware('auth:sanctum')->group(function (){
        Route::get('campaign', 'index');
        Route::post('campaign.store', 'store');
    });
});

Route::get('max-progress', [MaxProgressController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('progress/view', ViewProgressController::class);
    Route::resource('progress/subscribe', SubscribeProgressController::class);
});

Route::controller(PriceListController::class)->group(function () {
    Route::middleware('auth:sanctum')->group(function (){
        Route::get('campaign-price', 'campaignPrice');
        Route::get('earn-price', 'earnPrice');
    });
});

Route::controller(BallanceTransactionController::class)->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('ballance-transaction', 'index');
        Route::post('ballance-transaction/store', 'store');
    });
});

Route::controller(BallanceController::class)->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('credit-point', 'point');
        Route::get('credit-pundi', 'pundi');
    });
});