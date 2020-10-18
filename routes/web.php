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

//Route::get('/', function () {
//    return view('home');
//});

//Route::get('/hello1', function () {
//    return view('hello1');
//});
//
//Route::get('/hello2', function () {
//    return view('hello2');
//});

// Route::post('/save', function () {
//     echo "hello";
// });

// Route::post('/save/dfsd/sdfsdf/sdfsf/sd', function () {
//     echo "hello get";
// })->name("save");
//Route::redirect('/here', '/');
//
//
//Route::get('user/{id?}', function ($id = null){
//   return 'User '.$id;
//});
//
//Route::get('user/{id}/post/{post}', function ($id, $idPost){
//    return "hello $id nam $idPost";
//});
//
//Route::get('nam-hihi-haha-huhu', function (){
//    return view('welcome');
//})->name('nam');
//
//Route::get('u', function (){
//    echo route("nam");
//});
//Route::get('hia', function (){
//    echo route("nam");
//});
//cach 1 group
//Route::prefix('admin')->group(function () {
//    Route::prefix('user')->group(function (){
//        Route::get('nguoidung', function (){
//            echo "sdhfsjdnf";
//        });
//        Route::get('nam', function (){
//            echo "nam dep trai";
//        });
//        Route::get('hihi', function (){
//            echo "sdhfsjfgfgsfgsfdnf";
//        });
//    });
//});
//cach 2 group
//Route::group([
//    'prefix' => 'admin'
//], function (){
//    Route::get('nguoidung', function (){
//        echo "sdhfsjdnf";
//    });
//    Route::get('nam', function (){
//        echo "nam dep trai";
//    });
//    Route::get('hihi', function (){
//        echo "sdhfsjfgfgsfgsfdnf";
//    });
//});



//Route::get('/tasks/complete/3', function (){
//    echo "Hoàn thành làm bài tập.";
//})->name('todo.tasks.complete');
//
//Route::get('/tasks/reset/3', function (){
//    echo "Làm lại project laravel.";
//})->name('todo.tasks.reset');



//Route::prefix('task')->group(function () {
//    Route::get('complete/3', function (){
//        echo "Hoàn thành làm bài tập.";
//    })->name('todo.tasks.complete');
//    Route::get('reset/3', function (){
//        echo "Làm lại project laravel.";
//    })->name('todo.tasks.reset');
//});


//Route::get('thongtincanhan', function (){
//    $hoten = "Lò Tuấn Nam";
//    $namsinh = "2001";
//    $truonghoc = "Học viện nông nghiệp Việt Nam";
//    $gioithieu = '<span class="text-success">Đẹp trai kinh khủng khiêp</span>';
//    $que = "Sơn La";
//    $muctieu = 'Làm việc về web';
//    return view('profile',[
//        'hoten' => $hoten,
//        'namsinh' => $namsinh,
//        'truonghoc' => $truonghoc,
//        'gioithieu' => $gioithieu,
//        'que' => $que,
//        'muctieu' => $muctieu
//    ]);
//});

//Route::get('danhsach', function (){
//    $list = [
//        [
//            'name' => 'Học View trong Laravel',
//            'status' => 0
//        ],
//        [
//            'name' => 'Học Route trong Laravel',
//            'status' => 1
//        ],
//        [
//            'name' => 'Làm bài tập View trong Laravel',
//            'status' => -1
//        ]
//    ];
//    return view('list',[
//        'list' => $list
//    ]);
//});
//use App\Http\Controllers\HomeController;
//
//Route::get('/',
//    [HomeController::class, 'index']
//);

//Route::prefix('task')->group(function () {
//    Route::get('edit',[\App\Http\Controllers\Task\TaskController::class,'edit'])->name('task.edit');
//    Route::get('create', [\App\Http\Controllers\Task\TaskController::class, 'create'])->name('task.create');
//    Route::get('list', [\App\Http\Controllers\Task\TaskController::class, 'index'])->name('task.list');
//});

//Route::prefix('frontend')->group(function () {
//    Route::get('edit',[\App\Http\Controllers\Task\TaskController::class,'edit']);
//    Route::get('create', [App\Http\Controllers\Task\TaskController::class, 'create']);
//    Route::get('list', [\App\Http\Controllers\Task\TaskController::class, 'index']);
//});

//Route::resource('frontend/task', App\Http\Controllers\Frontend\TaskController::class);

//Route::get('frontend/task/complete/{id?}', [App\Http\Controllers\Frontend\TaskController::class, 'complete'])->name('task.complete');
//Route::get('frontend/task/recomplete/{id?}', [App\Http\Controllers\Frontend\TaskController::class, 'reComplete'])->name('task.recomplete');

//Route::get('frontend/task', [\App\Http\Controllers\Frontend\TaskController::class, 'index'])->name('tasks.list');


Route::prefix('task')->group(function () {
    Route::get('/',[\App\Http\Controllers\Frontend\TaskController::class,'index'])->name('task.list');
    Route::post('/', [\App\Http\Controllers\Frontend\TaskController::class, 'store'])->name('task.store');
    Route::get('complete/{id}', [\App\Http\Controllers\Frontend\TaskController::class, 'complete'])->name('task.complete');
    Route::delete('delete/{id}', [\App\Http\Controllers\Frontend\TaskController::class, 'destroy'])->name('task.delete');
});










