<?php

use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\ClassTypeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\CmsPagesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TrainerController;
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

Route::controller(\App\Http\Controllers\FrontController::class)->group(function (){
   Route::get('/','index')->name('index');
   Route::get('/about','about')->name('about');
   Route::get('/contact','contact')->name('contact');
   Route::get('/events','events')->name('events');
   Route::get('/leagues/and/tournaments','leagues')->name('leagues');
   Route::get('/personal/training','personalTraining')->name('personal.training');
   Route::get('/youth/training','youthTraining')->name('youth.training');
   Route::get('/get-in-touch','getInTouch')->name('getInTouch');
   Route::get('/programs','programs')->name('programs');
   Route::get('/weight-training/{id}','weightTraining')->name('weight.training');
   Route::get('/adult-training-plan','adultTraining')->name('adult.training');
   Route::get('/package','package')->name('package');
   Route::post('user/subscribe/now','subscribeNowSubmit')->name('subscribe.now.submit');
});

Route::post('/class-schedules/classType', [ClassScheduleController::class, 'getClassSchedules'])->name('class.schedules');
Route::get('admin/login',[\App\Http\Controllers\AdminController::class,'adminLoginView'])->name('admin.login.form');
Route::post('admin/login/submit',[\App\Http\Controllers\AdminController::class,'adminLogin'])->name('admin.login.submit');
Route::get('admin/logout',[\App\Http\Controllers\AdminController::class,'adminLogout'])->name('admin.logout');

Route::middleware('CheckAdmin')->prefix('admin/')->name('admin.')->group(function () {
  Route::get('dashboard',[\App\Http\Controllers\AdminController::class,'dashboard'])->name('dashboard');
  Route::get('profile',[\App\Http\Controllers\AdminController::class,'profile'])->name('profile');
  Route::post('profile/update',[\App\Http\Controllers\AdminController::class,'userProfileUpdate'])->name('profile.update');
  Route::post('display/submission/data',[\App\Http\Controllers\ContactController::class,'displaySubmissionData'])->name('entries.index');

  //CMS Routes
    Route::get('setting/create',[\App\Http\Controllers\CmsPagesController::class,'settingCreate'])->name('setting.create');
    Route::post('setting/update',[\App\Http\Controllers\CmsPagesController::class,'update'])->name('setting.update');

//CMS-Pages Routes
    Route::get('home/create',[\App\Http\Controllers\CmsPagesController::class,'homeCreate'])->name('home.create');
    Route::post('home/upadate',[\App\Http\Controllers\CmsPagesController::class,'homeUpdate'])->name('home.update');

    Route::controller(CmsPagesController::class)->group(function () {
        Route::get('cms/pages/{slug}/edit', 'edit')->name('pages.edit');
        Route::post('cms/pages/{slug}/update', 'editAndUpdate')->name('pages.update');
    });

  //Services Crud Routes
    Route::get('service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('service/{id}/update', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

// Trainers Crud Routes
    Route::get('trainers', [TrainerController::class, 'index'])->name('trainers.index');
    Route::get('trainers/create', [TrainerController::class, 'create'])->name('trainers.create');
    Route::post('trainers', [TrainerController::class, 'store'])->name('trainers.store');
    Route::get('trainers/{id}/edit', [TrainerController::class, 'edit'])->name('trainers.edit');
    Route::put('trainers/{id}', [TrainerController::class, 'update'])->name('trainers.update');
    Route::delete('trainers/{id}', [TrainerController::class, 'destroy'])->name('trainers.destroy');

//Class Type Routes
    Route::get('class_types', [ClassTypeController::class, 'index'])->name('class_types.index');
    Route::get('class_types/create', [ClassTypeController::class, 'create'])->name('class_types.create');
    Route::post('class_types', [ClassTypeController::class, 'store'])->name('class_types.store');
    Route::get('class_types/{id}/edit', [ClassTypeController::class, 'edit'])->name('class_types.edit');
    Route::put('class_types/{id}', [ClassTypeController::class, 'update'])->name('class_types.update');
    Route::delete('class_types/{id}', [ClassTypeController::class, 'destroy'])->name('class_types.destroy');

//Class Schedule Routes
    Route::get('class_schedules', [ClassScheduleController::class, 'index'])->name('class_schedules.index');
    Route::get('class_schedules/create', [ClassScheduleController::class, 'create'])->name('class_schedules.create');
    Route::post('class_schedules', [ClassScheduleController::class, 'store'])->name('class_schedules.store');
    Route::get('class_schedules/{class_schedule}/edit', [ClassScheduleController::class, 'edit'])->name('class_schedules.edit');
    Route::put('class_schedules/{class_schedule}', [ClassScheduleController::class, 'update'])->name('class_schedules.update');
    Route::delete('class_schedules/{class_schedule}', [ClassScheduleController::class, 'destroy'])->name('class_schedules.destroy');

//Testimonials Routes
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('/testimonial/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('/testimonial/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');


//Tournaments Route
    Route::get('/tournament', [TournamentController::class, 'index'])->name('tournament.index');
    Route::get('/tournament/create', [TournamentController::class, 'create'])->name('tournament.create');
    Route::post('/tournament', [TournamentController::class, 'store'])->name('tournament.store');
    Route::get('/tournament/{id}/edit', [TournamentController::class, 'edit'])->name('tournament.edit');
    Route::put('/tournament/{id}', [TournamentController::class, 'update'])->name('tournament.update');
    Route::delete('/tournament/{id}', [TournamentController::class, 'destroy'])->name('tournament.destroy');

//Events Routes
    Route::get('/events', [EventController::class, 'index'])->name('event.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/events', [EventController::class, 'store'])->name('event.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('event.destroy');
});
