<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebApiController;
use App\Http\Controllers\S3Controller;
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

Route::post('sqs', [\App\Http\Controllers\WebApiController::class, 'sendSqs'])->name('sqs');

Route::view('upload', 'upload');
Route::post('s3', [\App\Http\Controllers\S3Controller::class, 'uploadS3'])->name('s3');

Route::post('job', [\App\Http\Controllers\WebApiController::class, 'job'])->name('job');