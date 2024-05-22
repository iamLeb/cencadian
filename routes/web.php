<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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
Route::get('/admin/create', [AdminController::class, 'createAdmin'])->name('admin.createAdmin');
Route::post('/admin/store', [AdminController::class, 'storeAdmin'])->name('admin.storeAdmin');
Route::post('/admin/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');
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
Route::post('/company/contact/store', [ContactController::class, 'updateContact'])->name('company.contact.store');
Route::post('/company/profile', [HomeController::class, 'updateCompany'])->name('company.update');


//Reference check
Route::get('/reference-questionnaire/{otp}', [ReferenceCheckController::class, 'referenceQuestionniareShow'])->name('reference.questionnaire.show');
Route::post('/reference-questionnaire/{otp}', [ReferenceCheckController::class, 'referenceQuestionnaireSave'])->name('reference.questionnaire.save');
Route::post('/referencecheck', [ReferenceCheckController::class, 'store'])->name('referencecheck.store');

