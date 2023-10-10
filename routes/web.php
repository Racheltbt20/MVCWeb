<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RegistrasiController;
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

// @guest
Route::get('/', [HomeController::class, 'index']) ->name('home');
Route::get('/about', [AboutController::class, 'index']) ->name('about');
Route::get('/projects', [ProjectsController::class, 'projecthome']) ->name('projecthome');
Route::get('/contact', [ContactController::class, 'contact']) ->name('contact');

// @auth
Route::get('/admin', [AdminController::class, 'index']) ->name('admin')->middleware('auth');

// Master Siswa
Route::get('/admin/siswa', [SiswaController::class, 'index']) ->name('siswa.index')->middleware('auth');
Route::get('/admin/siswa/create', [SiswaController::class, 'create']) ->name('siswa.create')->middleware('auth');
Route::post('/admin/siswa/store', [SiswaController::class, 'store']) ->name('siswa.store')->middleware('auth');
Route::get('/admin/siswa/{id}/edit', [SiswaController::class, 'edit']) ->name('siswa.edit')->middleware('auth');
Route::put('/admin/siswa/{id}', [SiswaController::class, 'update']) ->name('siswa.update')->middleware('auth');
Route::delete('/admin/siswa/{id}', [SiswaController::class, 'delete']) ->name('siswa.delete')->middleware('auth');

// Master Project
Route::resource('/admin/project', ProjectsController::class)->middleware('auth');
Route::get('/admin/project/{id}/create', [ProjectsController::class, 'add'])->name('project.add')->middleware('auth');

// Master Contact
Route::get('/admin/contact', [ContactController::class, 'index']) ->name('contact.index')->middleware('auth');
Route::get('/admin/contact/create', [ContactController::class, 'create']) ->name('contact.create')->middleware('auth');
Route::post('/admin/contact/store', [ContactController::class, 'store']) ->name('contact.store')->middleware('auth');
Route::get('/admin/contact/{id}/edit', [ContactController::class, 'edit']) ->name('contact.edit')->middleware('auth');
Route::put('/admin/contact/{id}', [ContactController::class, 'update']) ->name('contact.update')->middleware('auth');
Route::delete('/admin/contact/{id}', [ContactController::class, 'delete']) ->name('contact.delete')->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'index']) ->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']) ->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout']) ->name('logout');

// Registrasi
Route::get('/registrasi', [RegistrasiController::class, 'index']) ->name('registrasi.index');
Route::post('/registrasi', [RegistrasiController::class, 'store']) ->name('registrasi.store');

