<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminExpertiseController;
use App\Http\Controllers\Admin\AdminQualificationController;
use App\Http\Controllers\Admin\AdminQuestionController;
use App\Http\Controllers\Admin\AdminLevelController;
use App\Http\Controllers\Admin\AdminInstrumentController;
use App\Http\Controllers\Admin\AdminHistoryController;
use App\Http\Controllers\Auth\ProviderController;

// CLIENT SIDE
Route::get('/', [HomeController::class, 'index'])->name('beranda');

// OAuth
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback'])->name('auth.callback');

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {

  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  // CMS ADMINITRASTOR
  Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('beranda');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD USER
    Route::resource('user', AdminUserController::class)->only(['index', 'store', 'update', 'destroy']);

    // CRUD CATEGORY
    Route::get('/category', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{id}/update', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/destroy', [AdminCategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/category/import', [AdminCategoryController::class, 'import'])->name('category.import');
    Route::get('/category/export', [AdminCategoryController::class, 'export'])->name('category.export');
    Route::delete('/category/deleteAll', [AdminCategoryController::class, 'destroyAll'])->name('category.destroyAll');
    
    // CRUD EXPERTISE
    Route::get('/expertise', [AdminExpertiseController::class, 'index'])->name('expertise.index');
    Route::post('/expertise', [AdminExpertiseController::class, 'store'])->name('expertise.store');
    Route::put('/expertise/{id}/update', [AdminExpertiseController::class, 'update'])->name('expertise.update');
    Route::delete('/expertise/{id}/destroy', [AdminExpertiseController::class, 'destroy'])->name('expertise.destroy');
    Route::post('/expertise/import', [AdminExpertiseController::class, 'import'])->name('expertise.import');
    Route::get('/expertise/export', [AdminExpertiseController::class, 'export'])->name('expertise.export');
    Route::delete('/expertise/deleteAll', [AdminExpertiseController::class, 'destroyAll'])->name('expertise.destroyAll');
    
    // CRUD QUALIFICATION
    Route::get('/qualification', [AdminQualificationController::class, 'index'])->name('qualification.index');
    Route::post('/qualification', [AdminQualificationController::class, 'store'])->name('qualification.store');
    Route::put('/qualification/{id}/update', [AdminQualificationController::class, 'update'])->name('qualification.update');
    Route::delete('/qualification/{id}/destroy', [AdminQualificationController::class, 'destroy'])->name('qualification.destroy');
    Route::post('/qualification/import', [AdminQualificationController::class, 'import'])->name('qualification.import');
    Route::get('/qualification/export', [AdminQualificationController::class, 'export'])->name('qualification.export');
    Route::delete('/qualification/deleteAll', [AdminQualificationController::class, 'destroyAll'])->name('qualification.destroyAll');

    // CRUD QUESTION
    Route::get('/question', [AdminQuestionController::class, 'index'])->name('question.index');
    Route::post('/question', [AdminQuestionController::class, 'store'])->name('question.store');
    Route::put('/question/{id}/update', [AdminQuestionController::class, 'update'])->name('question.update');
    Route::delete('/question/{id}/destroy', [AdminQuestionController::class, 'destroy'])->name('question.destroy');
    Route::post('/question/import', [AdminQuestionController::class, 'import'])->name('question.import');
    Route::get('/question/export', [AdminQuestionController::class, 'export'])->name('question.export');
    Route::delete('/question/deleteAll', [AdminQuestionController::class, 'destroyAll'])->name('question.destroyAll');

    // CRUD LEVEL
    Route::get('/level', [AdminLevelController::class, 'index'])->name('level.index');
    Route::post('/level', [AdminLevelController::class, 'store'])->name('level.store');
    Route::put('/level/{id}/update', [AdminLevelController::class, 'update'])->name('level.update');
    Route::delete('/level/{id}/destroy', [AdminLevelController::class, 'destroy'])->name('level.destroy');
    Route::post('/level/import', [AdminLevelController::class, 'import'])->name('level.import');
    Route::get('/level/export', [AdminLevelController::class, 'export'])->name('level.export');
    Route::delete('/level/deleteAll', [AdminLevelController::class, 'destroyAll'])->name('level.destroyAll');

    // INSTRUMENT
    Route::get('/instrument', [AdminInstrumentController::class, 'index'])->name('instrument.index');
    Route::get('/instrument/create', [AdminInstrumentController::class, 'create'])->name('instrument.create');
    Route::post('/instrument/store', [AdminInstrumentController::class, 'store'])->name('instrument.store');

    // HISTORY
    Route::get('/history', [AdminHistoryController::class, 'index'])->name('history.index');
  });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
