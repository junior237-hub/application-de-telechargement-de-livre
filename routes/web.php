<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('template', function () {
//     return view('page/template');
// });

// Route::get('index', function () {
//     return view('page/index');
// });

// Route::get('Aindex', function () {
//     return view('admin/Aindex');
// });
// // Route::get('save', function () {
// //     return view('admin/savepdf');
// // });

// Route::get('test', function () {
//     return view('admin/test');
// });


Route::get('/dashboard', [App\Http\Controllers\AdminController::class,'dashboard'])->name('dashboard');
Route::get('/index', [App\Http\Controllers\AdminController::class,'index'])->name('register_pdf');
Route::post('/storepdf', [App\Http\Controllers\AdminController::class,'store'])->name('store_pdf');
// Route::get('/user_page', [App\Http\Controllers\AdminController::class,'user_page'])->name('user_page');
Route::delete('/livre/{pdf}',[App\Http\Controllers\AdminController::class, 'delete'])->name('delete_pdf');

Route::get('/user_page', [App\Http\Controllers\userController::class,'user_page'])->name('user_page');
// Route::get('/recherche', [App\Http\Controllers\userController::class,'recherche'])->name('recherche_pdf');
Route::get('/show/{pdf}', [App\Http\Controllers\userController::class, 'show'])->name('show_pdf');
Route::get('/download/{pdf}', [App\Http\Controllers\UserController::class, 'download'])->name('download_file');

Route::get('/categorie', [App\Http\Controllers\AdminController::class,'categorie'])->name('categorie');
Route::post('/storecategorie', [App\Http\Controllers\AdminController::class,'store_categorie'])->name('store_categorie');
