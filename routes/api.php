<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VendorController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public API Routes - No Authentication Required
Route::prefix('v1')->group(function () {
    // Vendor Routes - IMPORTANT: Specific routes BEFORE generic {id} route!
    Route::get('vendors', [VendorController::class, 'index']);
    Route::get('vendors/featured', [VendorController::class, 'featured']);
    Route::get('vendors/city/{city}', [VendorController::class, 'getByCity']);
    Route::get('vendors/category/{categoryId}', [VendorController::class, 'getByCategory']);
    Route::get('vendors/{id}', [VendorController::class, 'show']);

    // Search Route
    Route::get('search', [VendorController::class, 'search']);

    // Category Routes
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{id}', [CategoryController::class, 'show']);
});

// Admin Routes - Public (No Auth for now)
Route::prefix('v1/admin')->group(function () {
    // Vendor Admin Routes
    Route::post('vendors', [VendorController::class, 'store']);
    Route::put('vendors/{id}', [VendorController::class, 'update']);
    Route::delete('vendors/{id}', [VendorController::class, 'destroy']);

    // Category Admin Routes
    Route::post('categories', [CategoryController::class, 'store']);
    Route::put('categories/{id}', [CategoryController::class, 'update']);
    Route::delete('categories/{id}', [CategoryController::class, 'destroy']);
});

// Auth route (for future use)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
