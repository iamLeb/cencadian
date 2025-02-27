<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ReferenceCheckController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TimesheetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/secure', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('profile', [HomeController::class, 'updateCompany'])->name('company.update');
Route::post('profile/update', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('update.profile');
Route::get('/my-documents', [DocumentController::class, 'showMyDocuments'])->name('my.documents');
Route::post('change-password', [HomeController::class, 'changePassword'])->name('change.password');

Route::group(['prefix' => '/secure'], function () {
    // Interns
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('update.profile');
    Route::post('/application', [App\Http\Controllers\ApplicationController::class, 'store'])->name('application.store');
    //Clock in-out
    Route::get('/clock-system', [App\Http\Controllers\ClockInOutController::class, 'index'])->name('clock.index');
    Route::get('/clock-stop', [App\Http\Controllers\ClockInOutController::class, 'snooze'])->name('clock.snooze.toggle');
    Route::get('/clockin', [App\Http\Controllers\ClockInOutController::class, 'clockIn'])->name('clock.in');
    Route::get('/clockout', [App\Http\Controllers\ClockInOutController::class, 'clockOut'])->name('clock.out');
});

Route::group(['prefix' => '/intern'], function () {
    // Interns
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('update.profile');
    Route::post('/application', [App\Http\Controllers\ApplicationController::class, 'store'])->name('application.store');
    Route::post('/application/update/{id}', [App\Http\Controllers\ApplicationController::class, 'update'])->name('application.update');
    Route::post('/emergency/contact', [App\Http\Controllers\HiredInternController::class, 'storeEmergencyContact'])->name('emergency.contact.store');
    Route::get('/my-pay', [TimesheetController::class, 'showMyPay'])->name('show.my.pay');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('create', [AdminController::class, 'createAdmin'])->name('admin.createAdmin');
    Route::post('store', [AdminController::class, 'storeAdmin'])->name('admin.storeAdmin');
    Route::post('delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');
    Route::get('interns', [AdminController::class, 'interns'])->name('admin.interns');
    Route::get('interns/{id}', [AdminController::class, 'internShow'])->name('admin.intern.show');
    Route::get('interns/{id}/generate-pay-stub', [TimesheetController::class, 'showGeneratePayStub'])->name('show.generate.pay.stub');
    Route::get('interns/{id}/review-timesheet', [TimesheetController::class, 'reviewTimesheet'])->name('review.timesheet');
    Route::get('interns/edit-clock-entry/{id}', [TimesheetController::class, 'showEditClockEntry'])->name('show.edit.clock.entry');
    Route::post('interns/edit-clock-entry/{id}', [TimesheetController::class, 'editClockEntry'])->name('edit.clock.entry');
    Route::get('interns/delete-clock-entry/{id}', [TimesheetController::class, 'deleteClockEntry'])->name('delete.clock.entry');
    Route::get('interns/{id}/create-clock-entry', [TimesheetController::class, 'showCreateClockEntry'])->name('show.create.clock.entry');
    Route::post('interns/{id}/create-clock-entry', [TimesheetController::class, 'createClockEntry'])->name('create.clock.entry');
    Route::post('interns/{id}/generate-pay-stub', [TimesheetController::class, 'showGeneratePayStub'])->name('show.generate.pay.stub');
    Route::post('interns/{id}/submit-pay-stub', [TimesheetController::class, 'submitPayStub'])->name('submit.pay.stub');
    Route::Get('interns/{id}/pay-stubs', [TimesheetController::class, 'showPayStubs'])->name('show.pay.stubs');
    Route::post('interns/hire/{id}', [AdminController::class, 'internHire'])->name('admin.intern.hire');
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

    Route::get('/hired/interns/', [App\Http\Controllers\AdminController::class, 'hiredInterns'])->name('admin.hired.interns');
    Route::get('add-employee-documents', [DocumentController::class, 'showAddEmployeeDocuments'])->name('show.add.employee.documents');
    Route::post('add-employee-documents', [DocumentController::class, 'createDocument'])->name('create.document');
    Route::get('manage-document/{id}', [DocumentController::class, 'showManageDocument'])->name('manage.document');
    Route::post('/update-document/{id}', [DocumentController::class, 'updateDocumentAccess'])->name('update.document');
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

