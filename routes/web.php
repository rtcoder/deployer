<?php

use App\Http\Controllers\DeploymentConfigurationController;
use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('projects')->group(function () {

    Route::get('/', [ProjectController::class, 'index'])->name('projects');
    Route::get('/new', [ProjectController::class, 'add'])->name('projects.add');
    Route::post('/new', [ProjectController::class, 'create']);
    Route::get('/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('/{id}', [ProjectController::class, 'update']);
    Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('projects.delete');


    Route::prefix('/{project_id}')->group(function () {

        Route::prefix('/deployments')->group(function () {
            Route::get('/', [DeploymentController::class, 'index'])->name('projects.deployments');
            Route::get('/{id}', [DeploymentController::class, 'show'])->name('projects.deployments.show');
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

        Route::prefix('/instances')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('projects.instances');
            Route::get('/{id}', [ProjectController::class, 'show'])->name('projects.instances.show');
        });
    });
});
