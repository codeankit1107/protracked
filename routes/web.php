<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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


Route::match(['get','post'],'/',[AdminViewController::Class,'adminLogin'])->name('adminLogin');

Route::get('admin/logout', [AdminViewController::Class,'logout'])->name('adminLogout');



Route::get('/home', [AdminViewController::class, 'home'])->name('home');


Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);





