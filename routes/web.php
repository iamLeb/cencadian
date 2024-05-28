<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ReferenceCheckController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/secure', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('profile', [HomeController::class, 'updateCompany'])->name('company.update');
Route::post('profile/update', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('update.profile');

Route::group(['prefix' => '/secure'], function () {
    // Interns
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('update.profile');
    Route::post('/application', [App\Http\Controllers\ApplicationController::class, 'store'])->name('application.store');
    Route::post('/emergency/contact', [App\Http\Controllers\HiredInternController::class, 'storeEmergencyContact'])->name('emergency.contact.store');
});
Route::group(['prefix' => '/intern'], function () {
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
    Route::post('interns/delete/{id}', [AdminController::class, 'internDelete'])->name('admin.intern.delete');
    Route::get('company/{id}', [AdminController::class, 'companyShow'])->name('admin.company.show');
    Route::get('companies', [AdminController::class, 'companies'])->name('admin.companies');
    Route::get('interns/reference/{id}', [AdminController::class, 'referenceCheckShow'])->name('reference.check.show');
    Route::get('/admin/template/interview', [App\Http\Controllers\TemplateController::class, 'interview'])->name('admin.template.interview');
    Route::post('/referencecheck', [ReferenceCheckController::class, 'store'])->name('referencecheck.store');

    Route::get('/form/{id}', [PdfController::class, 'showForm'])->name('admin.intern.offer');
    Route::post('/generate-pdf', [PdfController::class, 'generatePdf'])->name('admin.intern.pdf');

    Route::get('/admin/interns/interview/{applicationId}/{interviewerId}', [AdminController::class, 'showInterviewNotes'])->name('show.interview.notes');
    Route::post('/admin/interns/interview/{applicationId}/{interviewerId}', [AdminController::class, 'saveInterviewNotes'])->name('save.interview.notes');
});

Route::group(['prefix' => 'company'], function () {
    Route::get('', [ServiceRequestController::class, 'index'])->name('company.home');
    Route::get('create', [ServiceRequestController::class, 'create'])->name('company.create');
    Route::post('store', [ServiceRequestController::class, 'store'])->name('company.store');
    Route::post('contact/store', [ContactController::class, 'updateContact'])->name('company.contact.store');
});

//Reference check
Route::get('/reference-questionnaire/{otp}', [ReferenceCheckController::class, 'referenceQuestionniareShow'])->name('reference.questionnaire.show');
Route::post('/reference-questionnaire/{otp}', [ReferenceCheckController::class, 'referenceQuestionnaireSave'])->name('reference.questionnaire.save');

