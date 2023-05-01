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
    Route::get('/patientappointment', function () {
        return view('patientappointment');
    })->name('patientappointment');
    Route::get('/doctorspatient', function () {
        return view('doctorspatient');
    })->name('doctorspatient');
    Route::get('/editprofilepassword', function () {
        return view('editprofilepassword');
    })->name('editprofilepassword');

    Route::get('/removeuser', function () {
        return view('removeuser');
    })->name('removeuser');

    
    Route::get('/patientappointmentstatus', [\App\Http\Controllers\PatientAppointmentStatusController::class, 'pdrlist'])->name('patientappointmentstatus');
    Route::get('/doctorspatientappointment', [\App\Http\Controllers\DoctorAppointmentStatusController::class, 'doctorsappststus'])->name('doctorspatientappointment');
    Route::get('/reschedule/{id}', [\App\Http\Controllers\RescheduleController::class, 'doctorsappststus'])->name('reschedule');
    Route::post('reschedule/{id}', [\App\Http\Controllers\RescheduleController::class, 'resched'])->name('reschedule.resched');
    Route::get('/patientreschedule/{id}', [\App\Http\Controllers\PatientRescheduleController::class, 'doctorsappststus'])->name('patientreschedule');
    Route::post('patientreschedule/{id}', [\App\Http\Controllers\PatientRescheduleController::class, 'resched'])->name('patientreschedule.resched');
    Route::get('cancelappointment/{id}', [\App\Http\Controllers\CancelAppointmentController::class, 'cancel'])->name('cancelappointment');
    Route::get('/approved/{pid}/{id}', [\App\Http\Controllers\ApprovedPatientController::class, 'approved'])->name('approved');
    Route::get('/cancel/{pid}/{id}', [\App\Http\Controllers\CancelController::class, 'cancel'])->name('cancel');
    Route::get('/doctorsappointment', [\App\Http\Controllers\DoctorAppointmentController::class, 'drplist'])->name('doctorsappointment');
    Route::get('/upload/{pid}/{did}', [\App\Http\Controllers\ImageUploadController::class, 'create'])->name('upload');
    Route::post('upload/{pid}/{did}', [\App\Http\Controllers\ImageUploadController::class, 'store'])->name('upload.store');
    Route::get('/patientsdiagnosis', [\App\Http\Controllers\PatientsDiagnosisController::class, 'create'])->name('patientsdiagnosis');
    Route::get('/appointmentstatus/{id}', [\App\Http\Controllers\PatientCheckupStatusController::class, 'checkupstatus'])->name('appointmentstatus');
    Route::get('/patientnoshow/{id}', [\App\Http\Controllers\PatientCheckupStatusController::class, 'checkupnoshow'])->name('patientnoshow');
    Route::get('/doctorspatientslist', [\App\Http\Controllers\PatientListController::class, 'drplist'])->name('doctorspatientslist');
    Route::get('/patientsresults', [\App\Http\Controllers\PatientsResultsController::class, 'patientlist'])->name('patientsresults');
    Route::view('editprofile', 'editprofile')->name('editprofile');
    Route::put('editprofile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('editprofile.update');
    Route::view('editpassword', 'editpassword')->name('editpassword');
    Route::put('editpassword', [\App\Http\Controllers\EditPasswordController::class, 'update'])->name('editpassword.update');
    //Route::view('addpatientappointment', 'addpatientappointment')->name('addpatientappointment');
    Route::get('/addpatientappointment', [\App\Http\Controllers\AddPatientAppointmentController::class, 'index'])->name('addpatientappointment');
    Route::put('addpatientappointment', [\App\Http\Controllers\AddPatientAppointmentController::class, 'doctorpatientlist'])->name('addpatientappointment.doctorpatientlist');
    Route::get('/scheduleappointment', [\App\Http\Controllers\ScheduleAppointmentController::class, 'doclist'])->name('scheduleappointment.doclist');
    Route::get('/adddoctorslist', [\App\Http\Controllers\AddDoctorController::class, 'index'])->name('adddoctorslist');
    Route::put('adddoctorslist', [\App\Http\Controllers\AddDoctorController::class, 'adddoctor'])->name('adddoctorslist.adddoctor');
    Route::view('adddepartment', 'adddepartment')->name('adddepartment');
    Route::put('adddepartment', [\App\Http\Controllers\DepartmentController::class, 'adddept'])->name('adddepartment.adddept');
    Route::view('docprofile', 'docprofile')->name('docprofile');
    Route::put('docprofile', [\App\Http\Controllers\DocProfileController::class, 'docprofile'])->name('docprofile.update');
    Route::get('/doctorschedule/{id}', [\App\Http\Controllers\docscheduleController::class, 'docsched'])->name('doctorschedule');
    Route::post('doctorschedule/{id}', [\App\Http\Controllers\docscheduleController::class, 'bookpatient'])->name('doctorschedule.bookpatient');
    Route::get('/download/{filename}', [\App\Http\Controllers\DownloadController::class, 'downloads'])->name('download.downloads');
    Route::get('/removepatients', [\App\Http\Controllers\RemovePatientsController::class, 'index'])->name('removepatients');
    Route::get('/removepatient/{id}', [\App\Http\Controllers\RemovePatientsController::class, 'remove'])->name('removepatients.remove');
    Route::get('/removedoctors', [\App\Http\Controllers\RemoveDoctorsController::class, 'index'])->name('removedoctors');
    Route::get('/removedoctor/{id}', [\App\Http\Controllers\RemoveDoctorsController::class, 'remove'])->name('removedoctors.remove');
    Route::get('/removedepartments', [\App\Http\Controllers\RemoveDepartmentsController::class, 'index'])->name('removedepartments');
    Route::get('/removedepartment/{id}', [\App\Http\Controllers\RemoveDepartmentsController::class, 'remove'])->name('removedepartments.remove');
    Route::get('/otp', [\App\Http\Controllers\AuthController::class, 'showOtpForm'])->name('show-otp-form');
    Route::get('/doctortoschedule/{did}/{pid}', [\App\Http\Controllers\DoctorsToScheduleController::class, 'docsched'])->name('doctortoschedule');
    Route::post('doctortoschedule/{did}/{pid}', [\App\Http\Controllers\DoctorsToScheduleController::class, 'bookpatient'])->name('doctortoschedule.bookpatient');
});

require __DIR__.'/auth.php';