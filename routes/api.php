<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Articals\AllArticalController;
use App\Http\Controllers\Articals\UserArticalController;

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

  // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //     return $request->user();
  // });


  // Authentication 
Route::controller(AuthController::class)->group(function() { 
   Route::post('/register' , 'register')  ;
   Route::post('/login' , 'login')  ; 
   Route::post('/logout' , 'logout')->middleware('auth:sanctum');
});

Route::controller(AllArticalController::class)->group(function() {
   Route::get('/' , 'index' );
   Route::get('/search' , 'search');
}) ;

  //  Articals Without Authentication  


  // Articals With Authentication 
Route::middleware('auth:sanctum')->controller(UserArticalController::class)->group(function() {
   Route::post('/create' , 'store' ) ; 
   Route::post('/update/{artical}' , 'update') ;
   Route::post('/delete/{artical}' , 'destroy') ;
  //  Route::apiResource('article',UserArticalController::class);    route apiResource
}); 