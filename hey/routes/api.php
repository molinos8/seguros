<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/product', [BaseController::class, 'callActionModel']);
Route::post('/store', [BaseController::class, 'callActionModel']);
Route::post('/supplier', [BaseController::class, 'callActionModel']);
Route::post('/users', [BaseController::class, 'callActionModel']);
Route::post('/order', [BaseController::class, 'callActionModel']);