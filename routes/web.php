<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchUnitController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DutyStationController;
use App\Http\Controllers\EmployeeDetailsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;



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

Route::get('register', [UserController::class, 'create'])->name('register');
Route::post('register', [UserController::class, 'store']);
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/profile', [EmployeeDetailsController::class, 'show'])->name('profile')->middleware('auth');

Route::resource('users', UserController::class);
Route::resource('branch-units', BranchUnitController::class);
Route::resource('contract-types', ContractTypeController::class);
Route::resource('divisions', DivisionController::class);
Route::resource('duty-stations', DutyStationController::class);
Route::resource('employee-details', EmployeeDetailsController::class);

