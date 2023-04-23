<?php

use Illuminate\Support\Facades\Route;

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
});

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*Route::get('/docdashboard', function () {
        return view('docdashboard');
    })->name('docdashboard');
    Route::get('/admindashboard', function () {
        return view('admindashboard');
    })->name('admindashboard');*/


    Route::get('/patientappointment', function () {
        return view('patientappointment');
    })->name('patientappointment');
    Route::get('/doctorspatient', function () {
        return view('doctorspatient');
    })->name('doctorspatient');
    Route::get('/editprofilepassword', function () {
        return view('editprofilepassword');
    })->name('editprofilepassword');

    
    Route::get('/patientappointmentstatus', [\App\Http\Controllers\PatientAppointmentStatusController::class, 'pdrlist'])->name('patientappointmentstatus');
    Route::get('/doctorspatientappointment', [\App\Http\Controllers\DoctorAppointmentStatusController::class, 'doctorsappststus'])->name('doctorspatientappointment');
    Route::get('/reschedule/{id}', [\App\Http\Controllers\RescheduleController::class, 'doctorsappststus'])->name('reschedule');
    Route::post('reschedule/{id}', [\App\Http\Controllers\RescheduleController::class, 'resched'])->name('reschedule.resched');
    Route::get('/patientreschedule/{id}', [\App\Http\Controllers\PatientRescheduleController::class, 'doctorsappststus'])->name('patientreschedule');
    Route::post('patientreschedule/{id}', [\App\Http\Controllers\PatientRescheduleController::class, 'resched'])->name('patientreschedule.resched');
    Route::get('/approved/{pid}/{id}', [\App\Http\Controllers\ApprovedPatientController::class, 'approved'])->name('approved');
    Route::get('/cancel/{pid}/{id}', [\App\Http\Controllers\CancelController::class, 'cancel'])->name('cancel');
    Route::get('/doctorsappointment', [\App\Http\Controllers\DoctorAppointmentController::class, 'drplist'])->name('doctorsappointment');

    Route::get('/upload', [\App\Http\Controllers\ImageUploadController::class, 'create'])->name('upload');
    Route::post('upload', [\App\Http\Controllers\ImageUploadController::class, 'store'])->name('upload.store');

    //
    Route::get('/appointmentstatus/{id}', [\App\Http\Controllers\PatientCheckupStatusController::class, 'checkupstatus'])->name('appointmentstatus');
    Route::get('/patientnoshow/{id}', [\App\Http\Controllers\PatientCheckupStatusController::class, 'checkupnoshow'])->name('patientnoshow');
    Route::get('/doctorspatientslist', [\App\Http\Controllers\PatientListController::class, 'drplist'])->name('doctorspatientslist');
    Route::view('editprofile', 'editprofile')->name('editprofile');
    Route::put('editprofile', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('editprofile.update');
    Route::view('editpassword', 'editpassword')->name('editpassword');
    Route::put('editpassword', [\App\Http\Controllers\EditPasswordController::class, 'update'])
        ->name('editpassword.update');
    //Route::view('addpatientappointment', 'addpatientappointment')->name('addpatientappointment');
    Route::get('/addpatientappointment', [\App\Http\Controllers\AddPatientAppointmentController::class, 'index'])->name('addpatientappointment');
    Route::put('addpatientappointment', [\App\Http\Controllers\AddPatientAppointmentController::class, 'doctorpatientlist'])
        ->name('addpatientappointment.doctorpatientlist');
    Route::get('/scheduleappointment', [\App\Http\Controllers\ScheduleAppointmentController::class, 'doclist'])
        ->name('scheduleappointment.doclist');
    Route::get('/adddoctorslist', [\App\Http\Controllers\AddDoctorController::class, 'index'])->name('adddoctorslist');
    Route::put('adddoctorslist', [\App\Http\Controllers\AddDoctorController::class, 'adddoctor'])
        ->name('adddoctorslist.adddoctor');
    Route::view('adddepartment', 'adddepartment')->name('adddepartment');
    Route::put('adddepartment', [\App\Http\Controllers\DepartmentController::class, 'adddept'])
        ->name('adddepartment.adddept');
    Route::view('docprofile', 'docprofile')->name('docprofile');
    Route::put('docprofile', [\App\Http\Controllers\DocProfileController::class, 'docprofile'])
        ->name('docprofile.update');
    Route::get('/doctorschedule/{id}', [\App\Http\Controllers\docscheduleController::class, 'docsched'])->name('doctorschedule');
    Route::post('doctorschedule/{id}', [\App\Http\Controllers\docscheduleController::class, 'bookpatient'])->name('doctorschedule.bookpatient');

   


    
   
});

require __DIR__.'/auth.php';