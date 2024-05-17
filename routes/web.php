<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ReferenceCheckController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::group(['middleware' => ['isAdmin'],'prefix' => '/secure'], function () {
    // Interns
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('update.profile');
    Route::post('/application', [App\Http\Controllers\ApplicationController::class, 'store'])->name('application.store');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/interns', [AdminController::class, 'interns'])->name('admin.interns');
Route::get('/admin/interns/{id}', [AdminController::class, 'internShow'])->name('admin.intern.show');
Route::get('/admin/company/{id}', [AdminController::class, 'companyShow'])->name('admin.company.show');
Route::get('/admin/companies', [AdminController::class, 'companies'])->name('admin.companies');
Route::get('/admin/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/admin/profile/update', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('update.profile');
Route::get('/admin/interns/reference/{id}', [App\Http\Controllers\AdminController::class, 'referenceCheckShow'])->name('reference.check.show');

//Templates
Route::get('/admin/template/interview', [App\Http\Controllers\TemplateController::class, 'interview'])->name('admin.template.interview');


Route::get('/company', [ServiceRequestController::class, 'index'])->name('company.home');
Route::get('/company/create', [ServiceRequestController::class, 'create'])->name('company.create');
Route::post('/company/store', [ServiceRequestController::class, 'store'])->name('company.store');

//Reference check
Route::post('/referencecheck', [ReferenceCheckController::class, 'store'])->name('referencecheck.store');
