<?php

use App\Http\Controllers\DeploymentConfigurationController;
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

Route::get('/projects/{project_id}/deployments', [ProjectController::class, 'deployments'])->name('projects.deployments');

Route::get('/projects/{project_id}/configurations', [DeploymentConfigurationController::class, 'index'])->name('projects.configurations');
Route::get('/projects/{project_id}/configurations/new', [DeploymentConfigurationController::class, 'add'])->name('projects.configurations.add');
Route::post('/projects/{project_id}/configurations/new', [DeploymentConfigurationController::class, 'create']);
Route::get('/projects/{project_id}/configurations/{id}', [DeploymentConfigurationController::class, 'show'])->name('projects.configurations.show');
Route::post('/projects/{project_id}/configurations/{id}', [DeploymentConfigurationController::class, 'update']);
Route::post('/projects/{project_id}/configurations/{id}/run', [DeploymentConfigurationController::class, 'run'])->name('projects.configurations.run');

Route::get('/projects/{project_id}/instances', [ProjectController::class, 'instances'])->name('projects.instances');
