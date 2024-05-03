<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VoluntaryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// // Rotas que precisam de autenticação padrão BREEZE
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/voluntary/createEvent', [VoluntaryController::class, 'createEvent']);
Route::get('/voluntary/events', [VoluntaryController::class, 'selectEvents']);
Route::get('/voluntary/inscriptions', [VoluntaryController::class, 'viewInscriptions']);
Route::post('/voluntary/eventsCreate', [VoluntaryController::class, 'eventsCreate']);
//ROTAS QUE NÃO DERAM CERTO
// Route::get('/home-adm', [AdministratorController::class, 'home']);
// Route::get('/home-beneficiary', [BeneficiaryStudentController::class, 'home']);

// Route::get('/inscriptions', [InscriptionController::class, 'index']);
// Route::resource('/', HomeController::class);

// Route::resource('/events', EventController::class);

// Route::resource('/adm', AdministratorController::class);

// Route::resource('/beneficiary', BeneficiaryStudentController::class);

// Route::resource('/inscriptions', InscriptionController::class);

// Route::get('/beneficiary/events_details', [BeneficiaryStudentController::class, 'show_events']);


//adm

// Route::get('/adm/event', [AdministratorController::class, 'event'])->name('adm.event');

//Route::get('/home/{type}', [HomeController::class, 'home']);
//Route::resource('/', HomeController::class);

//Route::get('/{type}/create', [BeneficiaryStudentController::class, 'create']);
///Route::get('/{type}/home', 'BeneficiaryController@home')->name('beneficiary.home');


//TESTE ROTAS
Route::get('/home-admin', [HomeController::class, 'home_admin']);
Route::get('/home-beneficiary', [HomeController::class, 'home_beneficiary']);
Route::get('/home-voluntary', [HomeController::class, 'home_voluntary']);


Route::get('/beneficiary/create/{event}', [InscriptionController::class, 'create']);
Route::get('/beneficiary/inscriptions', [InscriptionController::class, 'show_user_inscriptions']);
Route::get('/beneficiary/cancel/{inscription_id}', [StudentController::class, 'cancel_inscription']);

Route::resource('/beneficiary', StudentController::class);

Route::resource('/', HomeController::class);

Route::resource('/events', EventController::class);

Route::resource('/adm', AdministratorController::class);

Route::resource('/voluntary', VoluntaryController::class);

Route::resource('/inscriptions', InscriptionController::class);



require __DIR__.'/auth.php';