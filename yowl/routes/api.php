<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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
    Route::get('/user', function (Request $request){
        return $request->user();
    });

    Route::apiResource('posts', PostController::class);
});



Route::get('/users', [UserController::class, 'showUsers']);
Route::get('/users/{id}', [UserController::class, 'showUser']);
//Route::get('/users/{id', [PostController::class, 'showUserPosts']);
Route::post('/users', [UserController::class, 'addUser']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);

Route::get('/posts', [PostController::class, 'showPosts']);
Route::get('/posts/user/{id}', [PostController::class, 'index']);

Route::get('/comments', [CommentController::class, 'getComments']);
Route::post('/comments', [CommentController::class, 'addComment']);

Route::get('/categories', [CategoriesController::class, 'showCategories']);