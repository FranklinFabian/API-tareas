<?php

use App\Http\Controllers\TareaController;
use App\Http\Controllers\UserController;
use App\Models\Tarea;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//   return $request->user();
//  });
//Route::get('/users/{user}', [UserController::class, 'show']);


Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'authenticate']);


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', [UserController::class,'getAuthenticatedUser']);
    Route::get('tareas', [TareaController::class,'index']);
    //Route::get('tareas/{tarea}', [TareaController::class,'show']);
    Route::post('tareas', [TareaController::class,'store']);
    Route::put('tareas/{tarea}', [TareaController::class,'update']);
    Route::put('tareas/check/{tarea}', [TareaController::class,'check']);
    Route::delete('tareas/{tarea}', [TareaController::class,'delete']);
});
