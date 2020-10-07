<?php

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

Route::get('/', function () {
    return view('home');
});

// Route::post('/save', function () {
//     echo "hello";
// });

 Route::post('/save/dfsd/sdfsdf/sdfsf/sd', function () {
     echo "hello get";
 })->name("save");
Route::redirect('/here', '/');


Route::get('user/{id?}', function ($id = null){
   return 'User '.$id;
});

Route::get('user/{id}/post/{post}', function ($id, $idPost){
    return "hello $id nam $idPost";
});

Route::get('nam-hihi-haha-huhu', function (){
    return view('welcome');
})->name('nam');

Route::get('u', function (){
    echo route("nam");
});
Route::get('hia', function (){
    echo route("nam");
});
//cach 1 group
Route::prefix('admin')->group(function () {
    Route::prefix('user')->group(function (){
        Route::get('nguoidung', function (){
            echo "sdhfsjdnf";
        });
        Route::get('nam', function (){
            echo "nam dep trai";
        });
        Route::get('hihi', function (){
            echo "sdhfsjfgfgsfgsfdnf";
        });
    });
});
//cach 2 group
Route::group([
    'prefix' => 'admin'
], function (){
    Route::get('nguoidung', function (){
        echo "sdhfsjdnf";
    });
    Route::get('nam', function (){
        echo "nam dep trai";
    });
    Route::get('hihi', function (){
        echo "sdhfsjfgfgsfgsfdnf";
    });
});



//Route::get('/task/complete/3', function (){
//    echo "Hoàn thành làm bài tập.";
//})->name('todo.task.complete');
//
//Route::get('/task/reset/3', function (){
//    echo "Làm lại project laravel.";
//})->name('todo.task.reset');



Route::prefix('task')->group(function () {
    Route::get('complete/3', function (){
        echo "Hoàn thành làm bài tập.";
    })->name('todo.task.complete');
    Route::get('reset/3', function (){
        echo "Làm lại project laravel.";
    })->name('todo.task.reset');
});
