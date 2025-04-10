<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    /*return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);*/
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'usuarios' => App\Models\User::count(),
        'cargos' => App\Models\Cargo::count(),
        'proyectos' => App\Models\Proyecto::count()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('cargos', [cargoController::class, 'index'])->name('cargos.index');
    Route::post('cargos', [cargoController::class, 'store'])->name('cargos.store');
    Route::patch('cargos/{cargo}', [cargoController::class, 'update'])->name('cargos.update');
    Route::delete('cargos/{cargo}', [cargoController::class, 'destroy'])->name('cargos.destroy');

    Route::get('proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
    Route::get('proyectos/create', [ProyectoController::class, 'create'])->name('proyectos.create');
    Route::post('proyectos/create', [ProyectoController::class, 'store'])->name('proyectos.store');
    Route::patch('proyectos/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');
    Route::delete('proyectos/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');
});

require __DIR__.'/auth.php';
