<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
    return response()->redirectTo('/login');
});
Route::get('api/auth', [LoginController::class, 'auth']);
Route::any('/login', function (){
    if(Auth::check()) {
        return response()->redirectTo('/home');
    }
    return view('authorize');
});
Route::post('/api/login', [LoginController::class, 'login']);

Route::any('{any?}/{any2?}/{any3?}', function (){
    return view('crm');
});
