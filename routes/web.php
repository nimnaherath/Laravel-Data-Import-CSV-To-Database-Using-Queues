<?php

use App\Http\Controllers\UploadDataController;
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

Route::get('/',[UploadDataController::class,'index'])
    ->name("home");

Route::post("/upload",[UploadDataController::class,'upload'])
    ->name('upload');


Route::get('/batch', [UploadDataController::class, 'batch'])
    ->name("view.batch");

Route::get("/view-process",[UploadDataController::class,'viewProcess'])
    ->name("view.process");
