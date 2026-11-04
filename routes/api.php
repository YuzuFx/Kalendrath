<?php

use Illuminate\Support\Facades\Route;
use OGame\Http\Controllers\Api\V1\AuthTokenController;
use OGame\Http\Controllers\Api\V1\CityController;
use OGame\Http\Controllers\Api\V1\MeController;

/*
|--------------------------------------------------------------------------
| API Routes (JSON, Sanctum personal access tokens)
|--------------------------------------------------------------------------
|
| Loaded by bootstrap/app.php with the "api" prefix, so everything below is
| served under /api/v1. Lot 2 of docs/decision-architecture-cible.md (section 6),
| first screen: authentication + city / resources state.
|
*/

Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::post('auth/token', [AuthTokenController::class, 'store'])
        ->middleware('throttle:10,1')
        ->name('auth.token.store');

    Route::middleware(['auth:sanctum', 'api.player'])->group(function () {
        Route::delete('auth/token', [AuthTokenController::class, 'destroy'])->name('auth.token.destroy');
        Route::get('me', MeController::class)->name('me');
        Route::get('cities', [CityController::class, 'index'])->name('cities.index');
        Route::get('cities/{cityId}', [CityController::class, 'show'])
            ->whereNumber('cityId')
            ->name('cities.show');
    });
});
