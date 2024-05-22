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

Route::get('/secure', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/secure'], function () {
    // Interns
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('update.profile');
    Route::post('/application', [App\Http\Controllers\ApplicationController::class, 'store'])->name('application.store');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('create', [AdminController::class, 'createAdmin'])->name('admin.createAdmin');
    Route::post('store', [AdminController::class, 'storeAdmin'])->name('admin.storeAdmin');
    Route::post('delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');
    Route::get('interns', [AdminController::class, 'interns'])->name('admin.interns');
    Route::get('interns/{id}', [AdminController::class, 'internShow'])->name('admin.intern.show');
    Route::get('company/{id}', [AdminController::class, 'companyShow'])->name('admin.company.show');
    Route::get('companies', [AdminController::class, 'companies'])->name('admin.companies');
    Route::post('profile/update', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('update.profile');
    Route::get('interns/reference/{id}', [App\Http\Controllers\AdminController::class, 'referenceCheckShow'])->name('reference.check.show');
    Route::get('/admin/template/interview', [App\Http\Controllers\TemplateController::class, 'interview'])->name('admin.template.interview');
});

Route::group(['prefix' => 'company'], function () {
    Route::get('', [ServiceRequestController::class, 'index'])->name('company.home');
    Route::get('create', [ServiceRequestController::class, 'create'])->name('company.create');
    Route::post('store', [ServiceRequestController::class, 'store'])->name('company.store');
    Route::post('contact/store', [ContactController::class, 'updateContact'])->name('company.contact.store');
    Route::post('profile', [HomeController::class, 'updateCompany'])->name('company.update');
});

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

//Reference check
Route::get('/reference-questionnaire/{otp}', [ReferenceCheckController::class, 'referenceQuestionniareShow'])->name('reference.questionnaire.show');
Route::post('/reference-questionnaire/{otp}', [ReferenceCheckController::class, 'referenceQuestionnaireSave'])->name('reference.questionnaire.save');
Route::post('/referencecheck', [ReferenceCheckController::class, 'store'])->name('referencecheck.store');

