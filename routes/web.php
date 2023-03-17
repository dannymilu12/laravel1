<?php

use App\Http\Controllers\Dashboard\postController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',function(){
    return view('welcome'); 
});

// ruta tipo recurso
Route::resource('post', postController::class);

// Metodo  de controlador post controller, si no se utiliza la ruta tipo recurso

// Route::get('post', [postController::class,'index']);
// Route::get('post/{post}', [postController::class,'show']);
// Route::get('post/create', [postController::class,'create']);
// Route::get('post/{post}/edit', [postController::class,'edit']);

// Route::post('post', [postController::class,'store']);
// Route::put('post/{post}', [postController::class,'update']);
// Route::delete('post/{post}', [postController::class,'delete']);



