<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,"index"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("/redirect",[HomeController::class,"redirect"])->name("redirect");
Route::get("/view_category",[AdminController::class,"viewCategory"])->name("view.category");
Route::post("/add_category",[AdminController::class,"addCategory"])->name("add.category");
Route::get("/delete_category/{id}",[AdminController::class,"deleteCategory"])->name("delete.category");
Route::get("/view_product",[AdminController::class,"viewProduct"])->name("view.product");