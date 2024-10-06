<?php

use Telegram\Bot\Api;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TelegramController;

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

Route::post('/telegram-webhook', [TelegramController::class, 'handle']);

Route::get('/test',function(){

    $telegram = new Api();
    $response = $telegram->getMe();

    dd($response);
});

Route::get('/upload-image', [ImageController::class, 'showForm']);
Route::post('/upload-image', [ImageController::class, 'upload']);