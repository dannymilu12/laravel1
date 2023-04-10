<?php

use App\Http\Controllers\Dashboard\postController;
use App\Http\Controllers\Dashboard\CategoryController;
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

// parametros en rutas (? = Opcional)

// Route::get('/test/{id?}/{name?}',function($id = 10, $name='DC'){  // ? = opcional
//     echo $id;    
//     echo $name;
// });

// Rutas Agrupadas Consultar no funciono en video

// Route::controller(PostController::class)->group(function(){
//     Route::get('post', 'index')->name("post.index");
//     Route::get('post/{post}', 'show')->name("post.show");
//     Route::get('post/create', 'create')->name("post.create");
//     Route::get('post/{post}/edit', 'edit')->name("post.edit");
//     Route::post('post', 'store')->name("post.store");
//     Route::put('post/{post}', 'update')->name("post.update");
//     Route::delete('post/{post}', 'delete')->name("post.destroy");
// });

 // Agrupacion de middleware
//  Route::middleware([App\Http\Middleware\TestMiddleware::class])->group(function(){
//     Route::get('/test/{id?}/{name?}',function($id=10,$name= 'DC'){
//             echo $id;
//             echo $name;
//         });
// });

// agrupacion grupo de rutas, mas utilizada.
// route::group(['prefix' => 'dashboard'],function(){
//     Route::resource('post', postController::class);
//     Route::resource('category', CategoryController::class);
// });

// agrupacion de rutas tipo recurso

route::group(['prefix' => 'dashboard'],function(){    
    Route::resources([
        'post' => postController::class,
        'category' => CategoryController::class,
    ]);  
});  


// ruta tipo recurso
//Route::resource('post', postController::class);

// Metodo  de controlador post controller, si no se utiliza la ruta tipo recurso

// Route::get('post', [postController::class,'index']);
// Route::get('post/{post}', [postController::class,'show']);
// Route::get('post/create', [postController::class,'create']);
// Route::get('post/{post}/edit', [postController::class,'edit']);

// Route::post('post', [postController::class,'store']);
// Route::put('post/{post}', [postController::class,'update']);
// Route::delete('post/{post}', [postController::class,'delete']);

// ruta para administracion de las categorias
//Route::resource('category', CategoryController::class);




