<?php

use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\ClassTypeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CmsPagesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TrainerController;
use App\Models\Service;
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
   Route::get('/project','project')->name('project');
   Route::get('/services','services')->name('services');
   Route::get('/interior-remodeling','interiorRemodeling')->name('interior.remodeling');
   Route::get('/classic-and-professional','classicAndProfessional')->name('classic.and.professional');
   Route::get('/blog','blog')->name('blog');
   Route::get('/order','order')->name('order');
   Route::get('/store','store')->name('cardtab.store');
   Route::get('/adult-training-plan','adultTraining')->name('adult.training');
   Route::get('/package','package')->name('package');
   Route::post('user/subscribe/now','subscribeNowSubmit')->name('subscribe.now.submit');
});

Route::get('/order-data', [OrderController::class, 'handleRequest']);

Route::get('admin/login',[\App\Http\Controllers\AdminController::class,'adminLoginView'])->name('admin.login.form');
Route::post('admin/login/submit',[\App\Http\Controllers\AdminController::class,'adminLogin'])->name('admin.login.submit');
Route::get('admin/logout',[\App\Http\Controllers\AdminController::class,'adminLogout'])->name('admin.logout');

Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service.detail');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.detail');

Route::middleware('CheckAdmin')->prefix('admin/')->name('admin.')->group(function () {
  Route::get('dashboard',[\App\Http\Controllers\AdminController::class,'dashboard'])->name('dashboard');
  Route::get('profile',[\App\Http\Controllers\AdminController::class,'profile'])->name('profile');
  Route::post('profile/update',[\App\Http\Controllers\AdminController::class,'userProfileUpdate'])->name('profile.update');
  // Route::post('display/submission/data',[ContactController::class,'displaySubmissionData'])->name('entries.index');

  //CMS Routes
    // Route::get('setting/create',[\App\Http\Controllers\CmsPagesController::class,'settingCreate'])->name('setting.create');
    // Route::post('setting/update',[\App\Http\Controllers\CmsPagesController::class,'update'])->name('setting.update');

//CMS-Pages Routes
    // Route::get('home/create',[\App\Http\Controllers\CmsPagesController::class,'homeCreate'])->name('home.create');
    // Route::post('home/upadate',[\App\Http\Controllers\CmsPagesController::class,'homeUpdate'])->name('home.update');

    // Route::controller(CmsPagesController::class)->group(function () {
    //     Route::get('cms/pages/{slug}/edit', 'edit')->name('pages.edit');
    //     Route::post('cms/pages/{slug}/update', 'editAndUpdate')->name('pages.update');
    // });

    // BLOG
  Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
  Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
  Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
  Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
  Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
  Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

  //Services Crud Routes
    Route::get('services', [ServiceController::class, 'index'])->name('service.index');
    Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('service/{id}/update', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
});
