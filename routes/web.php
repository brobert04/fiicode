<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Auth\PatientRegistration;
use App\Http\Controllers\DoctorProfileController;
use App\Models\Doctor;
use App\Http\Controllers\DoctorSendInviteController;
use App\Http\Controllers\DoctorTransferPatientController;

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

Route::get('/', function () {
    return view('frontend.pages.index');
})->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// DASHBOARD UNIVERSAL BAZAT PE ROLUL CELUI CARE FACE REQUEST UL
Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// RUTE SPECIFICE DOCTORULUI
Route::group(['prefix' => 'doctor', 'middleware' => ['auth', 'verified', 'doctor']], function(){

    Route::get('/profile', [DoctorProfileController::class, 'index'])->name('doctor.profile');
    Route::post('/profile', [DoctorProfileController::class, 'update'])->name('doctor.profile.update');
    Route::put('/profile/password', [DoctorProfileController::class, 'resetPassword'])->name('doctor.profile.password');
    
    Route::get('/send-invite', [DoctorSendInviteController::class, 'sendInvite'])->name('doctor.send-invite');
    Route::post('/send-invite', [DoctorSendInviteController::class, 'sendInviteStore'])->name('doctor.send-invite.store');

    Route::get('/patients', [DoctorController::class, 'patients'])->name('doctor.patients');
    Route::get('/health-file/{id}', [DoctorController::class, 'healthFileAdd'])->name('doctor.health-file');
    Route::post('/health-file/{id}', [DoctorController::class, 'healthFileStore'])->name('doctor.health-file.store');
    Route::get('/health-file/pdf/{id}', [DoctorController::class, 'healthFileShow'])->name('doctor.health-file.pdf');
    Route::get('/health-file/edit/{date}', [DoctorController::class, 'profileHealthPage'])->name('doctor.health-file.profile');
    Route::delete('/patients/delete/{id}', [DoctorController::class, 'deletePatient'])->name('doctor.patients.delete');

    Route::get('transfer-patients', [DoctorTransferPatientController::class, 'transferPatientsIndex'])->name('doctor.transfer.patients.index');
    Route::post('transfer-patients', [DoctorTransferPatientController::class, 'transferPatients'])->name('doctor.transfer.patients.store');
});




Route::get('/patient/register', [PatientRegistration::class, 'create'])->name('patient.register')->middleware('guest', 'hasInvitation');
Route::post('/patient/register', [PatientRegistration::class, 'store'])->name('patient.register.store');


// Route::middleware('auth')->group(function () {
    
// });

require __DIR__.'/auth.php';
