<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HoursController;
use App\Http\Controllers\SumController;

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
    return view('welcome');
})->name('welcome');;

Route::get('/employee', function () {
    return view('employee');
})->name('employee');

Route::get('/hours', function () {
    return view('hours');
})->name('hours');

Route::get('/hours/vvod', function () {
    return view('hoursv');
})->name('hoursv');

Route::get('/sum', function () {
    return view('sum');
})->name('sum');

Route::post('/employees', [EmployeeController::class, 'create']);
Route::post('/login', [EmployeeController::class, 'login'])->name('login');

Route::post('/submit-hours', [HoursController::class, 'submitHours']);

Route::get('/generate-report', [SumController::class, 'generateReport']);
Route::get('/pay-all-hours', [SumController::class, 'payAllHours'])->name('pay-all-hours');







