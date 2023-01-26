<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersRolesController;
use App\Http\Controllers\UsersPermissionsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware'=>['auth', 'verified'],
], 
function(){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');    
}); 

Route::middleware('auth')->group(function () {
    /* Profile Routes */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    /* Projects Routes */
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/show/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/edit/{project}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/update/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::delete('/projects/destroy/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    
    /* Tasks Routes */
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/show/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/update/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::delete('/tasks/destroy/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    
    /* Users Routes */
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/store',[UserController::class, 'store'])->name('users.store');
    Route::get('/users/show/{user}',[UserController::class, 'show'])->name('users.show');
    Route::get('/users/edit/{user}',[UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{user}',[UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    /* Roles Routes */
    Route::put('/users/{user}/roles',[UsersRolesController::class, 'update'])->name('users.roles.update');

    /* Permissions Routes */
    Route::put('/users/{user}/permissions',[UsersPermissionsController::class, 'update'])->name('users.permissions.update');

});

require __DIR__.'/auth.php';
