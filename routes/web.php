<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Mail\TaskMail;
use App\Models\Todo;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect('/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/todo/{$id}', [TodoController::class, 'view'])->name('todo.view');
    Route::post('/todo', [TodoController::class, 'create'])->name('todo.create');
    Route::patch('/todo', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/todo', [TodoController::class, 'destroy'])->name('todo.destroy');

});

Route::get('/mail', function(){
    $task = Todo::with('assignto')->first();
    return new TaskMail($task);
});

require __DIR__.'/auth.php';
