<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\PundiController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EarnPriceController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CampaignPriceController;

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
    return view('auth.login');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('admin', AdminController::class);
    Route::get('profile', [AdminController::class, 'profile'])->name('admin');

    Route::resource('user', UserController::class);
    
    Route::controller(CampaignController::class)->group(function (){ 
        Route::get('campaign', 'index')->name('campaign');
        Route::get('campaign/view', 'campaignView')->name('campaign.view');
        Route::get('campaign/subscribe', 'campaignSubscribe')->name('campaign.subscribe');
    });

    Route::resource('advertise', AdvertiseController::class);

    Route::controller(PriceController::class)->group(function (){ 
        Route::get('price-list', 'index')->name('price-list');
        Route::get('add/campaign/price', 'createCampaignPrice')->name('add/campaign/price');
        Route::get('edit/{$id}/campaign-price', 'editCampaignPrice')->name('edit/campaign/price');
        Route::post('update/campaign/price/{$id}', 'updateCampaignPrice')->name('update/campaign/price');
        Route::get('add/earn/price', 'createEarnPrice')->name('add/earn/price');
    });

    Route::resource('transaction', TransactionController::class);

    Route::resource('inbox', InboxController::class);
});