<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

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

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/', [ServiceController::class, 'index']);

Route::resource('/services', ServiceController::class);
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create'); // Form tambah
Route::post('/services', [ServiceController::class, 'store'])->name('services.store'); // Proses simpan

Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit'); // Menampilkan form edit
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update'); // Memproses update

Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy'); //memproses hapus
