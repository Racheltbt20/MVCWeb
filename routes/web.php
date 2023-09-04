<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\SiswaController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will0
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/halaman2', [HomeController::class, 'halaman2']);
// Route::get('/portofolio', [HomeController::class, 'portofolio']);

// @quest
Route::get('/', [HomeController::class, 'index']) ->name('home');
Route::get('/about', [AboutController::class, 'index']) ->name('about');
Route::get('/projects', [ProjectsController::class, 'index']) ->name('projects');
Route::get('/contact', [ContactController::class, 'index']) ->name('contact');

// @auth
Route::get('/admin', [AdminController::class, 'index']) ->name('admin');

// Master Siswa
Route::get('/admin/siswa', [SiswaController::class, 'index']) ->name('siswa.index');
Route::get('/admin/siswa/create', [SiswaController::class, 'create']) ->name('siswa.create');
Route::post('/admin/siswa/store', [SiswaController::class, 'store']) ->name('siswa.store');
Route::get('/admin/siswa/{id}/edit', [SiswaController::class, 'edit']) ->name('siswa.edit');
Route::put('/admin/siswa/{id}', [SiswaController::class, 'update']) ->name('siswa.update');
Route::delete('/admin/siswa/{id}', [SiswaController::class, 'delete']) ->name('siswa.delete');

// Master Project
Route::get('/admin/project', [ProjectsController::class, 'index']) ->name('project.index');
Route::get('/admin/project/create', [ProjectsController::class, 'create']) ->name('project.create');
Route::post('/admin/project/store', [ProjectsController::class, 'store']) ->name('project.store');
Route::get('/admin/project/{id}/edit', [ProjectsController::class, 'edit']) ->name('project.edit');
Route::put('/admin/project/{id}', [ProjectController::class, 'update']) ->name('project.update');
Route::delete('/admin/project/{id}', [ProjectController::class, 'delete']) ->name('project.delete');

// Master Contact
Route::get('/admin/contact', [ContactController::class, 'index']) ->name('contact.index');
Route::get('/admin/contact/create', [ContactController::class, 'create']) ->name('contact.create');
Route::post('/admin/contact/store', [ContactController::class, 'store']) ->name('contact.store');
Route::get('/admin/contact/{id}/edit', [ContactController::class, 'edit']) ->name('contact.edit');
Route::put('/admin/contact/{id}', [ContactController::class, 'update']) ->name('contact.update');
Route::delete('/admin/contact/{id}', [ContactController::class, 'delete']) ->name('contact.delete');



