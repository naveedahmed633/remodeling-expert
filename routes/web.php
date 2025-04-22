<?php

use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\ClassTypeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CmsPagesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RemodelTypeController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceFormController;
use App\Http\Controllers\SubserviceCategoryController;
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

Route::controller(\App\Http\Controllers\FrontController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/project', 'project')->name('project');
    Route::get('/services', 'services')->name('services');
    Route::get('/interior-remodeling', 'interiorRemodeling')->name('interior.remodeling');
    Route::get('/classic-and-professional', 'classicAndProfessional')->name('classic.and.professional');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/order', 'order')->name('order');
    Route::get('/store', 'store')->name('cardtab.store');
    Route::get('/adult-training-plan', 'adultTraining')->name('adult.training');
    Route::get('/package', 'package')->name('package');
    Route::post('user/subscribe/now', 'subscribeNowSubmit')->name('subscribe.now.submit');


    Route::post('/store-selected-services', 'storeSelectedServices')->name('store.selected.services');
    Route::post('/store-sub-category-services', 'storeSubcategories')->name('store.subcategories');
    Route::post('/store-subchildcategories', 'storeSubChildCategories')->name('store.subchildcategories');

    Route::post('/store-remodel-services', 'storeRemodelType')->name('store.remodel.type');
    Route::post('/order-data/form', 'orderDataForm')->name('front.order.data.form');


});

// Route for displaying the form (Step 1 and Step 2)
Route::get('service-form', [ServiceFormController::class, 'create'])->name('service.form.create');

// Route for form submission
Route::post('service-form', [ServiceFormController::class, 'store'])->name('service.form.store');

Route::post('/order-data', [OrderController::class, 'handleRequest']);

Route::get('admin/login', [\App\Http\Controllers\AdminController::class, 'adminLoginView'])->name('admin.login.form');
Route::post('admin/login/submit', [\App\Http\Controllers\AdminController::class, 'adminLogin'])->name('admin.login.submit');
Route::get('admin/logout', [\App\Http\Controllers\AdminController::class, 'adminLogout'])->name('admin.logout');

Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service.detail');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.detail');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.detail');
Route::post('/multi-step-submit', [BlogController::class, 'ajeeb'])->name('multi.submit');
Route::middleware('CheckAdmin')->prefix('admin/')->name('admin.')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [\App\Http\Controllers\AdminController::class, 'profile'])->name('profile');
    Route::post('profile/update', [\App\Http\Controllers\AdminController::class, 'userProfileUpdate'])->name('profile.update');

    //CMS-Pages Routes
    Route::controller(CmsPagesController::class)->group(function () {
        Route::get('cms/pages/{slug}/edit', 'edit')->name('pages.edit');
        Route::post('cms/pages/{slug}/update', 'editAndUpdate')->name('pages.update');
    });


    // Project Crud Routes
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    // ServiceCategory Crud Routes
    Route::get('/form-services', [ServiceCategoryController::class, 'index'])->name('form.services.index');
    Route::get('/form-services/create', [ServiceCategoryController::class, 'create'])->name('form.services.create');
    Route::post('/form-services', [ServiceCategoryController::class, 'store'])->name('form.services.store');
    Route::get('/form-services/{id}/edit', [ServiceCategoryController::class, 'edit'])->name('form.services.edit');
    Route::put('/form-services/{id}', [ServiceCategoryController::class, 'update'])->name('form.services.update');
    Route::delete('/form-services/{id}', [ServiceCategoryController::class, 'destroy'])->name('form.services.destroy');

    // SubserviceCategoryC Crud Routes
    Route::get('/subservice-category', [SubserviceCategoryController::class, 'index'])->name('subservice.category.index');
    Route::get('/subservice-category/create', [SubserviceCategoryController::class, 'create'])->name('subservice.category.create');
    Route::post('/subservice-category', [SubserviceCategoryController::class, 'store'])->name('subservice.category.store');
    Route::get('/subservice-category/{id}/edit', [SubserviceCategoryController::class, 'edit'])->name('subservice.category.edit');
    Route::put('/subservice-category/{id}', [SubserviceCategoryController::class, 'update'])->name('subservice.category.update');
    Route::delete('/subservice-category/{id}', [SubserviceCategoryController::class, 'destroy'])->name('subservice.category.destroy');

    Route::get('/service/{id}/subservices', [SubserviceCategoryController::class, 'getSubServices']);

    // RemodelType Crud Routes
    Route::get('/remodel-type', [RemodelTypeController::class, 'index'])->name('remodel.type.index');
    Route::get('/remodel-type/create', [RemodelTypeController::class, 'create'])->name('remodel.type.create');
    Route::post('/remodel-type', [RemodelTypeController::class, 'store'])->name('remodel.type.store');
    Route::get('/remodel-type/{id}/edit', [RemodelTypeController::class, 'edit'])->name('remodel.type.edit');
    Route::put('/remodel-type/{id}', [RemodelTypeController::class, 'update'])->name('remodel.type.update');
    Route::delete('/remodel-type/{id}', [RemodelTypeController::class, 'destroy'])->name('remodel.type.destroy');

    // RequirementController Crud Routes
    Route::get('/requirement', [RequirementController::class, 'index'])->name('requirement.index');
    Route::get('/requirement/create', [RequirementController::class, 'create'])->name('requirement.create');
    Route::post('/requirement', [RequirementController::class, 'store'])->name('requirement.store');
    Route::get('/requirement/{id}/edit', [RequirementController::class, 'edit'])->name('requirement.edit');
    Route::put('/requirement/{id}', [RequirementController::class, 'update'])->name('requirement.update');
    Route::delete('/requirement/{id}', [RequirementController::class, 'destroy'])->name('requirement.destroy');

    // BLOG Crud Routes
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


    Route::get('service/categories/{id}', [ServiceController::class, 'serviceCategories'])->name('service.category.index');
    Route::get('service/sub/categories/{id}', [ServiceController::class, 'serviceSubCategories'])->name('service.sub.category.index');


    Route::post('add/service/{type}/{id}', [ServiceController::class, 'addServiceType'])->name('add.service.type');
    Route::post('update/service/{type}/{id}', [ServiceController::class, 'updateServiceType'])->name('update.service.type');
    Route::get('delete/service/{type}/{id}', [ServiceController::class, 'deleteServiceType'])->name('delete.service.type');


    Route::get('orders', [ProjectController::class, 'orderIndex'])->name('order.index');
    Route::get('order/detail/{id}', [ProjectController::class, 'orderView'])->name('order.view');
});
