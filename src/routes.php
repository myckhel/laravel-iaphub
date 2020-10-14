<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Myckhel\Iaphub\Http\Controllers\IaphubController;


$middleware = config('iaphub.route_middleware');

Route::group(['middleware' => $middleware ? explode(',', $middleware) : []], function(){
  Route::prefix('/api/iaphub')->name('iaphub')->group(function(){
    Route::post('user/{id}',            [IaphubController::class, 'postUser']);
    Route::get('user/{id}',             [IaphubController::class, 'getUser']);
    Route::post('user/{id}/pricing',    [IaphubController::class, 'postUserPricing']);
    Route::post('user/{id}/receipt',    [IaphubController::class, 'postUserReceipt']);
    Route::get('user/{id}/purchases',   [IaphubController::class, 'getUserPurchases']);
    Route::get('purchase/{id}',         [IaphubController::class, 'getPurchase']);
    Route::get('receipt/{id}',          [IaphubController::class, 'getReceipt']);
    Route::any('hooks',                 [IaphubController::class, 'hooks'])->middleware('iaphub_hook_token');
  });
  // Route::resource('/api/iaphub',        'Myckhel\CheckMobi\Http\Controllers\CheckMobiVerificationController');
});
