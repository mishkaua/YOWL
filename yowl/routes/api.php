<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/* Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                
                ->name('login'); */
/* Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
}); */
/* Route::post('/login', function(Request $request) {
    return response()->json($request);
}); */

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('user', function (Request $request){
        return $request->user();
  });  
});