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

Route::get('/',[UploadDataController::class,'index']);

Route::post("/upload",[UploadDataController::class,'upload'])
    ->name('upload');
