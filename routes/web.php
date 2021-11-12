<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/new', [ProjectController::class, 'add'])->name('projects.add');
Route::post('/projects/new', [ProjectController::class, 'create']);
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/projects/{id}', [ProjectController::class, 'update']);
Route::get('/projects/{id}/deployments', [ProjectController::class, 'deployments'])->name('projects.deployments');
Route::get('/projects/{id}/configurations', [ProjectController::class, 'configurations'])->name('projects.configurations');
Route::get('/projects/{id}/instances', [ProjectController::class, 'instances'])->name('projects.instances');
Route::get('/projects/{id}/configurations/new', [ProjectController::class, 'configurations'])->name('projects.configurations.add');
