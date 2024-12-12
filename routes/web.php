<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PagoController;
use App\Models\Producto;
use App\Models\Pago;

// Route::get('/', function () {
//     return view('home');
// });

//Route::resource('productos', ProductoController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');


Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');
Route::get('/pagos/create', [PagoController::class, 'create'])->name('pagos.create');
Route::delete('/pagos/{id}', [PagoController::class, 'destroy'])->name('pagos.destroy');
Route::put('/pagos/{id}', [PagoController::class, 'update'])->name('pagos.update');
Route::get('/pagos/{id}', [PagoController::class, 'show'])->name('pagos.show');
Route::get('/pagos/{id}/edit', [PagoController::class, 'edit'])->name('pagos.edit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
