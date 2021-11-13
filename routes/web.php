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

Route::prefix('projects')->group(function () {

    Route::get('/', [ProjectController::class, 'index'])->name('projects');
    Route::get('/new', [ProjectController::class, 'add'])->name('projects.add');
    Route::post('/new', [ProjectController::class, 'create']);
    Route::get('/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('/{id}', [ProjectController::class, 'update']);


    Route::prefix('/{project_id}')->group(function () {

        Route::prefix('/deployments')->group(function () {
            Route::get('/', [ProjectController::class, 'deployments'])->name('projects.deployments');
            Route::get('/{id}', [ProjectController::class, 'show'])->name('projects.deployments.show');

        });

        Route::prefix('/configurations')->group(function () {
            Route::get('/', [DeploymentConfigurationController::class, 'index'])->name('projects.configurations');
            Route::get('/new', [DeploymentConfigurationController::class, 'add'])->name('projects.configurations.add');
            Route::post('/new', [DeploymentConfigurationController::class, 'create']);

            Route::prefix('/{id}')->group(function () {
                Route::get('/', [DeploymentConfigurationController::class, 'show'])->name('projects.configurations.show');
                Route::post('/', [DeploymentConfigurationController::class, 'update']);
                Route::post('/run', [DeploymentConfigurationController::class, 'run'])->name('projects.configurations.run');

            });
        });

        Route::get('/instances', [ProjectController::class, 'instances'])->name('projects.instances');

    });
});
