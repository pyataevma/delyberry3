<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;

// Route::get('/', function () {
//     return view('home');
// });

//Route::resource('productos', ProductoController::class);
Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
