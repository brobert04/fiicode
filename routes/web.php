<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Auth\PatientRegistration;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// DASHBOARD UNIVERSAL BAZAT PE ROLUL CELUI CARE FACE REQUEST UL
Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// RUTE SPECIFICE DOCTORULUI
Route::group(['prefix' => 'doctor', 'middleware' => ['auth', 'verified', 'doctor']], function(){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/send-invite', [DoctorController::class, 'sendInvite'])->name('doctor.send-invite');
    Route::post('/send-invite', [DoctorController::class, 'sendInviteStore'])->name('doctor.send-invite.store');

    Route::get('/patients', [DoctorController::class, 'patients'])->name('doctor.patients');

    Route::get('/health-file/{id}', [DoctorController::class, 'healthFileAdd'])->name('doctor.health-file');

    Route::post('/health-file/{id}', [DoctorController::class, 'healthFileStore'])->name('doctor.health-file.store');

    Route::get('/health-file/pdf/{id}', [DoctorController::class, 'healthFileShow'])->name('doctor.health-file.pdf');
});




Route::get('/patient/register', [PatientRegistration::class, 'create'])->name('patient.register')->middleware('guest');
Route::post('/patient/register', [PatientRegistration::class, 'store'])->name('patient.register.store');


// Route::middleware('auth')->group(function () {
    
// });

require __DIR__.'/auth.php';
