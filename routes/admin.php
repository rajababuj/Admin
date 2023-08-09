<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{Authcontroller, Profilecontroller, Usercontroller,};
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\Admin\ProductController;



Route::get('/', function () {
  return view('welcome');
});


Route::get('/login', [AuthController::class, 'getLogin'])->name('admin.login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('admin.login.submit');



Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
  
  Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('admin.dashboard');
  Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
  Route::get('/logout', [ProfileController::class, 'logout'])->name('admin.logout');
  Route::get('/change-password', [ProfileController::class, 'change_password'])->name('change_password');
  Route::post('/update-password', [ProfileController::class, 'update_password'])->name('update_password');

  Route::get('training', [TrainingController::class, 'index'])->name('training.index');
  Route::post('training', [TrainingController::class, 'store'])->name('training.store');
  Route::get('training/edit/{id}', [TrainingController::class, 'edit'])->name('training.edit');
  Route::post('training/update', [TrainingController::class, 'update'])->name('training.update');
  Route::delete('training/destroy/{id}', [TrainingController::class, 'destroy'])->name('training.destroy');
  Route::post('/traning-status-update', 'TrainingController@status_update')->name('training.status.update');

  Route::get('/membership', [MembershipController::class, 'index'])->name('membership.index');
  Route::post('/membership', [MembershipController::class, 'store'])->name('membership.store');
  Route::get('membership/edit/{id}', [MembershipController::class, 'edit'])->name('membership.edit');
  Route::post('membership/update', [MembershipController::class, 'update'])->name('membership.update');
  Route::delete('membership/destroy/{id}', [MembershipController::class, 'destroy'])->name('membership.destroy');
  Route::post('/status-update', 'MembershipController@status_update')->name('membership.status.update');

  Route::get('trainer', [TrainerController::class, 'index'])->name('trainer.index');
  Route::post('trainer', [TrainerController::class, 'store'])->name('trainer.store');
  Route::get('trainer/edit/{id}', [TrainerController::class, 'edit'])->name('trainer.edit');
  Route::post('/trainer/update', [TrainerController::class, 'update'])->name('trainer.update');
  Route::delete('trainer/destroy/{id}', [TrainerController::class, 'destroy'])->name('trainer.destroy');
  Route::post('/trainer-status-update', 'TrainerController@status_update')->name('trainer.status.update');

  Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
  Route::post('customer', [CustomerController::class, 'store'])->name('customer.store');
  Route::get('customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
  Route::post('/customer/update', [CustomerController::class, 'update'])->name('customer.update');
  Route::delete('customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
  Route::post('/customer-status-update', 'CustomerController@status_update')->name('customer.status.update');

  Route::get('worker', [WorkerController::class, 'index'])->name('worker.index');
  Route::post('worker', [WorkerController::class, 'store'])->name('worker.store');

  Route::get('product', [productController::class, 'index'])->name('product.index');
  Route::post('product', [ProductController::class, 'store'])->name('product.store');
  Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
  Route::post('/product/update', [ProductController::class, 'update'])->name('product.update');
  Route::delete('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
  Route::post('/product-status-update', 'ProductController@status_update')->name('product.status.update');


});


